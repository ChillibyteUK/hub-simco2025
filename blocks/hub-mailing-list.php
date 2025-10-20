<?php
/**
 * Block template for HUB Mailing List.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="mailing-list">
	<div class="container py-5">
		<div class="row g-5">
			<div class="col-md-6">
				<h2 class="h1 mb-4"><?= wp_kses_post( get_field( 'title' ) ); ?></h2>
				<div class="mailing-list__content mb-5"><?= wp_kses_post( get_field( 'content' ) ); ?></div>
			</div>
			<div class="col-md-6">
				<?= do_shortcode( get_field( 'shortcode' ) ); ?>
			</div>
		</div>
	</div>
</section>