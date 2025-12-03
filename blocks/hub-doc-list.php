<?php
/**
 * Block template for HUB Doc List.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="doc-list has-lightest-grey-background-color py-5">
	<div class="container">
		<?php
		if ( get_field( 'title' ) ) {
			?>
			<h2 class="h2 mb-5" data-aos="fade-up"><?= esc_html( get_field( 'title' ) ); ?></h2>
			<?php
		}
		if ( get_field( 'intro' ) ) {
			?>
			<div class="mb-5" data-aos="fade-up"><?= wp_kses_post( get_field( 'intro' ) ); ?></div>
			<?php
		}
		if ( have_rows( 'files' ) ) {
			$i = 0;
			echo '<div class="row"><div class="col-md-10 offset-md-1">'; // Added wrapper for centering.
			while ( have_rows( 'files' ) ) {
				the_row();
				$file = get_sub_field( 'file' );
				if ( empty( $file ) ) {
					continue;
				}
				$file_url  = $file['url'];
				$file_name = ! empty( $file['title'] ) ? $file['title'] : basename( $file_url );
				$file_ext  = pathinfo( $file_url, PATHINFO_EXTENSION );
				?>
			<div data-aos="fade-up" data-aos-delay="<?= esc_attr( 100 * ( $i + 1 ) ); ?>">
				<a href="<?= esc_url( $file_url ); ?>" class="doc-list__item d-block px-3 py-4 text-decoration-none" target="_blank" rel="noopener">
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
						<div class="col-md-2 text-end">
							<div class="doc-list__icon">
								<img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/' . strtolower( $file_ext ) . '-icon.png' ); ?>" alt="<?= esc_attr( strtoupper( $file_ext ) . ' icon' ); ?>" width="40" height="40">
							</div>
						</div>
					</div>
				</a>
			</div>
				<?php
				++$i;
			}
			if ( get_field( 'post_content' ) ) {
				?>
				<div class="mt-5" data-aos="fade-up">
					<?= wp_kses_post( get_field( 'post_content' ) ); ?>
				</div>
				<?php
			}
			echo '</div></div>'; // Close centering wrapper.
		}

		?>
	</div>
</section>