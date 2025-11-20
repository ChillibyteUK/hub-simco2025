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
		<div class="row g-5">
			<?php
			while ( have_rows( 'cards' ) ) {
				the_row();
				$l = get_sub_field( 'link' );
				?>
				<div class="col-12 col-md-4">
					<a href="<?= esc_url( $l['url'] ); ?>" target="<?= esc_attr( $l['target'] ); ?>" data-aos="fade-up" class="three-col-link-cards__card">
						<?php
						$image = get_sub_field( 'image' );
						if ( $image ) {
							echo wp_get_attachment_image(
								$image,
								'full',
								false,
								array(
									'class' => 'three-col-link-cards__card-image',
									'alt'   => esc_attr( get_sub_field( 'title' ) ),
								)
							);
						}
						?>
						<div class="three-col-link-cards__card-body">
							<h3><?php the_sub_field( 'title' ); ?></h3>
							<p><?php the_sub_field( 'text' ); ?></p>
						</div>
						<div class="has-arrow">Read More</div>
					</a>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</section>