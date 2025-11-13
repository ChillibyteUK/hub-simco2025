<?php
/**
 * Block template for HUB Page Hero.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

$size = 'short' === get_field( 'size' ) ? 'page-hero--short' : '';
?>
<section class="page-hero <?= esc_attr( $size ); ?>">
	<div class="page-hero__background">
		<?= wp_get_attachment_image( get_field( 'background' ), 'full' ); ?>
	</div>
	<div class="page-hero__overlay"></div>
	<div class="container h-100 d-flex">
		<div class="row my-auto w-100">
			<div class="row">
				<div class="col-12 col-md-6 d-flex flex-column justify-content-center">
					<?php
					if ( get_field( 'pre_title' ) ) {
						?>
					<div class="page-hero__pretitle"><?= wp_kses_post( get_field( 'pre_title' ) ); ?></div>
						<?php
					}
					?>
					<div class="page-hero__title"><?= wp_kses_post( get_field( 'title' ) ); ?></div>
					<div class="page-hero__content"><?= wp_kses_post( get_field( 'content' ) ); ?></div>
				</div>
			</div>
		</div>
	</div>
</section>