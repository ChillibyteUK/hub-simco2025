<?php
/**
 * Block template for HUB Stat Spinner.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="stat_spinner py-5">
	<div class="container">
		<div class="stat_spinner__grid">
			<?php
			while ( have_rows( 'stat_spinner' ) ) {
				the_row();
				$stat  = get_sub_field( 'stat' );
				$label = get_sub_field( 'label' );
				?>
				<div class="stat_spinner__item">
					<div class="stat_spinner__stat">
						<?php
						if ( get_sub_field( 'prefix' ) ) {
							?>
						<span class="stat_spinner__prefix"><?= esc_html( get_sub_field( 'prefix' ) ); ?></span>
							<?php
						}
						?>
						<span class="stat_spinner__value"><?= esc_html( $stat ); ?></span>
						<?php
						if ( get_sub_field( 'suffix' ) ) {
							?>
						<span class="stat_spinner__suffix"><?= esc_html( get_sub_field( 'suffix' ) ); ?></span>
							<?php
						}
						?>
					</div>
					<span class="stat_spinner__label"><?= esc_html( $label ); ?></span>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
<?php
add_action(
	'wp_footer',
	function () {
		?>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				const statSpinnerSection = document.querySelector('.stat_spinner');
				if (!statSpinnerSection) return;

				let hasAnimated = false;

				function animateStats() {
					if (hasAnimated) return;
					hasAnimated = true;

					document.querySelectorAll('.stat_spinner__value').forEach(function (el) {
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