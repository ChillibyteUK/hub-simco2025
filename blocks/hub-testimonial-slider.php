<?php
/**
 * Block template for HUB Testimonial Slider.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="testimonial-slider">

	<div class="testimonial-slider__background">
		<?= wp_get_attachment_image( get_field( 'background' ), 'full', false, array( 'alt' => '' ) ); ?>
	</div>
	<div class="testimonial-slider__overlay" aria-hidden="true"></div>


	<div class="container py-5">
		<div class="row align-items-center">
			<h2 class="mb-4"><?= esc_html( get_field( 'title' ) ); ?></h2>
		<?php
		$q = new WP_Query(
			array(
				'post_type'      => 'testimonial',
				'posts_per_page' => -1,
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
			)
		);
		if ( $q->have_posts() ) {
			?>
			<div class="row">
				<div class="col-md-6">
					<div id="testimonialCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="6000">
						<div class="carousel-inner">
							<?php
							$slide_index = 0;
							while ( $q->have_posts() ) {
								$q->the_post();
								$company      = get_field( 'company', get_the_ID() );
								$active_class = ( 0 === $slide_index ) ? ' active' : '';
								?>
								<div class="carousel-item<?= esc_attr( $active_class ); ?>">
									<div class="testimonial-slider__slide h-100 d-flex flex-column justify-content-between">
										<div class="testimonial-slider__quote mb-4">"<?= esc_html( wp_strip_all_tags( get_the_content() ) ); ?>"</div>
										<div class="testimonial-slider__author mt-auto">
											<div><?php echo esc_html( get_the_title() ); ?></div>
											<div><?php echo esc_html( $company ); ?></div>
										</div>
									</div>
								</div>
								<?php
								++$slide_index;
							}
							?>
						</div>
						<div class="carousel-indicators">
							<?php
							for ( $i = 0; $i < $slide_index; $i++ ) {
								$active  = ( 0 === $i ) ? ' active' : '';
								$current = ( 0 === $i ) ? ' aria-current="true"' : '';
								?>
								<button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="<?= esc_attr( $i ); ?>" class="<?= esc_attr( trim( $active ) ); ?>"<?= $current; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> aria-label="Testimonial <?= esc_attr( $i + 1 ); ?>"></button>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		wp_reset_postdata();
		?>
	</div>
</section>