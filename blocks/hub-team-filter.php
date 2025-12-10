<?php
/**
 * Hub Team Filter component.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

/* Fetch departments from taxonomy. */
$departments = get_terms(
	array(
		'taxonomy'   => 'department',
		'hide_empty' => true,
	)
);

/* Read query params for initial state. */
$selected_dept = isset( $_GET['dept'] ) ? sanitize_text_field( wp_unslash( $_GET['dept'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
$search_q      = isset( $_GET['q'] ) ? sanitize_text_field( wp_unslash( $_GET['q'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
?>
<section class="hub-team-filter container mb-5" id="team-filter" aria-label="Team Filters">
	<div class="row g-3 align-items-center">
		<div class="col-12 col-lg-1 fw-bold">Search</div>
		<div class="col-12 col-md-6 col-lg-4">
      		<input aria-label="Search team by name" id="team-q" type="search" class="form-control" placeholder="Type a name…" value="<?= esc_attr( $search_q ); ?>" />
    	</div>
		<div class="col-12 col-md-6 col-lg-4">
      		<select id="team-dept" class="form-select">
        		<option value="">All departments</option>
        		<?php
				foreach ( $departments as $dept_term ) {
					?>
          		<option value="<?= esc_attr( $dept_term->slug ); ?>" <?= selected( $selected_dept, $dept_term->slug, false ); ?>>
            		<?= esc_html( $dept_term->name ); ?>
          		</option>
        			<?php
				}
				?>
      		</select>
    	</div>
		<div class="col-12 col-lg-3">
			<button id="team-filter-reset" type="button" class="btn btn-light w-100 no-arrow">Reset filters</button>
		</div>
  	</div>
  	<div class="visually-hidden" aria-live="polite" id="team-filter-status"></div>
</section>
