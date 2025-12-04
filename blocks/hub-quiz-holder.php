<?php
/**
 * Block template for HUB Quiz Holder.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="quiz-holder py-5">
	<div class="quiz-holder__overlay"></div>
	<div class="container">
		<h2 class="has-h-3-font-size mb-4"><?= esc_html( get_field( 'title' ) ); ?></h2>
		<div class="quiz-holder__content has-white-background-color p-4">
			<?= do_shortcode( '[gravityform id="' . get_field( 'form_id' ) . '" title="false" ajax="true"]' ); ?>
		</div>
	</div>
</section>