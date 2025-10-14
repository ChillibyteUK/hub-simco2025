<?php
/**
 * Block template for HUB Link Button.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

$page_link = get_field( 'link' ) ?? null;
if ( ! $page_link ) {
	return;
}
?>
<a href="<?= esc_url( $page_link['url'] ); ?>" target="<?= esc_attr( $page_link['target'] ); ?>" class="link-button"><?= esc_html( $page_link['title'] ); ?></a>