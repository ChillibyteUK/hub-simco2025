<?php
/**
 * Block template for HUB Button.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

$button_link = get_field( 'button_link' ) ?? null;
if ( ! $button_link ) {
	return;
}
?>
<a href="<?= esc_url( $button_link['url'] ); ?>"
	class="btn btn-primary"
	target="<?= esc_attr( $button_link['target'] ); ?>"><?= esc_html( $button_link['title'] ); ?></a>