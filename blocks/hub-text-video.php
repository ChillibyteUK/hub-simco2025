<?php
/**
 * Block template for HUB Text Video.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

$level = get_field( 'level' ) ? get_field( 'level' ) : 'h2';

$split = get_field( 'split' );

$left  = 'col-lg-5';
$right = 'col-lg-7';

switch ( $split ) {
	case '40-60':
		$left  = 'col-lg-5';
		$right = 'col-lg-7';
		break;
	case '50-50':
		$left  = 'col-lg-6';
		$right = 'col-lg-6';
		break;
	case '60-40':
		$left  = 'col-lg-7';
		$right = 'col-lg-5';
		break;
	default:
		$left  = 'col-lg-5';
		$right = 'col-lg-7';
		break;
}

?>
<section class="text-video">
	<div class="container py-5">
		<?php
		if ( get_field( 'title' ) ) {
			?>
		<<?= esc_html( $level ); ?> class="<?= esc_html( $level ); ?> mb-4" data-aos="fade-right"><?= wp_kses_post( get_field( 'title' ) ); ?></<?= esc_html( $level ); ?>>
			<?php
		}
		?>
		<div class="row g-5">
			<div class="<?= esc_attr( $left ); ?>">
				<div data-aos="fade-right">
					<?= wp_kses_post( get_field( 'content' ) ); ?>
				</div>
				<?php
				if ( get_field( 'cta' ) ) {
					$cta    = get_field( 'cta' );
					$target = $cta['target'] ? $cta['target'] : '_self';
					?>
					<p class="mt-4" data-aos="fade-right" data-aos-delay="200"><a class="btn btn--mid-blue" href="<?= esc_url( $cta['url'] ); ?>" target="<?= esc_attr( $target ); ?>"><?= esc_html( $cta['title'] ); ?></a></p>
					<?php
				}
				?>
			</div>
			<div class="<?= esc_attr( $right ); ?>">
				<div class="ratio ratio-16x9">
					<?php
					$vimeo_id    = get_field( 'vimeo_id' );
					$block_title = get_field( 'title' );

					// Try to get title from Vimeo API if video is publicly embeddable.
					$video_title = get_vimeo_data_from_id( $vimeo_id, 'title' );

					// Fallback hierarchy: Vimeo title -> Block title -> Generic description.
					if ( ! empty( $video_title ) ) {
						$iframe_title = $video_title;
					} elseif ( ! empty( $block_title ) ) {
						$iframe_title = wp_strip_all_tags( $block_title );
					} else {
						$iframe_title = 'Video player';
					}
					?>
					<iframe src="https://player.vimeo.com/video/<?= esc_attr( $vimeo_id ); ?>" title="<?= esc_attr( $iframe_title ); ?>" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</section>