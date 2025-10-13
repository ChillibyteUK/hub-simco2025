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
		<div class="row g-4">
			<div class="col-md-4">
				<h2 class="mb-4">Contact Us</h2>
				<div class="mb-4">
					<div class="mb-2">SIMCo</div>
					<?= do_shortcode( '[contact_address]' ); ?>
				</div>
				<div class="mb-5">
					<?= do_shortcode( '[contact_phone]' ); ?>
				</div>
				<iframe src="<?= esc_url( get_field( 'map_embed_code', 'option' ) ); ?>" width="100%" height="auto" style="aspect-ratio:1;border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<div class="col-md-8">
				<?= do_shortcode( '[gravityform id="' . get_field( 'contact_form_id' ) . '" title="false" ajax="true"]' ); ?>
			</div>
		</div>
	</div>
</section>