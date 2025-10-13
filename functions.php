<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

define( 'CB_THEME_DIR', get_stylesheet_directory() );

require_once CB_THEME_DIR . '/inc/cb-theme.php';

/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );


/**
 * Enqueue our stylesheet and javascript file
 */

/**
 * Enqueue child-theme.min.css late for override, with filemtime versioning.
 */
function cb_enqueue_theme_css() {
	$rel = '/css/child-theme.min.css';
	$abs = get_stylesheet_directory() . $rel;
	wp_enqueue_style(
		'cb-theme',
		get_stylesheet_directory_uri() . $rel,
		array(),
		file_exists( $abs ) ? filemtime( $abs ) : null
	);
}
add_action( 'wp_enqueue_scripts', 'cb_enqueue_theme_css', 20 );

/**
 * Enqueue child-theme.min.js with filemtime versioning.
 */
function cb_enqueue_theme_js() {
	$rel = '/js/child-theme.min.js';
	$abs = get_stylesheet_directory() . $rel;
	if ( file_exists( $abs ) ) {
		wp_enqueue_script(
			'cb-theme-js',
			get_stylesheet_directory_uri() . $rel,
			array(),
			filemtime( $abs ),
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'cb_enqueue_theme_js', 20 );


/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'hub-sequoia2025', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );


/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @return string
 */
function understrap_default_bootstrap_version() {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );

/**
 * AJAX handler for post search functionality
 */
function cb_ajax_search_posts() {
	// Verify nonce for security.
	if ( ! wp_verify_nonce( $_POST['nonce'], 'post_search_nonce' ) ) {
		wp_die( 'Security check failed' );
	}

	$search_term = sanitize_text_field( $_POST['search_term'] );
	$category    = sanitize_text_field( $_POST['category'] );
	$year        = sanitize_text_field( $_POST['year'] );

	$args = array(
		'post_type'      => 'post',
		'post_status'    => array( 'publish', 'future' ),
		'posts_per_page' => -1,
		'orderby'        => 'date',
		'order'          => 'DESC',
	);

	// Add search term if provided.
	if ( ! empty( $search_term ) ) {
		$args['s'] = $search_term;
	}

	// Add category filter if provided.
	if ( ! empty( $category ) && 'all' !== $category ) {
		$args['category_name'] = $category;
	}

	// Add year filter if provided.
	if ( ! empty( $year ) && 'all' !== $year ) {
		$args['date_query'] = array(
			array(
				'year' => intval( $year ),
			),
		);
	}

	$query = new WP_Query( $args );

	ob_start();

	if ( $query->have_posts() ) {
		$d = 0;
		while ( $query->have_posts() ) {
			$query->the_post();

			// Get categories for data attribute
			$categories = get_the_category();
			if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
				$first_category = $categories[0];
				if ( count( $categories ) > 1 ) {
					$categories = array_slice( $categories, 0, 1 );
				}
				$categories = implode( ' ', wp_list_pluck( $categories, 'slug' ) );
			} else {
				$categories = '';
			}
			?>
			<div class="col-md-6 col-lg-4" data-aos="fade" data-aos-delay="<?= esc_attr( $d ); ?>" data-category="<?= esc_attr( $categories ); ?>" data-year="<?= esc_attr( get_the_date( 'Y' ) ); ?>">
				<a href="<?= esc_url( get_permalink() ); ?>" class="latest-insights__item">
					<div class="latest-insights__img-wrapper">
						<?= get_the_post_thumbnail( get_the_ID(), 'large', array( 'class' => 'img-fluid mb-3' ) ); ?>
					</div>
					<div class="latest-insights__inner">
						<h3><?= esc_html( get_the_title() ); ?></h3>
						<div class="latest-insights__meta">
							<span><i class="fa-regular fa-calendar"></i> <?= esc_html( get_the_date( 'jS F Y' ) ); ?></span>
							<span><i class="fa-regular fa-clock"></i> <?= wp_kses_post( estimate_reading_time_in_minutes( get_the_content() ) ); ?> minute read</span>
						</div>
						<div class="text-secondary-900"><?= esc_html( get_the_excerpt() ); ?></div>
					</div>
				</a>
			</div>
			<?php
			$d += 100;
		}
	} else {
		echo '<div class="col-12"><p class="text-center">No posts found matching your criteria.</p></div>';
	}

	wp_reset_postdata();

	$html = ob_get_clean();

	wp_send_json_success( array( 'html' => $html ) );
}

add_action( 'wp_ajax_search_posts', 'cb_ajax_search_posts' );
add_action( 'wp_ajax_nopriv_search_posts', 'cb_ajax_search_posts' );
