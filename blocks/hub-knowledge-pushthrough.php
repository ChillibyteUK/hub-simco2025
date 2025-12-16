<?php
/**
 * Block template for HUB Knowledge Pushthrough.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="knowledge-pushthrough">

	<div class="knowledge-pushthrough__background">
		<?= wp_get_attachment_image( get_field( 'image' ), 'full', false, array( 'alt' => '' ) ); ?>
	</div>
	<div class="knowledge-pushthrough__overlay" aria-hidden="true"></div>

	<div class="container py-5">
		<div class="row align-items-center">
            <div class="col-lg-6 h-100 my-auto">
                <div class="ps-xl-3 py-5 my-auto <?= esc_attr( $text_alignment ); ?>" data-aos="<?= esc_attr( $text_aos ); ?>">
                    <h2 class="h2 d-none d-lg-block"><?= esc_html( get_field( 'title' ) ); ?></h2>
					<?= wp_kses_post( get_field( 'content' ) ); ?>
					<?php
					if ( get_field( 'button' ) ?? null ) {
						$l      = get_field( 'button' );
						$target = $l['target'] ? $l['target'] : '_self';
                        ?>
					<div>
					<a href="<?= esc_url( $l['url'] ); ?>"
						class="btn btn-light mx-auto mt-4 ms-md-0"
						target="<?= esc_attr( $target ); ?>"><?= esc_html( $l['title'] ); ?></a>
					</div>
						<?php
					}
					?>
                </div>
            </div>
        </div>
    </div>
</section>