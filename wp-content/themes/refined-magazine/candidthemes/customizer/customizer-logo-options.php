<?php
/**
 *  Refined Magazine Logo Option
 *
 * @since Refined Magazine 1.0.0
 *
 */
/*Logo Options*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-custom-logo-position]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-custom-logo-position'],
    'sanitize_callback' => 'refined_magazine_sanitize_select'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-custom-logo-position]', array(
   'choices' => array(
    'default'    => __('Left Align','refined-magazine'),
    'center'    => __('Center Logo','refined-magazine')
),
   'label'     => __( 'Logo Position Option', 'refined-magazine' ),
   'description' => __('Your logo will be in the center position.', 'refined-magazine'),
   'section'   => 'title_tagline',
   'settings'  => 'refined_magazine_options[refined-magazine-custom-logo-position]',
   'type'      => 'select',
   'priority'  => 30,
) );