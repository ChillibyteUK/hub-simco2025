<?php
/**
 * Block template for HUB Homepage Hero.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="homepage-hero">
	<div class="homepage-hero__background">
		<?= wp_get_attachment_image( get_field( 'background' ), 'full', false, array( 'alt' => '' ) ); ?>
	</div>
	<div class="homepage-hero__overlay" aria-hidden="true"></div>
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-7">
				<h1 class="has-mid-gold-color mb-5"><?= wp_kses_post( get_field( 'title' ) ); ?></h1>
				<a href="/insights/" class="btn btn-light">Insights</a>
			</div>
		</div>
	</div>
</div>
