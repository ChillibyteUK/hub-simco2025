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
	<div class="container h-100 d-flex">
		<div class="row my-auto w-100">
			<div class="row">
				<div class="col-12 col-md-6 d-flex flex-column justify-content-center">
					<div class="homepage-hero__title"><?= wp_kses_post( get_field( 'message' ) ); ?></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					NEWS SLIDER HERE
				</div>
			</div>
		</div>
	</div>
</section>
