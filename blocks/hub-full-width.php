<?php
/**
 * Block template for HUB Full Width.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;

$bg = get_field( 'bg_colour' ) ? 'has-' . get_field( 'bg_colour' ) . '-background-color' : '';
$fg = get_field( 'fg_colour' ) ? 'has-' . get_field( 'fg_colour' ) . '-color' : '';
$sl = get_field( 'has_slant' ) ? 'has-slanted-bg' : 'py-5';

?>
<section class="full-width <?= esc_attr( $bg . ' ' . $fg . ' ' . $sl ); ?>">
    <div class="container" data-aos="fade-up">
		<?php
		if ( get_field( 'title' ) ) {
			?>
			<h2 class="h2 mb-4"><?= esc_html( get_field( 'title' ) ); ?></h2>
			<?php
		}
		?>
        <?= wp_kses_post( get_field( 'content' ) ); ?>
    </div>
</section>