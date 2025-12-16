<?php
/**
 * Block template for HUB Icon Full Width.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

$background = get_field( 'background' );
$bg         = ! empty( $background ) && 'Yes' === $background[0] ? 'has-lightest-gold-background-color py-5' : '';

// Get Gutenberg classes.
$classes = isset( $block['className'] ) ? $block['className'] : '';
if ( empty( $classes ) ) {
	$classes = '';
}

?>
<section class="full-width <?= esc_attr( $classes ); ?>">
    <div class="container <?= esc_attr( $bg ); ?>">
		<div class="p-5" data-aos="fade-up">
			<div class="row align-items-center">
				<div class="col-md-2 mb-4 mb-md-0 ps-0">
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
				<div class="col-md-10">
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
				<div class="col-md-10 offset-md-2">
					<?= wp_kses_post( get_field( 'content' ) ); ?>
				</div>
			</div>
		</div>	
    </div>
</section>