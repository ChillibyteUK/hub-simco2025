<?php
/**
 * Block template for HUB Careers Form.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<a id="careers" class="anchor"></a>
<section class="careers has-light-grey-background-color">
	<div class="container py-5">
		<div class="row g-4">
			<div class="col-md-10 offset-md-1">
				<?= do_shortcode( '[gravityform id="' . get_field( 'careers_form_id' ) . '" title="false" ajax="true"]' ); ?>
			</div>
		</div>
	</div>
</section>