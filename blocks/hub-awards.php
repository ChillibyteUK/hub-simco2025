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
			<div class="col-md-3 text-center awards__item" data-aos="fade-up" data-aos-delay="100">
				<?= wp_get_attachment_image( get_field( 'award_logo_1' ), 'full', false, array( 'class' => 'awards__image mb-3' ) ); ?>
				<h2 class="h3"><?= esc_html( get_field( 'award_title_1' ) ); ?></h2>
				<div><?= wp_kses_post( get_field( 'award_detail_1' ) ); ?></div>
			</div>
			<div class="col-md-3 text-center awards__item" data-aos="fade-up" data-aos-delay="200">
				<?= wp_get_attachment_image( get_field( 'award_logo_2' ), 'full', false, array( 'class' => 'awards__image mb-3' ) ); ?>
				<h2 class="h3"><?= esc_html( get_field( 'award_title_2' ) ); ?></h2>
				<div><?= wp_kses_post( get_field( 'award_detail_2' ) ); ?></div>
			</div>
			<div class="col-md-3 text-center awards__item" data-aos="fade-up" data-aos-delay="300">
				<?= wp_get_attachment_image( get_field( 'award_logo_3' ), 'full', false, array( 'class' => 'awards__image mb-3' ) ); ?>
				<h2 class="h3"><?= esc_html( get_field( 'award_title_3' ) ); ?></h2>
				<div><?= wp_kses_post( get_field( 'award_detail_3' ) ); ?></div>
			</div>
		</div>
	</div>
</section>