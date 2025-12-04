<?php
/**
 * File responsible for registering custom ACF blocks and modifying core block arguments.
 *
 * @package hub-sequoia2025
 */

/**
 * Registers custom ACF blocks.
 *
 * This function checks if the ACF plugin is active and registers custom blocks
 * for use in the WordPress block editor. Each block has its own name, title,
 * category, icon, render template, and supports various features.
 */
function acf_blocks() {
    if ( function_exists( 'acf_register_block_type' ) ) {

		// INSERT NEW BLOCKS HERE.

        acf_register_block_type(
            array(
                'name'            => 'hub_knowledge_pushthrough',
                'title'           => __( 'HUB Knowledge Pushthrough' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-knowledge-pushthrough.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_image_feature_text',
                'title'           => __( 'HUB Image Feature Text' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-image-feature-text.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_graphic_hero',
                'title'           => __( 'HUB Graphic Hero' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-graphic-hero.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_download_icon_list',
                'title'           => __( 'HUB Download Icon List' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-download-icon-list.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_icon_accordion_2',
                'title'           => __( 'HUB Icon Accordion 2' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-icon-accordion-2.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_icon_full_width',
                'title'           => __( 'HUB Icon Full Width' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-icon-full-width.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_icon_text_image',
                'title'           => __( 'HUB Icon Text Image' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-icon-text-image.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_team_filter',
                'title'           => __( 'HUB Team Filter' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-team-filter.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_icon_accordion',
                'title'           => __( 'HUB Icon Accordion' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-icon-accordion.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_insights_pushthrough',
                'title'           => __( 'HUB Insights Pushthrough' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-insights-pushthrough.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_fund_info',
                'title'           => __( 'HUB Fund Info' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-fund-info.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_simcap_contact',
                'title'           => __( 'HUB SIMCAP Contact' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-simcap-contact.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_knowledge_disclaimer',
                'title'           => __( 'HUB Knowledge Disclaimer' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-knowledge-disclaimer.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_doc_feature',
                'title'           => __( 'HUB Doc Feature' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-doc-feature.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_mailing_list',
                'title'           => __( 'HUB Mailing List' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-mailing-list.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_testimonial_slider',
                'title'           => __( 'HUB Testimonial Slider' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-testimonial-slider.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_3-col_link_cards',
                'title'           => __( 'HUB 3-Col Link Cards' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-3-col-link-cards.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_latest_insights',
                'title'           => __( 'HUB Latest Insights' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-latest-insights.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_disclaimer',
                'title'           => __( 'HUB Disclaimer' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-disclaimer.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_iframe',
                'title'           => __( 'HUB iframe' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-iframe.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_careers_form',
                'title'           => __( 'HUB Careers Form' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-careers-form.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_contact',
                'title'           => __( 'HUB Contact' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-contact.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_quiz_holder',
                'title'           => __( 'HUB Quiz Holder' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-quiz-holder.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_spinner_grid',
                'title'           => __( 'HUB Spinner Grid' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-spinner-grid.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_doc_list',
                'title'           => __( 'HUB Doc List' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-doc-list.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_three_cards',
                'title'           => __( 'HUB Three Cards' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-three-cards.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_accordion',
                'title'           => __( 'HUB Accordion' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-accordion.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_full_width',
                'title'           => __( 'HUB Full Width' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-full-width.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_text_full-bleed_image',
                'title'           => __( 'HUB Text Full-Bleed Image' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-text-full-bleed-image.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_page_hero',
                'title'           => __( 'HUB Page Hero' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-page-hero.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_awards',
                'title'           => __( 'HUB Awards' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-awards.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_homepage_hero',
                'title'           => __( 'HUB Homepage Hero' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-homepage-hero.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_stat_spinner',
                'title'           => __( 'HUB Stat Spinner' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-stat-spinner.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_text_video',
                'title'           => __( 'HUB Text Video' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-text-video.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_link_button',
                'title'           => __( 'HUB Link Button' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-link-button.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_team',
                'title'           => __( 'HUB Team' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-team.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_listing_details',
                'title'           => __( 'HUB Listing Details' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-listing-details.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_3_col_grey_cards',
                'title'           => __( 'HUB 3 Col Grey Cards' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-3-col-grey-cards.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_4_col_image_cards',
                'title'           => __( 'HUB 4 Col Image Cards' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-4-col-image-cards.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_3_col_image_cards',
                'title'           => __( 'HUB 3 Col Image Cards' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-3-col-image-cards.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_cta',
                'title'           => __( 'HUB CTA' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-cta.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'hub_text_image',
                'title'           => __( 'HUB Text Image' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/hub-text-image.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
					'color'     => array(
						'gradients'  => false,
						'text'       => true,
						'background' => true,
					),
                ),
            )
        );

    }
}
add_action( 'acf/init', 'acf_blocks' );

// Auto-sync ACF field groups from acf-json folder.
add_filter(
	'acf/settings/save_json',
	function ( $path ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.Found
		return get_stylesheet_directory() . '/acf-json';
	}
);

add_filter(
	'acf/settings/load_json',
	function ( $paths ) {
		unset( $paths[0] );
		$paths[] = get_stylesheet_directory() . '/acf-json';
		return $paths;
	}
);

/**
 * Modifies the arguments for specific core block types.
 *
 * @param array  $args The block type arguments.
 * @param string $name The block type name.
 * @return array Modified block type arguments.
 */
function core_block_type_args( $args, $name ) {

	if ( 'core/paragraph' === $name ) {
		$args['render_callback'] = 'modify_core_add_container';
	}
	if ( 'core/heading' === $name ) {
		$args['render_callback'] = 'modify_core_add_container';
	}
	if ( 'core/list' === $name ) {
		$args['render_callback'] = 'modify_core_add_container';
	}
	if ( 'core/separator' === $name ) {
		$args['render_callback'] = 'modify_core_add_container';
	}

    return $args;
}
add_filter( 'register_block_type_args', 'core_block_type_args', 10, 3 );

/**
 * Helper function to detect if footer.php is being rendered.
 *
 * @return bool True if footer.php is being rendered, false otherwise.
 */
function is_footer_rendering() {
    $backtrace = debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_debug_backtrace
    foreach ( $backtrace as $trace ) {
        if ( isset( $trace['file'] ) && basename( $trace['file'] ) === 'footer.php' ) {
            return true;
        }
    }
    return false;
}

/**
 * Adds a container div around the block content unless footer.php is being rendered.
 *
 * @param array  $attributes The block attributes.
 * @param string $content    The block content.
 * @return string The modified block content wrapped in a container div.
 */
function modify_core_add_container( $attributes, $content ) {
    if ( is_footer_rendering() ) {
        return $content;
    }

    ob_start();
    ?>
    <div class="container">
        <?= wp_kses_post( $content ); ?>
    </div>
	<?php
	$content = ob_get_clean();
    return $content;
}
