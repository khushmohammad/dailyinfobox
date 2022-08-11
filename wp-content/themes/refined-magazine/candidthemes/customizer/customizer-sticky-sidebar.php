<?php
/**
 *  Refined Magazine Sticky Sidebar Option
 *
 * @since Refined Magazine 1.0.0
 *
 */

/*Sticky Sidebar*/
$wp_customize->add_section( 'refined_magazine_sticky_sidebar', array(
    'priority'       => 76,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Sticky Sidebar', 'refined-magazine' ),
    'panel' 		 => 'refined_magazine_panel',
) );
/*Sticky Sidebar Setting*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-enable-sticky-sidebar]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-enable-sticky-sidebar'],
    'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-enable-sticky-sidebar]', array(
    'label'     => __( 'Sticky Sidebar Option', 'refined-magazine' ),
    'description' => __('Enable and Disable sticky sidebar from this section.', 'refined-magazine'),
    'section'   => 'refined_magazine_sticky_sidebar',
    'settings'  => 'refined_magazine_options[refined-magazine-enable-sticky-sidebar]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );