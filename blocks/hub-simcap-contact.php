<?php
/**
 * Block template for HUB SIMCAP Contact.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="simcap-contact">
	<div class="container py-5">
		<div class="row g-5">
			<div class="col-md-4">
				<h2 class="h1 mb-4 text-white"><?= wp_kses_post( get_field( 'title' ) ); ?></h2>
				<div class="simcap-contact__content mb-5"><?= wp_kses_post( get_field( 'content' ) ); ?></div>
			</div>
			<div class="col-md-8">
				<?= do_shortcode( get_field( 'gf_shortcode' ) ); ?>
			</div>
		</div>
	</div>
</section>