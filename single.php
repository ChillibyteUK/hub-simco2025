<?php
/**
 * Template for displaying single posts.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;
get_header();

// get categories.
$categories     = get_the_category();
$first_category = null;
if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
	// get space separated list of category slugs.
	$first_category = $categories[0];
}
?>
<main id="main" class="blog">
	<div class="container">
		<?php
		if ( 'news' === $first_category ) {
			?>
		<div class="post_hero">
			<?=
			get_the_post_thumbnail(
				get_the_ID(),
				'full',
				array(
					'class' => 'blog_hero__image',
					'alt'   => esc_attr( get_the_title() ),
				)
			);
			?>
		</div>
			<?php
		}
		?>
		<div class="pt-5 pb-4">
			<div class="h2">Insights</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="category <?= esc_attr( $first_category->slug ); ?>">// <?= esc_html( $first_category->name ); ?></div>
			</div>
			<div class="col-md-9 pb-5">
				<h1 class="h2"><?= esc_html( get_the_title() ); ?></h1>
				<?php
				if ( $first_category && (
					'podcast' === $first_category->slug ||
					'video' === $first_category->slug ||
					'interview' === $first_category->slug
					) ) {
					$video = get_field( 'video_link' );
					if ( $video ) {
						?>
				<div class="ratio ratio-16x9 mb-4">
					<iframe src="<?= esc_attr( $video ); ?>" title="<?= esc_attr( get_the_title() ); ?>" allowfullscreen></iframe>	
				</div>
						<?php
					}
				}

				echo apply_filters( 'the_content', get_the_content() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</div>
		</div>
		<?php
		// navigation
		the_post_navigation(
			array(
				'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous Insight', 'hub-sequoia2025' ) . '</span><span class="nav-title">%title</span>',
				'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next Insight', 'hub-sequoia2025' ) . '</span><span class="nav-title">%title</span>',
			)
		);
		?>
		<?php
		// Related posts - exclude current post and research category.
		$related_args = array(
			'post_type'      => 'post',
			'posts_per_page' => 3,
			'post_status'    => 'publish',
			'orderby'        => 'date',
			'order'          => 'DESC',
			'post__not_in'   => array( get_the_ID() ),
			'tax_query'      => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
				array(
					'taxonomy' => 'category',
					'field'    => 'slug',
					'terms'    => 'research',
					'operator' => 'NOT IN',
				),
			),
		);

		$related_query = new WP_Query( $related_args );
		
		if ( $related_query->have_posts() ) {
			?>
		<div class="related-posts pt-5 pb-4">
			<h2 class="mb-4">Latest Insights</h2>
			<div class="row g-4">
				<?php
				while ( $related_query->have_posts() ) {
					$related_query->the_post();
					// get categories.
					$categories = get_the_category();
					if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
						// get space separated list of category slugs.
						$first_category = $categories[0];
						// If there are multiple categories, use the first one.
						if ( count( $categories ) > 1 ) {
							// Get the first category slug.
							$categories = array_slice( $categories, 0, 1 );
						}
						// Convert to space separated list.
						$categories = implode( ' ', wp_list_pluck( $categories, 'slug' ) );
					}

					// strip ' PDF' from research category name.
					$catname = $first_category->name;
					$catname = str_replace( ' PDF', '', $catname );
					?>
					<div class="col-md-6 col-lg-4" data-aos="fade-up">
						<a href="<?= esc_url( get_permalink() ); ?>" class="latest-insights__item">
						<div class="latest-insights__img-wrapper">
							<div class="category <?= esc_attr( $first_category->slug ); ?>">// <?= esc_html( $catname ); ?></div>
							<?php
							$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
							if ( $thumbnail_id ) {
								echo wp_get_attachment_image(
									$thumbnail_id,
									'large',
									false,
									array(
										'class' => 'img-fluid',
										'alt'   => '',
									)
								);
							}
							?>
						</div>
							<div class="latest-insights__inner">
								<h3><?= esc_html( get_the_title() ); ?></h3>
								<div><?= esc_html( get_the_excerpt() ); ?></div>
							</div>
							<div class="read-more" aria-label="Read more about <?= esc_attr( get_the_title() ); ?>">Read More</div>
						</a>
					</div>
					<?php
				}
				wp_reset_postdata();
				?>
			</div>
		</div>
			<?php
		}
		?>
</main>
<?php
get_footer();
?>