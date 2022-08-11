<?php
/**
 *  Refined Magazine Sidebar Option
 *
 * @since Refined Magazine 1.0.0
 *
 */
/*Blog Page Options*/
$wp_customize->add_section( 'refined_magazine_sidebar_section', array(
   'priority'       => 40,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Sidebar Options', 'refined-magazine' ),
   'panel' 		 => 'refined_magazine_panel',
) );
/*Front Page Sidebar Layout*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-sidebar-blog-page]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-sidebar-blog-page'],
    'sanitize_callback' => 'refined_magazine_sanitize_select'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-sidebar-blog-page]', array(
   'choices' => array(
    'right-sidebar'   => __('Right Sidebar','refined-magazine'),
    'left-sidebar'    => __('Left Sidebar','refined-magazine'),
    'no-sidebar'      => __('No Sidebar','refined-magazine'),
    'middle-column'   => __('Middle Column','refined-magazine')
),
   'label'     => __( 'Inner Pages Sidebar', 'refined-magazine' ),
   'description' => __('This sidebar will work for all Pages', 'refined-magazine'),
   'section'   => 'refined_magazine_sidebar_section',
   'settings'  => 'refined_magazine_options[refined-magazine-sidebar-blog-page]',
   'type'      => 'select',
   'priority'  => 10,
) );

/*Front Page Sidebar Layout*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-sidebar-front-page]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-sidebar-front-page'],
    'sanitize_callback' => 'refined_magazine_sanitize_select'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-sidebar-front-page]', array(
   'choices' => array(
    'right-sidebar'   => __('Right Sidebar','refined-magazine'),
    'left-sidebar'    => __('Left Sidebar','refined-magazine'),
    'no-sidebar'      => __('No Sidebar','refined-magazine'),
    'middle-column'   => __('Middle Column','refined-magazine')
),
   'label'     => __( 'Front Page Sidebar', 'refined-magazine' ),
   'description' => __('This sidebar will work for Front Page', 'refined-magazine'),
   'section'   => 'refined_magazine_sidebar_section',
   'settings'  => 'refined_magazine_options[refined-magazine-sidebar-front-page]',
   'type'      => 'select',
   'priority'  => 10,
) );

/*Archive Page Sidebar Layout*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-sidebar-archive-page]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-sidebar-archive-page'],
    'sanitize_callback' => 'refined_magazine_sanitize_select'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-sidebar-archive-page]', array(
   'choices' => array(
    'right-sidebar'   => __('Right Sidebar','refined-magazine'),
    'left-sidebar'    => __('Left Sidebar','refined-magazine'),
    'no-sidebar'      => __('No Sidebar','refined-magazine'),
    'middle-column'   => __('Middle Column','refined-magazine')
),
   'label'     => __( 'Archive Page Sidebar', 'refined-magazine' ),
   'description' => __('This sidebar will work for all Archive Pages', 'refined-magazine'),
   'section'   => 'refined_magazine_sidebar_section',
   'settings'  => 'refined_magazine_options[refined-magazine-sidebar-archive-page]',
   'type'      => 'select',
   'priority'  => 10,
) );