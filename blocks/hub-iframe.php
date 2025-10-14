<?php
/**
 * Block template for HUB iframe.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="hub-iframe">
	<div class="container py-5">
		<?php
		if ( get_field( 'title' ) ) {
			?>
			<h2 class="h2 mb-4" data-aos="fade-up"><?= esc_html( get_field( 'title' ) ); ?></h2>
			<?php
		}
		?>
		<iframe sandbox="allow-same-origin allow-scripts allow-popups allow-forms" src="<?= get_field( 'iframe_url' ); ?>" width="100%" height="725px"></iframe>
	</div>
</section>
<script src="https://polaris.brighterir.com/public/sequoia_fund/chart/share_price_chart/js?scope=eod&amp;intraday_data=intraday_prices"></script>