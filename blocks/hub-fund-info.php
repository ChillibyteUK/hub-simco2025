<?php
/**
 * Block template for HUB Fund Info.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="fund-info">
	<div class="fund-info__title">
		<?= wp_kses_post( get_field( 'title' ) ); ?>
	</div>
	<div class="fund-info__value">
		<?= wp_kses_post( get_field( 'value' ) ); ?>
	</div>
	<div class="fund-info__after">
		<?= wp_kses_post( get_field( 'after' ) ); ?>
	</div>
</div>