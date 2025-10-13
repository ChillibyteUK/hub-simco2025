<?php
/**
 * Block template for HUB Team.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

$team = get_field( 'team' );

$cards = get_field( 'cards' ) ? get_field( 'cards' ) : 'three-cards';

?>
<section class="hub-team mb-4">
	<div class="container">
		<h2 class="mb-4"><?= esc_html( $team->name ); ?></h2>
	</div>
	<div class="container hub-team__grid py-4 <?= esc_attr( $cards ); ?>">
		<?php
		$q = new WP_Query(
			array(
				'post_type'      => 'person',
				'posts_per_page' => -1,
				'tax_query'      => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
					array(
						'taxonomy' => 'team',
						'field'    => 'id',
						'terms'    => $team->term_id,
					),
				),
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
			)
		);

		while ( $q->have_posts() ) {
			$q->the_post();
			?>
			<div class="hub-team__card" data-aos="fade">
				<div class="hub-team__image-wrapper">
					<?= get_the_post_thumbnail( get_the_ID(), 'large', array( 'class' => 'hub-team__image' ) ); ?>
				</div>
				<div class="px-4 py-2 hub-team__name-holder">
					<div class="hub-team__name pb-2 fw-bold fs-h4-body-bold"><?= esc_html( get_the_title( get_the_ID() ) ); ?></div>
					<div class="hub-team__title"><?= wp_kses_post( get_field( 'title', get_the_ID() ) ); ?></div>
				</div>
				<div class="detail-content" hidden>
					<p><?= wp_kses_post( get_the_content() ); ?></p>
				</div>
			</div>
			<?php
		}
		wp_reset_postdata();
		?>
	</div>
</section>
