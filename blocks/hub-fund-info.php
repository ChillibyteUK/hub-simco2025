<?php
/**
 * Block template for HUB Fund Info.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="fund-info">
	<div class="container">
		<div class="row">
			<div class="col-md-6 has-simco-bluegrey-50-background-color has-background d-flex flex-column justify-content-center align-items-center py-5">
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
			<div class="col-md-6 p-0">
				<?=
				wp_get_attachment_image(
					get_field( 'image' ),
					'full',
					false,
					array(
						'class' => 'fund-info__image',
						'alt'   => '',
					)
				);
				?>
			</div>
		</div>
	</div>
</section>