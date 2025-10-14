<?php
/**
 * Block template for HUB Homepage Hero.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="homepage-hero">
	<div class="homepage-hero__background">
		<?= wp_get_attachment_image( get_field( 'background' ), 'full' ); ?>
	</div>
	<div class="homepage-hero__overlay"></div>
	<div class="container h-100 d-flex justify-content-between">
		<div class="row my-auto w-100 justify-content-between h-100">
			<div class="row">
				<div class="col-12 col-md-6 d-flex flex-column justify-content-center">
					<div class="homepage-hero__title"><?= wp_kses_post( get_field( 'message' ) ); ?></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
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
						<div class="hero-swiper swiper d-flex flex-column justify-content-between" style="height: 100%;">
							<div class="swiper-wrapper">
								<?php
								while ( $q->have_posts() ) {
									$q->the_post();
									?>
									<div class="swiper-slide">
										<div class="news-slide">
											<div class="fw-bold fs-body-medium mb-3"><?= esc_html( get_the_title() ); ?></div>
											<div class="text-secondary-900 mb-4"><?= esc_html( get_the_excerpt() ); ?></div>
											<a href="/insights/" class="read-more">Read More</a>
										</div>
									</div>
									<?php
								}
								?>
							</div>
							<div class="swiper-pagination"></div>
						</div>
						<?php
					}
					wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
add_action(
	'wp_footer',
	function () {
		?>
		<script>
document.addEventListener('DOMContentLoaded', function() {
	const swiper = new Swiper('.hero-swiper', {
		loop: true,
		autoplay: {
			delay: 4000,
			disableOnInteraction: false,
		},
		effect: 'fade',
		fadeEffect: {
			crossFade: true
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		}
	});
});
	</script>
		<?php
	}
);
