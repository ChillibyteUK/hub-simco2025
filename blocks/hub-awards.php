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
		<div class="row">
			<div class="col-md-3 my-auto" data-aos="fade-right">
				<h2 class="h3"><?= esc_html( get_field( 'intro_title' ) ); ?></h2>
				<div><?= wp_kses_post( get_field( 'intro_content' ) ); ?></div>
			</div>
			<div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
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
				<?=
				wp_get_attachment_image(
					get_field( 'award_logo_1' ),
					'full',
					false,
					array(
						'class' => 'awards__image mb-3',
						'alt'   => esc_attr( get_field( 'award_title_1' ) ),
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
			<div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
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
				<?=
				wp_get_attachment_image(
					get_field( 'award_logo_2' ),
					'full',
					false,
					array(
						'class' => 'awards__image mb-3',
						'alt'   => esc_attr( get_field( 'award_title_2' ) ),
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
			<div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
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
				<?=
				wp_get_attachment_image(
					get_field( 'award_logo_3' ),
					'full',
					false,
					array(
						'class' => 'awards__image mb-3',
						'alt'   => esc_attr( get_field( 'award_title_3' ) ),
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