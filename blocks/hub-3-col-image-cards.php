<?php
/**
 * Block template for HUB 3 Col Image Cards.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="three-col-image-cards">
	<div class="container py-5">
		<?php
		if ( get_field( 'title' ) ) {
			?>
		<h2 class="mb-4"><?php the_field( 'title' ); ?></h2>
			<?php
		}
		?>
		<div class="row g-3">
			<?php
			while ( have_rows( 'cards' ) ) {
				the_row();
				?>
				<div class="col-12 col-md-4">
					<div class="three-col-image-cards__card">
						<?php
						$image = get_sub_field( 'image' );
						if ( $image ) {
							echo wp_get_attachment_image( $image, 'medium', false, array( 'class' => 'three-col-image-cards__card-image' ) );
						}
						?>
						<div class="three-col-image-cards__card-body">
							<?php the_sub_field( 'title' ); ?>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</section>