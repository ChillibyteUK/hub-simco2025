<?php
/**
 * Block template for HUB Testimonial Slider.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="testimonial-slider">
	<div class="container py-5">
		<h2 class="h1 text-center has-white-color">What our borrowers say about SIMCo</h2>
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
				<div class="col-md-10 offset-md-1">
					<div class="swiper testimonialSwiper my-4">
						<div class="swiper-wrapper">
							<?php
							while ( $q->have_posts() ) {
								$q->the_post();
								$company = get_field( 'company', get_the_ID() );
								?>
								<div class="swiper-slide">
									<div class="testimonial-slider__slide p-4 h-100 d-flex flex-column justify-content-between text-center">
										<div class="testimonial-slider__quote mb-4">"<?= esc_html( wp_strip_all_tags( get_the_content() ) ); ?>"</div>
										<div class="testimonial-slider__author mt-auto">
											<div><?php echo esc_html( get_the_title() ); ?></div>
											<div><?php echo esc_html( $company ); ?></div>
										</div>
									</div>
								</div>
								<?php
							}
							?>
						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
			<?php
		}
		wp_reset_postdata();
		?>
	</div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
	const testimonialSwiper = new Swiper('.testimonialSwiper', {
		slidesPerView: 1,
		spaceBetween: 30,
		loop: true,
		autoplay: {
			delay: 6000,
			disableOnInteraction: true,
		},
		effect: 'fade',
		fadeEffect: {
			crossFade: true
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
		keyboard: {
			enabled: true,
			onlyInViewport: false,
		},
		a11y: {
			prevSlideMessage: 'Previous testimonial',
			nextSlideMessage: 'Next testimonial',
			paginationBulletMessage: 'Go to testimonial {{index}}',
		},
	});
});
</script>