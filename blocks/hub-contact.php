<?php
/**
 * Block template for HUB Contact.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="contact">
	<div class="container py-5">
		<h2 class="mb-4">Contact us</h2>
		<div class="row g-4">
			<div class="col-md-6 pt-2">
				<a href="<?= esc_url( get_field( 'map_embed_code', 'option' ) ); ?>" target="_blank" rel="noopener noreferrer">
				<img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/SIMCo-Map.jpg' ); ?>" alt="SIMCo map" class="img-fluid mb-4" />
				</a>
				<div class="mt-4">
					<div class="mb-2"><strong>SIMCo</strong></div>
					<?= do_shortcode( '[contact_address]' ); ?>
					<div class="mt-2"><?= esc_html( get_field( 'contact_phone', 'option' ) ); ?></div>
				</div>
			</div>
			<div class="col-md-6">
				<?= do_shortcode( '[gravityform id="' . get_field( 'contact_form_id' ) . '" title="false" ajax="true"]' ); ?>
			</div>
		</div>
	</div>
</section>