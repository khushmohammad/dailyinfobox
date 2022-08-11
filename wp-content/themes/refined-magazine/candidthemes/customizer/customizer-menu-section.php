<?php
/**
 *  Refined Magazine Menu Option
 *
 * @since Refined Magazine 1.0.0
 *
 */
/*Menu Options*/
$wp_customize->add_section( 'refined_magazine_primary_menu_section', array(
   'priority'       => 25,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Menu Section Options', 'refined-magazine' ),
   'panel'     => 'refined_magazine_panel',
) );

/*Enable Search Icons In Header*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-enable-sticky-primary-menu]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['refined-magazine-enable-sticky-primary-menu'],
   'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-enable-sticky-primary-menu]', array(
   'label'     => __( 'Enable Primary Menu Sticky', 'refined-magazine' ),
   'description' => __('The main primary menu will be sticky.', 'refined-magazine'),
   'section'   => 'refined_magazine_primary_menu_section',
   'settings'  => 'refined_magazine_options[refined-magazine-enable-sticky-primary-menu]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );

/*Enable Search Icons In Header*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-enable-menu-section-search]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['refined-magazine-enable-menu-section-search'],
   'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-enable-menu-section-search]', array(
   'label'     => __( 'Enable Search Icons', 'refined-magazine' ),
   'description' => __('You can show the search field in header.', 'refined-magazine'),
   'section'   => 'refined_magazine_primary_menu_section',
   'settings'  => 'refined_magazine_options[refined-magazine-enable-menu-section-search]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );

/*Enable Home Icons In Menu*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-enable-menu-home-icon]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['refined-magazine-enable-menu-home-icon'],
   'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-enable-menu-home-icon]', array(
   'label'     => __( 'Enable Home Icons', 'refined-magazine' ),
   'description' => __('Home Icon will displayed in menu.', 'refined-magazine'),
   'section'   => 'refined_magazine_primary_menu_section',
   'settings'  => 'refined_magazine_options[refined-magazine-enable-menu-home-icon]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );