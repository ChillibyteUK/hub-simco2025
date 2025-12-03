<?php
/**
 * Block template for HUB Icon Full Width.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="full-width">
    <div class="container has-lightest-gold-background-color py-5" data-aos="fade-up">
		<div class="row align-items-center mb-4">
			<div class="col-md-2 text-center mb-4 mb-md-0">
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
				<h2 class="h2 mb-4"><?= esc_html( get_field( 'title' ) ); ?></h2>
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
</section>