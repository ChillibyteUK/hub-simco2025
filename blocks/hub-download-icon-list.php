<?php
/**
 * Block template for HUB Download Icon List.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="download-icon-list">
	<div class="container" data-aos="fade-up">
		<?php
		if ( get_field( 'title' ) ) {
			?>
		<h2 class="has-h-5-font-size mb-4"><?php the_field( 'title' ); ?></h2>
			<?php
		}
		while ( have_rows( 'downloads' ) ) {
			the_row();
			$f      = get_sub_field( 'file' );
			$url    = $f['url'];
			$target = '_blank';
			$icon   = get_sub_field( 'icon' );
			?>
			<a href="<?= esc_url( $url ); ?>" target="<?= esc_attr( $target ); ?>" class="download-icon-list__item d-flex align-items-center mb-3">
				<img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/download-icon.svg' ); ?>" alt="<?= esc_attr( get_sub_field( 'title' ) ); ?>" class="download-icon-list__item-icon me-2" />
				<span class="download-icon-list__item-title"><?= esc_html( get_sub_field( 'title' ) ); ?></span>
			</a>
			<?php
		}
		?>
	</div>
</section>