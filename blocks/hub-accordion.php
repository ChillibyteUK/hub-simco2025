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
	<div class="container">
		<?php
		if ( get_field( 'title' ) ) {
			?>
			<h2 class="has-h-5-font-size mb-4"><?= esc_html( get_field( 'title' ) ); ?></h2>
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
				?>
			<div class="accordion-item mb-3">
				<h3 class="accordion-header mb-0">
					<button class="accordion-button px-0 py-3" type="button" data-toggle-content="#content-<?= esc_attr( $accordion_id . '-' . $i ); ?>">
						<?= esc_html( $it['title'] ?? '' ); ?>
					</button>
				</h3>
				<div id="content-<?= esc_attr( $accordion_id . '-' . $i ); ?>" class="accordion-content is-open">
					<div class="accordion-body">
						<div class="accordion-body__inner"><?= wp_kses_post( $it['content'] ?? '' ); ?></div>
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