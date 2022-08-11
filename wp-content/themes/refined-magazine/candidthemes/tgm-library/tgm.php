<?php
/**
 * Recommended plugins
 *
 * @package Prefer 1.0.0
 */

if ( ! function_exists( 'refined_magazine_recommended_plugins' ) ) :

    /**
     * Recommend plugin list.
     *
     * @since 1.0.0
     */
    function refined_magazine_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'One Click Demo Import', 'refined-magazine' ),
                'slug'     => 'one-click-demo-import',
                'required' => false,
            ),
            array(
                'name'     => __( 'Candid Advanced Toolset', 'refined-magazine' ),
                'slug'     => 'candid-advanced-toolset',
                'required' => false,
            ),
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'refined_magazine_recommended_plugins' );
