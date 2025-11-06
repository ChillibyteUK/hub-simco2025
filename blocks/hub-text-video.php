<?php
/**
 * Block template for HUB Text Video.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

$level = get_field( 'level' ) ? get_field( 'level' ) : 'h2';

$split = get_field( 'split' );

$left = 'col-md-5';
$right = 'col-md-7';

switch ( $split ) {
	case '50-50':
		$left = 'col-md-6';
		$right = 'col-md-6';
		break;
	case '60-40':
		$left = 'col-md-7';
		$right = 'col-md-5';
		break;
}

?>
<section class="text-video">
	<div class="container py-5">
		<<?= esc_html( $level ); ?> class="<?= esc_html( $level ); ?> mb-4" data-aos="fade-right"><?= wp_kses_post( get_field( 'title' ) ); ?></<?= esc_html( $level ); ?>>
		<div class="row g-5">
			<div class="<?= esc_attr( $left ); ?>">
				<div class="text-video__content" data-aos="fade-right">
					<?= wp_kses_post( get_field( 'content' ) ); ?>
				</div>
				<?php
				if ( get_field( 'cta' ) ) {
					$cta = get_field( 'cta' );
					?>
					<p class="mt-4" data-aos="fade-right" data-aos-delay="200"><a class="btn btn--mid-blue" href="<?= esc_url( $cta['url'] ); ?>" target="<?= esc_attr( $cta['target'] ); ?>"><?= esc_html( $cta['title'] ); ?></a></p>
					<?php
				}
				?>
			</div>
			<div class="<?= esc_attr( $right ); ?>">
				<div class="ratio ratio-16x9">
					<iframe src="https://player.vimeo.com/video/<?= esc_attr( get_field( 'vimeo_id' ) ); ?>"></iframe>
				</div>
			</div>
		</div>
	</div>
</section>