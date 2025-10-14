<?php
/**
 * Block template for HUB Link Button.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

$page_link = get_field( 'link' ) ?? null;
if ( ! $page_link ) {
	// Debug: Show what we're getting
	echo '<!-- DEBUG: Link field is empty or null -->';
	echo '<!-- DEBUG: get_field result: ' . esc_html( print_r( get_field( 'link' ), true ) ) . ' -->';
	return;
}
?>
<div class="container">

	<span>
		<a href="<?= esc_url( $page_link['url'] ); ?>" target="<?= esc_attr( $page_link['target'] ); ?>" class="btn btn--mid-blue"><?= esc_html( $page_link['title'] ); ?></a>
	</span>
</div>