<?php
/**
 * Footer template for the Harrier Gates 2025 theme.
 *
 * This file contains the footer section of the theme, including navigation menus,
 * office addresses, and colophon information.
 *
 * @package hub-sequoia2025
 */

defined( 'ABSPATH' ) || exit;
?>
<div id="footer-top"></div>

<footer class="footer pt-5 pb-4">
    <div class="container">
        <div class="row pb-4 g-4">
			<div class="col-sm-4">
				<div class="footer-title h3">Contact Us</div>
				<div class="mb-2">
					<?= do_shortcode( '[contact_address]' ); ?>
				</div>
				<div class="mb-3">
					<?= do_shortcode( '[contact_phone]' ); ?>
				</div>
				<?= do_shortcode( '[social_icons class="fa-2x"]' ); ?>
			</div>
			<div class="col-sm-4 pt-sm-5">
				<?=
				wp_nav_menu(
					array(
						'theme_location' => 'footer_menu1',
						'menu_class'     => 'footer__menu',
					)
				);
				?>
            </div>
            <div class="col-sm-4 pt-sm-5">
				<?=
				wp_nav_menu(
					array(
						'theme_location' => 'footer_menu2',
						'menu_class'     => 'footer__menu',
					)
				);
				?>
				<div class="mt-3">
					&copy; <?= esc_html( gmdate( 'Y' ) ); ?> Sequoia Investment Management Company Limited
				</div>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>

</html>