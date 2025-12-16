<?php
/**
 * Block template for HUB Icon Text Image.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

$col_order   = get_field( 'order' );
$image_order = ( 'Image' === $col_order ) ? 'order-1' : 'order-2';
$text_order  = ( 'Image' === $col_order ) ? 'order-2' : 'order-1';

$fade = ( 'Image' === $col_order ) ? 'fade-right' : 'fade-left';

$section_id = $block['anchor'] ?? null;

$class = $block['className'] ?? 'py-4';

$block_id = $block['id'] ?? null;

if ( $block_id ) {
	?>
<a id="<?= esc_attr( $block_id ); ?>"></a>
	<?php
}
?>
<section class="icon-text-image <?= esc_attr( $class ); ?>" id="<?= esc_attr( $section_id ); ?>">
	<div class="container has-lightest-gold-background-color">
		<div class="row">
			<div class="col-lg-6 p-5 <?= esc_attr( $text_order ); ?>"">
				<div class="" data-aos="fade-up">
					<?php
					if ( get_field( 'icon' ) ) {
						echo wp_get_attachment_image(
							get_field( 'icon' ) ?? '',
							'full',
							false,
							array(
								'class' => 'icon-text-image__icon',
								'alt'   => esc_attr( get_field( 'title' ) . ' Icon' ),
							)
						);
					}
					if ( get_field( 'title' ) ) {
						?>
					<h2 class="mt-3 has-h-3-font-size"><?= wp_kses_post( get_field( 'title' ) ); ?></h2>
						<?php
					}
					?>
					<?= wp_kses_post( get_field( 'content' ) ); ?>
				</div>
			</div>
			<div class="col-lg-6 <?= esc_attr( $image_order ); ?>">
				<?php
				$image = get_field( 'image' );
				if ( $image ) {
					echo wp_get_attachment_image(
						$image,
						'full',
						false,
						array(
							'class'    => 'icon-text-image__image',
							'alt'      => esc_attr( get_field( 'title' ) ),
							'data-aos' => esc_attr( $fade ),
						)
					);
				}
				?>
			</div>
		</div>
	</div>
</section>