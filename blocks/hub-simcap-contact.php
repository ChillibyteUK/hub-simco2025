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
			<div class="col-md-6">
				<h2 class="has-h-2-font-size mb-4 text-white"><?= wp_kses_post( get_field( 'title' ) ); ?></h2>
				<div class="simcap-contact__content mb-5"><?= wp_kses_post( get_field( 'content' ) ); ?></div>
			</div>
			<div class="col-md-6">
				<?= do_shortcode( get_field( 'gf_shortcode' ) ); ?>
			</div>
		</div>
	</div>
</section>