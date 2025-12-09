<?php
/**
 * Block template for HUB Icon Full Width.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

$background = get_field( 'background' );
$bg         = ! empty( $background ) && 'Yes' === $background[0] ? 'has-lightest-gold-background-color' : '';

?>
<section class="full-width">
    <div class="container <?= esc_attr( $bg ); ?>">
		<div class="py-5" data-aos="fade-up">
			<div class="row align-items-center">
				<div class="col-md-1 mb-4 mb-md-0">
					<?php
					if ( get_field( 'icon' ) ) {
						echo wp_get_attachment_image(
							get_field( 'icon' ) ?? '',
							'full',
							false,
							array(
								'class' => 'full-width__icon',
								'alt'   => esc_attr( get_field( 'title' ) . ' Icon' ),
							)
						);
					}
					?>
				</div>
				<div class="col-md-11">
					<?php
					if ( get_field( 'title' ) ) {
						?>
					<h2 class="has-h-3-font-size mb-4 mb-md-0"><?= esc_html( get_field( 'title' ) ); ?></h2>
						<?php
					}
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-11 offset-md-1">
					<?= wp_kses_post( get_field( 'content' ) ); ?>
				</div>
			</div>
		</div>	
    </div>
</section>