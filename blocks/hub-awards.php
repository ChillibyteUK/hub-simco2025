<?php
/**
 * Block template for HUB Awards.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="awards">
	<div class="container py-5">
		<h2 class="h3 mb-4 text-center" data-aos="fade-up"><?= esc_html( get_field( 'intro_title' ) ); ?></h2>
		<div class="row g-5">
			<div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
				<?php
				if ( get_field( 'award_link_1' ) ) {
					$l1 = get_field( 'award_link_1' );
					?>
					<a href="<?= esc_url( $l1['url'] ); ?>" class="text-center awards__item" target="_blank" rel="noopener">
					<?php
				} else {
					?>
				<div class="text-center awards__item">
					<?php
				}
				?>
					<?php
					$award_logo_1     = get_field( 'award_logo_1' );
					$award_logo_1_alt = get_post_meta( $award_logo_1, '_wp_attachment_image_alt', true );
					if ( empty( $award_logo_1_alt ) ) {
						$award_logo_1_alt = get_field( 'award_title_1' );
					}
					?>
				<?=
				wp_get_attachment_image(
					$award_logo_1,
					'full',
					false,
					array(
						'class' => 'awards__image mb-3',
						'alt'   => esc_attr( $award_logo_1_alt ),
					)
				);
				?>
				<h2 class="h3 fw-bold"><?= esc_html( get_field( 'award_title_1' ) ); ?></h2>
				<div><?= wp_kses_post( get_field( 'award_detail_1' ) ); ?></div>
				<?php
				if ( get_field( 'award_link_1' ) ) {
					?>
					</a>
					<?php
				} else {
					?>
					</div>
					<?php
				}
				?>
			</div>
			<div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
				<?php
				if ( get_field( 'award_link_2' ) ) {
					$l2 = get_field( 'award_link_2' );
					?>
					<a href="<?= esc_url( $l2['url'] ); ?>" class="text-center awards__item" target="_blank" rel="noopener">
					<?php
				} else {
					?>
				<div class="text-center awards__item">
					<?php
				}
				?>
					<?php
					$award_logo_2     = get_field( 'award_logo_2' );
					$award_logo_2_alt = get_post_meta( $award_logo_2, '_wp_attachment_image_alt', true );
					if ( empty( $award_logo_2_alt ) ) {
						$award_logo_2_alt = get_field( 'award_title_2' );
					}
					?>
				<?=
				wp_get_attachment_image(
					$award_logo_2,
					'full',
					false,
					array(
						'class' => 'awards__image mb-3',
						'alt'   => esc_attr( $award_logo_2_alt ),
					)
				);
				?>
				<h2 class="h3 fw-bold"><?= esc_html( get_field( 'award_title_2' ) ); ?></h2>
				<div><?= wp_kses_post( get_field( 'award_detail_2' ) ); ?></div>
				<?php
				if ( get_field( 'award_link_2' ) ) {
					?>
					</a>
					<?php
				} else {
					?>
					</div>
					<?php
				}
				?>
			</div>
			<div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
				<?php
				if ( get_field( 'award_link_3' ) ) {
					$l3 = get_field( 'award_link_3' );
					?>
					<a href="<?= esc_url( $l3['url'] ); ?>" class="text-center awards__item" target="_blank" rel="noopener">
					<?php
				} else {
					?>
				<div class="text-center awards__item">
					<?php
				}
				?>
					<?php
					$award_logo_3     = get_field( 'award_logo_3' );
					$award_logo_3_alt = get_post_meta( $award_logo_3, '_wp_attachment_image_alt', true );
					if ( empty( $award_logo_3_alt ) ) {
						$award_logo_3_alt = get_field( 'award_title_3' );
					}
					?>
				<?=
				wp_get_attachment_image(
					$award_logo_3,
					'full',
					false,
					array(
						'class' => 'awards__image mb-3',
						'alt'   => esc_attr( $award_logo_3_alt ),
					)
				);
				?>
				<h2 class="h3 fw-bold"><?= esc_html( get_field( 'award_title_3' ) ); ?></h2>
				<div><?= wp_kses_post( get_field( 'award_detail_3' ) ); ?></div>
				<?php
				if ( get_field( 'award_link_3' ) ) {
					?>
					</a>
					<?php
				} else {
					?>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</section>