<?php
/**
 * Block template for HUB Careers Form.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="careers has-light-grey-background-color">
	<div class="container py-5">
		<h2 class="mb-4"><?= esc_html( get_field( 'title' ) ); ?></h2>
		<div class="mb-4"><?= wp_kses_post( get_field( 'intro' ) ); ?></div>
		<div class="row g-4">
			<div class="col-md-10 offset-md-1">
				<?= do_shortcode( '[gravityform id="' . get_field( 'careers_form_id' ) . '" title="false" ajax="true"]' ); ?>
			</div>
		</div>
	</div>
</section>