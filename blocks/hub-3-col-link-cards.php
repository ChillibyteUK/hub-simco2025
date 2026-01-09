<?php
/**
 * Block template for HUB 3-Col Link Cards.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="three-col-link-cards">
	<div class="container py-5">
		<?php
		if ( get_field( 'title' ) ) {
			?>
		<h2 class="mb-4" data-aos="fade-right"><?php the_field( 'title' ); ?></h2>
			<?php
		}
		?>
		<div class="three-col-link-cards__grid">
			<?php
			while ( have_rows( 'cards' ) ) {
				the_row();
				$l      = get_sub_field( 'link' );
				$target = $l['target'] ? $l['target'] : '_self';
				?>
				<a href="<?= esc_url( $l['url'] ); ?>" target="<?= esc_attr( $target ); ?>" data-aos="fade-up" class="three-col-link-cards__card">
						<?php
						$logo = get_sub_field( 'logo' );
						if ( $logo ) {
							$align = 'Center' === get_sub_field( 'align_logo' ) ? 'mx-auto d-block' : '';
							echo wp_get_attachment_image(
								$logo,
								'full',
								false,
								array(
									'class' => 'three-col-link-cards__card-logo ' . $align,
									'alt'   => esc_attr( get_sub_field( 'title' ) ),
								)
							);
						} else {
							echo '<div class="three-col-link-cards__card-logo--placeholder"></div>';
						}
						?>
						<div class="three-col-link-cards__card-body">
							<h3><?php the_sub_field( 'title' ); ?></h3>
							<p><?php the_sub_field( 'text' ); ?></p>
							<div class="read-more">Read More</div>
						</div>
				</a>
				<?php
			}
			?>
		</div>
	</div>
</section>