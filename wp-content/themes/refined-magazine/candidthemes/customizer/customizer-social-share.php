<?php
/**
 *  Refined Magazine Social Share Option
 *
 * @since Refined Magazine 1.0.0
 *
 */
/*Top Header Options*/
$wp_customize->add_section( 'refined_magazine_social_share_section', array(
   'priority'       => 87,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Social Share Options', 'refined-magazine' ),
   'panel'     => 'refined_magazine_panel',
) );

/*Blog Page Social Share*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-enable-blog-sharing]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-enable-blog-sharing'],
    'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-enable-blog-sharing]', array(
    'label'     => __( 'Enable Social Sharing', 'refined-magazine' ),
    'description' => __('Checked to Enable Social Sharing In Home Page,  Search Page and Archive page.', 'refined-magazine'),
    'section'   => 'refined_magazine_social_share_section',
    'settings'  => 'refined_magazine_options[refined-magazine-enable-blog-sharing]',
    'type'      => 'checkbox',
    'priority'  => 10,
) );

/* Single Page social sharing*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-enable-single-sharing]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-enable-single-sharing'],
    'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-enable-single-sharing]', array(
    'label'     => __( 'Social Sharing on Blog Page', 'refined-magazine' ),
    'description' => __('Checked to Enable Social Sharing In Single post and page.', 'refined-magazine'),
    'section'   => 'refined_magazine_social_share_section',
    'settings'  => 'refined_magazine_options[refined-magazine-enable-single-sharing]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );

/* Single Page social sharing*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-enable-single-sharing]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-enable-single-sharing'],
    'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-enable-single-sharing]', array(
    'label'     => __( 'Social Sharing on Single Post', 'refined-magazine' ),
    'description' => __('Checked to Enable Social Sharing In Single post and page.', 'refined-magazine'),
    'section'   => 'refined_magazine_social_share_section',
    'settings'  => 'refined_magazine_options[refined-magazine-enable-single-sharing]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );

/* Static Front Page social sharing*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-enable-static-page-sharing]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-enable-static-page-sharing'],
    'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-enable-static-page-sharing]', array(
    'label'     => __( 'Social Sharing on Static Front Page', 'refined-magazine' ),
    'description' => __('Checked to Enable Social Sharing In static front page.', 'refined-magazine'),
    'section'   => 'refined_magazine_social_share_section',
    'settings'  => 'refined_magazine_options[refined-magazine-enable-static-page-sharing]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );