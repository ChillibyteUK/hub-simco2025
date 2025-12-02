<?php
/**
 * Block template for HUB Insights Pushthrough.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="insights-pushthrough">
	<div class="insights-pushthrough__background">
		<?= wp_get_attachment_image( get_field( 'background' ), 'full', false, array( 'alt' => '' ) ); ?>
	</div>
	<div class="insights-pushthrough__overlay" aria-hidden="true"></div>
	<div class="container">
		<div class="row align-items-center py-5">
			<div class="col-lg-4" data-aos="fade">
				<h2 class="mb-4"><?= wp_kses_post( get_field( 'title' ) ); ?></h2>
				<p class="mb-4"><?= wp_kses_post( get_field( 'content' ) ); ?></p>
				<a href="/insights/" class="btn btn-dark">Explore our Insights</a>
			</div>
		</div>
	</div>
</section>