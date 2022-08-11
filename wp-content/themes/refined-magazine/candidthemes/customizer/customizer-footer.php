<?php
/**
 *  Refined Magazine Footer Option
 *
 * @since Refined Magazine 1.0.0
 *
 */
/*Footer Options*/
$wp_customize->add_section( 'refined_magazine_footer_section', array(
   'priority'       => 85,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Footer Options', 'refined-magazine' ),
   'panel' 		 => 'refined_magazine_panel',
) );
/*Copyright Setting*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-footer-copyright]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-footer-copyright'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-footer-copyright]', array(
    'label'     => __( 'Copyright Text', 'refined-magazine' ),
    'description' => __('Enter your own copyright text.', 'refined-magazine'),
    'section'   => 'refined_magazine_footer_section',
    'settings'  => 'refined_magazine_options[refined-magazine-footer-copyright]',
    'type'      => 'text',
    'priority'  => 15,
) );
/*Go to Top Setting*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-go-to-top]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-go-to-top'],
    'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-go-to-top]', array(
    'label'     => __( 'Enable Go to Top', 'refined-magazine' ),
    'description' => __('Checked to Enable Go to Top', 'refined-magazine'),
    'section'   => 'refined_magazine_footer_section',
    'settings'  => 'refined_magazine_options[refined-magazine-go-to-top]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );