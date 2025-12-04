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
		<h2 class="mb-4">Contact Us</h2>
		<div class="row g-4">
			<div class="col-md-6">
				<iframe src="<?= esc_url( get_field( 'map_embed_code', 'option' ) ); ?>" width="100%" height="auto" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="SIMCo Office Location Map"></iframe>
				<div class="mt-4">
					<div class="mb-2"><strong>SIMCo</strong></div>
					<?= do_shortcode( '[contact_address]' ); ?>
				</div>
				<div class="mb-5">
					<?= do_shortcode( '[contact_phone]' ); ?>
				</div>
			</div>
			<div class="col-md-6">
				<?= do_shortcode( '[gravityform id="' . get_field( 'contact_form_id' ) . '" title="false" ajax="true"]' ); ?>
			</div>
		</div>
	</div>
</section>