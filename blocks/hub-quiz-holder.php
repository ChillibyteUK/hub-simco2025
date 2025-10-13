<?php
/**
 * Block template for HUB Quiz Holder.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="quiz-holder has-lightest-grey-background-color py-5">
	<div class="container">
		<h2><?= esc_html( get_field( 'title' ) ); ?></h2>
		<div class="quiz-holder__content has-white-background-color p-4 p-md-5 mt-4">
			<?= do_shortcode( '[gravityform id="' . get_field( 'form_id' ) . '" title="false" ajax="true"]' ); ?>
		</div>
	</div>
</section>