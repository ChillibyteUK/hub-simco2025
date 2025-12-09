<?php
/**
 * Block template for HUB Doc Feature.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="doc-feature has-lightest-grey-background-color py-5" style="overflow: hidden;">
	<div class="container">
		<h2 data-aos="fade-right" class="mb-5"><?= esc_html( get_field( 'title' ) ); ?></h2>
		<div class="row g-5 align-items-center">
			<div class="col-md-3">
				<?php
				$image       = get_field( 'featured_doc_cover' );
				$l           = get_field( 'featured_doc_file' );
				$block_title = get_field( 'title' );

				if ( $image ) {
					// Get image alt text from media library.
					$image_alt = get_post_meta( $image, '_wp_attachment_image_alt', true );

					// If no alt text, try using the file title if different from block title.
					if ( empty( $image_alt ) && ! empty( $l['title'] ) && $l['title'] !== $block_title ) {
						$image_alt = $l['title'];
					}

					// Fall back to generic text.
					if ( empty( $image_alt ) ) {
						$image_alt = 'Document cover image';
					}
					?>
					<a href="<?= esc_url( $l['url'] ); ?>" target="_blank">
						<?=
						wp_get_attachment_image(
							$image,
							'full',
							false,
							array(
								'data-aos' => 'fade-up',
								'alt'      => esc_attr( $image_alt ),
							)
						);
						?>
					</a>
					<?php
				}
				?>
			</div>
			<div class="col-md-9">
				<div data-aos="fade-left" data-aos-delay="200">
				<?php
				if ( get_field( 'intro' ) ) {
					?>
					<div class="mb-4"><?= wp_kses_post( get_field( 'intro' ) ); ?></div>
					<?php
				}
				if ( have_rows( 'docs' ) ) {
					$i = 0;
					while ( have_rows( 'docs' ) ) {
						the_row();
						$file = get_sub_field( 'file' );
						if ( empty( $file ) ) {
							continue;
						}
						$file_url  = $file['url'];
						$file_name = ! empty( $file['title'] ) ? $file['title'] : basename( $file_url );
						$file_ext  = pathinfo( $file_url, PATHINFO_EXTENSION );
						?>
				<a href="<?= esc_url( $file_url ); ?>" class="doc-list__item has-lightest-grey-background-color d-block mb-3 p-3 text-decoration-none" target="_blank" rel="noopener">
					<div class="row g-4 align-items-center">
						<div class="col-md-2">
							<div class="doc-list__date">
								<?= esc_html( get_sub_field( 'date' ) ); ?>
							</div>
						</div>
						<div class="col-md-8">
							<div class="doc-list__details">
								<div class="doc-list__filename"><?= esc_html( get_sub_field( 'file_title' ) ); ?></div>
							</div>
						</div>
						<div class="col-md-2 text-md-end">
							<div class="doc-list__icon">
								<img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/' . strtolower( $file_ext ) . '-icon.svg' ); ?>" alt="<?= esc_attr( strtoupper( $file_ext ) . ' icon' ); ?>" width="50" height="50">
							</div>
						</div>
					</div>
				</a>
						<?php
						++$i;
					}
				}
				?>
				</div>
			</div>
		</div>
	</div>

</section>