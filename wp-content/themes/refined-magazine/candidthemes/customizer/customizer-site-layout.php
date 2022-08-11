<?php
/**
 *  Refined Magazine Site Layout Option
 *
 * @since Refined Magazine 1.0.0
 *
 */
/*Site Layout Section*/
$wp_customize->add_section( 'refined_magazine_site_layout_section', array(
   'priority'       => 35,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Site Layout Options', 'refined-magazine' ),
   'panel'     => 'refined_magazine_panel',
) );
/*Site Layout settings*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-site-layout-options]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-site-layout-options'],
    'sanitize_callback' => 'refined_magazine_sanitize_select'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-site-layout-options]', array(
   'choices' => array(
    'boxed'    => __('Boxed Layout','refined-magazine'),
    'full-width'    => __('Full Width','refined-magazine')
),
   'label'     => __( 'Site Layout Option', 'refined-magazine' ),
   'description' => __('You can make the overall site full width or boxed in nature.', 'refined-magazine'),
   'section'   => 'refined_magazine_site_layout_section',
   'settings'  => 'refined_magazine_options[refined-magazine-site-layout-options]',
   'type'      => 'select',
   'priority'  => 30,
) );

/*callback functions header section*/
if ( !function_exists('refined_magazine_boxed_layout_width') ) :
  function refined_magazine_boxed_layout_width(){
      global $refined_magazine_theme_options;
      $refined_magazine_theme_options = refined_magazine_get_options_value();
      $boxed_width = esc_attr($refined_magazine_theme_options['refined-magazine-site-layout-options']);
      if( 'boxed' == $boxed_width ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Site Layout width*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-boxed-width-options]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-boxed-width-options'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-boxed-width-options]', array(
   'label'     => __( 'Set Boxed Width Range', 'refined-magazine' ),
   'description' => __('Make the required width of your boxed layout. Select a custom width for the boxed layout. Minimim is 1200px and maximum is 1500px.', 'refined-magazine'),
   'section'   => 'refined_magazine_site_layout_section',
   'settings'  => 'refined_magazine_options[refined-magazine-boxed-width-options]',
   'type'      => 'range',
   'priority'  => 30,
   'input_attrs' => array(
          'min' => 1200,
          'max' => 1500,
        ),
   'active_callback' => 'refined_magazine_boxed_layout_width',
) );