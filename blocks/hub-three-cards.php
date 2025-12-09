<?php
/**
 * Block template for HUB Three Cards.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="three-cards">
	<div class="container py-5">
		<?php
		if ( get_field( 'title' ) ) {
			?>
			<h2 class="h2 mb-5" data-aos="fade-up"><?= esc_html( get_field( 'title' ) ); ?></h2>
			<?php
		}
		$cards = get_field( 'cards' ) ?? array();
		if ( ! empty( $cards ) ) {
			?>
		<div class="three-cards__grid">
			<?php
			foreach ( $cards as $i => $c ) {
				?>
				<div class="three-cards__card" data-aos="fade-up" data-aos-delay="<?= esc_attr( 100 * ( $i + 1 ) ); ?>">
					<div class="row align-items-start">
						<?php
						if ( ! empty( $c['image'] ) ) {
							?>
							<?=
							wp_get_attachment_image(
								$c['image'],
								'medium',
								false,
								array(
									'class' => 'card-img-top mb-4 px-4',
									'alt'   => esc_attr( $c['title'] ?? '' ),
								)
							);
							?>
							<?php
						}
						?>
						<div class="three-cards__card-content">
							<?php
							if ( ! empty( $c['title'] ) ) {
								?>
								<h3 class="h5 fw-bold mb-4"><?= esc_html( $c['title'] ); ?></h3>
								<?php
							}
							if ( ! empty( $c['content'] ) ) {
								?>
								<div class="mb-5"><?= wp_kses_post( $c['content'] ); ?></div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
			<?php
		}
		?>
	</div>
</section>