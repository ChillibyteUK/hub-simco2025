<?php
/**
 * Block template for HUB iframe.
 *
 * @package hub-sequoia2025
 */

// phpcs:disable WordPress.WP.EnqueuedResources.NonEnqueuedScript

defined( 'ABSPATH' ) || exit;
?>
<section class="hub-iframe">
	<div class="container py-5">
		<?php
		if ( get_field( 'title' ) ) {
			?>
			<h2 class="has-h-3-font-size mb-4" data-aos="fade-up"><?= esc_html( get_field( 'title' ) ); ?></h2>
			<?php
		}
		?>
		<iframe sandbox="allow-same-origin allow-scripts allow-popups allow-forms" src="<?= esc_url( get_field( 'iframe_url' ) ); ?>" width="100%" height="725px" title="<?= esc_attr( get_field( 'title' ) ? get_field( 'title' ) : 'Embedded content' ); ?>"></iframe>
	</div>
</section>
<?php
add_action(
	'wp_footer',
	function () {
		static $script_added = false;
		if ( $script_added ) {
			return;
		}
		$script_added = true;
		?>
<script src="https://polaris.brighterir.com/public/sequoia_fund/chart/share_price_chart/js?scope=eod&amp;intraday_data=intraday_prices" defer></script>
		<?php
	}
);