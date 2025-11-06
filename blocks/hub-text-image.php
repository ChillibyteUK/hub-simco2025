<?php
/**
 * Block template for HUB Text Image.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

$col_order   = get_field( 'order' );
$image_order = ( 'Image' === $col_order ) ? 'order-1' : 'order-2';
$text_order  = ( 'Image' === $col_order ) ? 'order-2' : 'order-1';

$image_aos = ( 'Image' === $col_order ) ? 'fade-right' : 'fade-left';
$text_aos  = ( 'Image' === $col_order ) ? 'fade-left' : 'fade-right';

$layout      = get_field( 'layout' ) ? get_field( 'layout' ) : '50-50';
$image_width = '50-50' === $layout ? 'col-md-6' : 'col-md-4';
$text_width  = '50-50' === $layout ? 'col-md-6' : 'col-md-8';

$constrain    = 'no' === get_field( 'constrain_image' ) ? '' : 'image-16x9';
$image_margin = 'no' === get_field( 'constrain_image' ) ? 'my-auto' : '';

$bg = get_field( 'bg_colour' ) ? 'has-' . get_field( 'bg_colour' ) . '-background-color' : '';
$fg = get_field( 'fg_colour' ) ? 'has-' . get_field( 'fg_colour' ) . '-color' : '';
$sl = get_field( 'has_slant' ) ? 'has-slanted-bg' : 'py-5';

$section_id = $block['anchor'] ?? null;

$link = get_field( 'link' );
$link_url = $link ? $link['url'] : '';

$link_image  = get_field( 'link_image' )[0] ?? null;
$show_button = get_field( 'show_button' )[0] ?? null;

?>
<section class="text-image <?= esc_attr( $bg . ' ' . $fg . ' ' . $sl ); ?>" id="<?= esc_attr( $section_id ); ?>">
	<div class="container py-5">
		<div class="row g-5">
			<div class="<?= esc_attr( $text_width ); ?> <?= esc_attr( $text_order ); ?>" data-aos="<?= esc_attr( $text_aos ); ?>">
				<h2><?= wp_kses_post( get_field( 'title' ) ); ?></h2>
				<?= wp_kses_post( get_field( 'content' ) ); ?>
				<?php
				if ( $show_button && $link_url ) {
					?>
					<a href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link['target'] ); ?>" class="btn btn--mid-blue mt-3"><?= esc_html( $link['title'] ); ?></a>
					<?php
				}
				?>
			</div>
			<div class="<?= esc_attr( $image_margin ); ?> <?= esc_attr( $image_width ); ?> <?= esc_attr( $image_order ); ?>" data-aos="<?= esc_attr( $image_aos ); ?>">
				<div class="<?= esc_attr( $constrain ); ?> my-auto h-100">
					<?php
					if ( $link_image && $link_url ) {
						?>
						<a href="<?= esc_url( $link_url ); ?>">
							<?= wp_get_attachment_image( get_field( 'image' ), 'full', false, array( 'class' => '' ) ); ?>
						</a>
						<?php
					} else {
						echo wp_get_attachment_image( get_field( 'image' ), 'full', false, array( 'class' => '' ) );
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>