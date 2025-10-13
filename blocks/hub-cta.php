<?php
/**
 * Block template for HUB CTA.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

$button = get_field( 'link' );
?>
<section class="hub-cta py-5">
	<div class="container py-5">
		<div class="row">
			<div class="col-md-8">
				<h2 class="large-text-on-image"><?= wp_kses_post( get_field( 'content' ) ); ?></h2>
			</div>
			<div class="col-md-4 my-auto text-md-end text-center">
				<a class="btn btn-primary" href="<?= esc_url( $button['url'] ); ?>">
					<?= esc_html( $button['title'] ); ?>
				</a>
			</div>
		</div>
	</div>
</section>