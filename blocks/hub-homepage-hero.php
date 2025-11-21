<?php
/**
 * Block template for HUB Homepage Hero.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="homepage-hero">
	<div class="homepage-hero__background">
		<?= wp_get_attachment_image( get_field( 'background' ), 'full', false, array( 'alt' => '' ) ); ?>
	</div>
	<div class="homepage-hero__overlay" aria-hidden="true"></div>
	<div class="container h-100 d-flex justify-content-between">
		<div class="row my-auto w-100 justify-content-between h-100">
			<div class="row">
				<div class="col-12 col-md-7 mb-4 d-flex flex-column justify-content-center">
					<div class="homepage-hero__title"><?= wp_kses_post( get_field( 'message' ) ); ?></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					<?php
					$q = new WP_Query(
						array(
							'post_type'      => 'post',
							'posts_per_page' => 3,
							'post_status'    => 'publish',
							'orderby'        => 'date',
							'order'          => 'DESC',
						)
					);
					if ( $q->have_posts() ) {
						?>
						<div id="heroCarousel" class="carousel slide h-100" data-bs-ride="carousel" data-bs-interval="4000" data-bs-pause="false">
							<div class="carousel-inner h-100">
								<?php
								$slide_index = 0;
								while ( $q->have_posts() ) {
									$q->the_post();
									$active_class = ( 0 === $slide_index ) ? ' active' : '';
									?>
									<div class="carousel-item<?= esc_attr( $active_class ); ?> h-100">
										<div class="news-slide">
											<div class="fw-bold fs-body-medium mb-3"><?= esc_html( get_the_title() ); ?></div>
											<div class="mb-4"><?= esc_html( get_the_excerpt() ); ?></div>
											<a href="/insights/" class="has-arrow">Read More<span class="visually-hidden"> about <?= esc_html( get_the_title() ); ?></span></a>
										</div>
									</div>
									<?php
									++$slide_index;
								}
								?>
							</div>
							<div class="carousel-indicators pb-5">
								<?php
								for ( $i = 0; $i < $slide_index; $i++ ) {
									$active  = ( 0 === $i ) ? ' active' : '';
									$current = ( 0 === $i ) ? ' aria-current="true"' : '';
									?>
									<button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?= esc_attr( $i ); ?>" class="<?= esc_attr( trim( $active ) ); ?>"<?= $current; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> aria-label="Slide <?= esc_attr( $i + 1 ); ?>"></button>
									<?php
								}
								?>
							</div>
						</div>
						<?php
					}
					wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</div>
</div>
