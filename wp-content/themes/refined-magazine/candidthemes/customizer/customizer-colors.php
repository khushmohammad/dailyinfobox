<?php
/**
 *  Refined Magazine Color Option
 *
 * @since Refined Magazine 1.0.0
 *
 */

$wp_customize->add_panel(
    'colors',
    array(
        'title'    => __( 'Color Options', 'refined-magazine' ),
        'priority' => 30, // Before Additional CSS.
    )
);
$wp_customize->add_section(
    'colors',
    array(
        'title' => __( 'General Colors', 'refined-magazine' ),
        'panel' => 'colors',
    )
);

/* Site Title hover color */
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-site-title-hover]',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['refined-magazine-site-title-hover'],
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'refined_magazine_options[refined-magazine-site-title-hover]',
        array(
            'label'       => esc_html__( 'Site Title Hover Color', 'refined-magazine' ),
            'description' => esc_html__( 'It will change the color of site title in hover.', 'refined-magazine' ),
            'section'     => 'colors',
             'settings'  => 'refined_magazine_options[refined-magazine-site-title-hover]',
        )
    )
);

/* Site tagline color */
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-site-tagline]',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['refined-magazine-site-tagline'],
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'refined_magazine_options[refined-magazine-site-tagline]',
        array(
            'label'       => esc_html__( 'Site Tagline Color', 'refined-magazine' ),
            'description' => esc_html__( 'It will change the color of site tagline color.', 'refined-magazine' ),
            'section'     => 'colors',
        )
    )
);

/* Primary Color Section Inside Core Color Option */
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-primary-color]',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['refined-magazine-primary-color'],
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'refined_magazine_options[refined-magazine-primary-color]',
        array(
            'label'       => esc_html__( 'Primary Color', 'refined-magazine' ),
            'description' => esc_html__( 'Applied to main color of site.', 'refined-magazine' ),
            'section'     => 'colors',
        )
    )
);
/* Logo Section Colors */

$wp_customize->add_section(
    'logo_colors',
    array(
        'title' => __( 'Logo Section Colors', 'refined-magazine' ),
        'panel' => 'colors',
    )
);

/* Colors background the logo */
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-logo-section-background]',
    array(
        'default'           => $default['refined-magazine-logo-section-background'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'refined_magazine_options[refined-magazine-logo-section-background]',
        array(
            'label'       => esc_html__( 'Background Color', 'refined-magazine' ),
            'description' => esc_html__( 'Will change the color of background logo.', 'refined-magazine' ),
            'section'     => 'logo_colors',
        )
    )
);