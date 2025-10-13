<?php
/**
 * Block template for HUB Text Full-Bleed Image.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

$col_order   = get_field( 'order' );
$image_order = ( 'Image' === $col_order ) ? 'order-lg-1' : 'order-lg-2';
$text_order  = ( 'Image' === $col_order ) ? 'order-lg-2' : 'order-lg-1';

$image_aos = ( 'Image' === $col_order ) ? 'fade-right' : 'fade-left';
$text_aos  = ( 'Image' === $col_order ) ? 'fade-left' : 'fade-right';

$classes = $block['className'] ?? null;

$text_alignment = 'Image' === $col_order ? 'text--right' : 'text--left  ';

$img = get_field( 'image' ) ?
	wp_get_attachment_image( get_field( 'image' ), 'full' ) :
	'<img src="' . get_stylesheet_directory_uri() . '/img/placeholder-800x450.png">';
?>
<section class="split <?= esc_attr( $classes ); ?>">
    <div class="container-fluid">
        <div class="h2 d-lg-none text-center pt-3">
            <?= esc_html( get_field( 'title' ) ); ?>
        </div>
        <div class="row h-100">
            <div class="col-lg-6 split__image <?= esc_attr( $image_order ); ?>">
                <div class="split__image-wrapper" data-aos="<?= esc_attr( $image_aos ); ?>">
                    <?= wp_kses_post( $img ); ?>
                </div>
            </div>
            <div class="col-lg-6 h-100 my-auto <?= esc_attr( $text_order ); ?>">
                <div class="ps-xl-3 py-5 my-auto <?= esc_attr( $text_alignment ); ?>" data-aos="<?= esc_attr( $text_aos ); ?>">
                    <h2 class="h2 d-none d-lg-block"><?= esc_html( get_field( 'title' ) ); ?></h2>
					<?= wp_kses_post( get_field( 'content' ) ); ?>
					<?php
					if ( get_field( 'link' ) ?? null ) {
						$l = get_field( 'link' );
                        ?>
					<a href="<?= esc_url( $l['url'] ); ?>"
						class="btn btn-primary mx-auto ms-md-0"
						target="<?= esc_attr( $l['target'] ); ?>"><?= esc_html( $l['title'] ); ?></a>
						<?php
					}
					?>
                </div>
            </div>
        </div>
    </div>
</section>