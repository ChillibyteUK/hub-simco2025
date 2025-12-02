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
		<h2 class="mb-4" data-aos="fade-up"><?= esc_html( get_field( 'intro_title' ) ); ?></h2>
		<p class="has-lead-in-font-size w-constrained-md mb-4" data-aos="fade-up" data-aos-delay="100"><?= wp_kses_post( get_field( 'intro_content' ) ); ?></p>
		<div class="row g-5">
			<?php
			for ( $i = 1; $i <= 3; $i++ ) {
				$award_link   = get_field( "award_link_$i" );
				$award_logo   = get_field( "award_logo_$i" );
				$award_title  = get_field( "award_title_$i" );
				$award_detail = get_field( "award_detail_$i" );
				$aos_delay    = $i * 100;

				// Get alt text, fallback to title if empty.
				$award_logo_alt = get_post_meta( $award_logo, '_wp_attachment_image_alt', true );
				if ( empty( $award_logo_alt ) ) {
					$award_logo_alt = $award_title;
				}

				// Determine wrapper tag.
				$wrapper_tag   = $award_link ? 'a' : 'div';
				$wrapper_attrs = $award_link ? sprintf( ' href="%s" target="_blank" rel="noopener"', esc_url( $award_link['url'] ) ) : '';
				?>
				<div class="col-md-4" data-aos="fade-up" data-aos-delay="<?= esc_attr( $aos_delay ); ?>">
					<<?= esc_html( $wrapper_tag ); ?><?php echo $wrapper_attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> class="text-center awards__item">
						<?=
						wp_get_attachment_image(
							$award_logo,
							'full',
							false,
							array(
								'class' => 'awards__image mb-3',
								'alt'   => esc_attr( $award_logo_alt ),
							)
						);
						?>
						<h3 class="h5 fw-bold"><?= esc_html( $award_title ); ?></h3>
						<div class="px-md-5"><?= wp_kses_post( $award_detail ); ?></div>
					</<?= esc_html( $wrapper_tag ); ?>>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</section>