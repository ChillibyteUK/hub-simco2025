<?php
/**
 * Block template for HUB Spinner Grid.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="stat_spinner_grid py-5 has-lightest-grey-background-color">
	<div class="container">
		<?php
		if ( get_field( 'title' ) ) {
			?>
			<h2 class="has-h-3-font-size mb-4" data-aos="fade-up"><?= esc_html( get_field( 'title' ) ); ?></h2>
			<?php
		}
		?>
		<div class="row g-3 justify-content-center">
			<?php
			while ( have_rows( 'stat_spinner' ) ) {
				the_row();
				$stat  = get_sub_field( 'value' );
				$label = get_sub_field( 'label' );
				?>
				<div class="col-12 col-md-6 col-lg-4" data-aos="fade">
					<div class="stat_spinner_grid__item has-simco-bluegrey-50-background-color px-3 py-4 text-center">
						<div class="stat_spinner_grid__stat has-stat-font-size fw-bold">
							<?php
							if ( get_sub_field( 'prefix' ) ) {
								?>
							<span class="stat_spinner_grid__prefix"><?= esc_html( get_sub_field( 'prefix' ) ); ?></span>
								<?php
							}
							?>
							<span class="stat_spinner_grid__value"><?= esc_html( $stat ); ?></span>
							<?php
							if ( get_sub_field( 'suffix' ) ) {
								?>
							<span class="stat_spinner_grid__suffix"><?= esc_html( get_sub_field( 'suffix' ) ); ?></span>
								<?php
							}
							?>
						</div>
						<span class="stat_spinner_grid__label"><?= esc_html( $label ); ?></span>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</section>
<?php
add_action(
	'wp_footer',
	function () {
		?>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				const statSpinnerSection = document.querySelector('.stat_spinner_grid');
				if (!statSpinnerSection) return;

				let hasAnimated = false;

				function animateStats() {
					if (hasAnimated) return;
					hasAnimated = true;

					document.querySelectorAll('.stat_spinner_grid__value').forEach(function (el) {
						const value = parseFloat(el.textContent);
						const isDecimal = value % 1 !== 0;
						const decimalPlaces = isDecimal ? (value.toString().split('.')[1] || '').length : 0;
						
						let current = 0;
						const increment = value / 100; // Use smaller increments for smoother animation

						const interval = setInterval(function () {
							current += increment;
							if (current >= value) {
								current = value;
								clearInterval(interval);
							}
							
							// Format the number based on whether it's decimal or integer
							if (isDecimal) {
								el.textContent = current.toFixed(decimalPlaces);
							} else {
								el.textContent = Math.round(current).toLocaleString();
							}
						}, 20);
					});
				}

				// Create intersection observer
				const observer = new IntersectionObserver(function(entries) {
					entries.forEach(function(entry) {
						if (entry.isIntersecting) {
							animateStats();
							observer.unobserve(entry.target);
						}
					});
				}, {
					threshold: 0.5 // Trigger when 50% of the section is visible
				});

				// Start observing the stat spinner section
				observer.observe(statSpinnerSection);
			});
		</script>
		<?php
	}
);