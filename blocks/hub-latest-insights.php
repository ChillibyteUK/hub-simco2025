<?php
/**
 * Block template for HUB Latest Insights.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

$q = new WP_Query(
	array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
		'post_status'    => 'publish',
		'orderby'        => 'date',
		'order'          => 'DESC',
		'post__not_in'   => array( get_the_ID() ),
	)
);
if ( ! $q->have_posts() ) {
	return;
}
?>
<section class="latest-insights">
	<div class="container py-5">
		<h2 class="mb-4" data-aos="fade-right">Insights</h2>
		<?php
		if ( $q->have_posts() ) {
			?>
			<div class="row g-4">
				<?php
				while ( $q->have_posts() ) {
					$q->the_post();
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

					$plink  = get_permalink();
					$target = '_self';
					if ( 'research' === $first_category->slug ) {
						$plink  = wp_get_attachment_url( get_field( 'pdf', get_the_ID() ) );
						$target = '_blank';
					}
					if ( 'video' === $first_category->slug || 'podcast' === $first_category->slug ) {
						$video_link = get_field( 'video_link', get_the_ID() );
						if ( $video_link && ! ( str_contains( $video_link, 'youtube.com' ) || str_contains( $video_link, 'vimeo.com' ) ) ) {
							$plink  = $video_link;
							$target = '_blank';
						}
					}

					// strip ' PDF' from research category name.
                    $catname = $first_category->name;
                    $catname = str_replace( ' PDF', '', $catname );
					?>
					<div class="col-md-6 col-lg-4" data-aos="fade-up">
						<a href="<?= esc_url( $plink ); ?>" target="<?= esc_attr( $target ); ?>" class="latest-insights__item">
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
							</div>
							<div class="read-more" aria-label="Read more about <?= esc_attr( get_the_title() ); ?>">Read More</div>
						</a>
					</div>
					<?php
                }
				?>
			</div>
			<?php
		}
		wp_reset_postdata();
		?>
	</div>
</section>