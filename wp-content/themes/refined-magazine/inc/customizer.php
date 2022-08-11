<?php
/**
 * Refined Magazine Theme Customizer
 *
 * @package Refined Magazine
 */
/**
 * Load Customizer Defult Settings
 *
 * Default value for the customizer set here.
 */
require get_template_directory() . '/candidthemes/customizer/customizer-default-values.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function refined_magazine_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'refined_magazine_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'refined_magazine_customize_partial_blogdescription',
		) );
	}
	/**
	 * Load Customizer Settings
	 *
	 * All the settings for appearance > customize
	 */
	require get_template_directory() . '/candidthemes/customizer/customizer-main-panel.php';


	/*Getting Home Page Widget Area on Main Panel*/
	$refined_magazine_home_section = $wp_customize->get_section( 'sidebar-widgets-refined-magazine-home-widget-area' );
	if ( ! empty( $refined_magazine_home_section ) ) {
		$refined_magazine_home_section->panel = '';
		$refined_magazine_home_section->title = esc_html__( 'Home Page Widget Area ', 'refined-magazine' );
		$refined_magazine_home_section->priority = 30;
	}
}
add_action( 'customize_register', 'refined_magazine_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function refined_magazine_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function refined_magazine_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function refined_magazine_customize_preview_js() {
	wp_enqueue_script( 'refined-magazine-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'refined_magazine_customize_preview_js' );

/**
* Customizer Styles
*/
function refined_magazine_customizer_css() {
    wp_enqueue_style('refined-magazine-customizer-css', get_template_directory_uri() . '/candidthemes/assets/css/customizer-style.css', array(), '1.0.0');
}
add_action( 'customize_controls_enqueue_scripts', 'refined_magazine_customizer_css' );
