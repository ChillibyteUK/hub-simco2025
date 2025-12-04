<?php
/**
 * Block template for HUB Accordion.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

// Generate unique ID for this accordion instance.
$accordion_id = 'accordion-' . uniqid();

?>
<section class="accordion-block <?= esc_attr( $classes ); ?>">
	<div class="container" data-aos="fade-up">
		<?php
		if ( get_field( 'title' ) ) {
			?>
			<h2 class="h2 mb-4"><?= esc_html( get_field( 'title' ) ); ?></h2>
			<?php
		}
		if ( get_field( 'intro' ) ) {
			?>
			<div class="mb-5"><?= wp_kses_post( get_field( 'intro' ) ); ?></div>
			<?php
		}
		$items = get_field( 'items' ) ?? array();

		if ( ! empty( $items ) ) {
			?>
		<div class="accordion" id="<?= esc_attr( $accordion_id ); ?>">
			<?php
			foreach ( $items as $i => $it ) {
				$collapsed = ( 0 === $i ) ? '' : 'collapsed';
				$show      = ( 0 === $i ) ? 'show' : '';
				$expanded  = ( 0 === $i ) ? 'true' : 'false';
				?>
			<div class="accordion-item mb-3" data-aos="fade-up" data-aos-delay="<?= esc_attr( 100 * ( $i + 1 ) ); ?>">
				<h2 class="accordion-header" id="heading-<?= esc_attr( $accordion_id . '-' . $i ); ?>">
					<button class="accordion-button <?= esc_attr( $collapsed ); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= esc_attr( $accordion_id . '-' . $i ); ?>" aria-expanded="<?= esc_attr( $expanded ); ?>" aria-controls="collapse-<?= esc_attr( $accordion_id . '-' . $i ); ?>">
						<?= esc_html( $it['title'] ?? '' ); ?>
					</button>
				</h2>
				<div id="collapse-<?= esc_attr( $accordion_id . '-' . $i ); ?>" class="accordion-collapse collapse <?= esc_attr( $show ); ?>" aria-labelledby="heading-<?= esc_attr( $accordion_id . '-' . $i ); ?>" data-bs-parent="#<?= esc_attr( $accordion_id ); ?>">
					<div class="accordion-body">
						<?= wp_kses_post( $it['content'] ?? '' ); ?>
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