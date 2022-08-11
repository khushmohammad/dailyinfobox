<?php
/**
 *  Refined Magazine Breadcrumb Settings Option
 *
 * @since Refined Magazine 1.0.0
 *
 */
/*Breadcrumb Options*/
$wp_customize->add_section( 'refined_magazine_breadcrumb_options', array(
    'priority'       => 73,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Breadcrumb Settings', 'refined-magazine' ),
    'panel'          => 'refined_magazine_panel',
) );

/*Breadcrumb Enable*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-extra-breadcrumb]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-extra-breadcrumb'],
    'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-extra-breadcrumb]', array(
    'label'     => __( 'Enable Breadcrumb', 'refined-magazine' ),
    'description' => __( 'Breadcrumb will appear on all pages except home page', 'refined-magazine' ),
    'section'   => 'refined_magazine_breadcrumb_options',
    'settings'  => 'refined_magazine_options[refined-magazine-extra-breadcrumb]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*callback functions breadcrumb enable*/
if ( !function_exists('refined_magazine_breadcrumb_selection_enable') ) :
  function refined_magazine_breadcrumb_selection_enable(){
      global $refined_magazine_theme_options;
      $refined_magazine_theme_options = refined_magazine_get_options_value();
      $enable_bc = absint($refined_magazine_theme_options['refined-magazine-extra-breadcrumb']);
      if( $enable_bc == 1){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Show Breadcrumb Types Selection*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-breadcrumb-display-from-option]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-breadcrumb-display-from-option'],
    'sanitize_callback' => 'refined_magazine_sanitize_select'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-breadcrumb-display-from-option]', array(
    'choices' => array(
        'theme-default'    => __('Theme Default Breadcrumb','refined-magazine'),
        'plugin-breadcrumb'    => __('Plugins Breadcrumb','refined-magazine')
    ),
    'label'     => __( 'Select the Breadcrumb Show Option', 'refined-magazine' ),
    'description' => __('Theme has its own breadcrumb. If you want to use the plugin breadcrumb, you need to enable the breadcrumb on the respected plugins first. Check plugin settings and enable it.', 'refined-magazine'),
    'section'   => 'refined_magazine_breadcrumb_options',
    'settings'  => 'refined_magazine_options[refined-magazine-breadcrumb-display-from-option]',
    'type'      => 'select',
    'priority'  => 15,
    'active_callback'=> 'refined_magazine_breadcrumb_selection_enable',
) );

/*callback functions breadcrumb*/
if ( !function_exists('refined_magazine_breadcrumb_selection_option') ) :
  function refined_magazine_breadcrumb_selection_option(){
    global $refined_magazine_theme_options;
      $refined_magazine_theme_options = refined_magazine_get_options_value();
      $enable_breadcrumb = absint($refined_magazine_theme_options['refined-magazine-extra-breadcrumb']);
      $breadcrumb_selection = esc_attr($refined_magazine_theme_options['refined-magazine-breadcrumb-display-from-option']);
      if( 'theme-default' == $breadcrumb_selection && $enable_breadcrumb == 1){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*callback functions breadcrumb*/
if ( !function_exists('refined_magazine_breadcrumb_selection_plugin') ) :
  function refined_magazine_breadcrumb_selection_plugin(){
      global $refined_magazine_theme_options;
      $refined_magazine_theme_options = refined_magazine_get_options_value();
      $enable_breadcrumb_plugin = absint($refined_magazine_theme_options['refined-magazine-extra-breadcrumb']);
      $breadcrumb_selection_plugin = esc_attr($refined_magazine_theme_options['refined-magazine-breadcrumb-display-from-option']);
      if( 'plugin-breadcrumb' == $breadcrumb_selection_plugin && $enable_breadcrumb_plugin == 1){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Breadcrumb Text*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-breadcrumb-text]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-breadcrumb-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-breadcrumb-text]', array(
    'label'     => __( 'Breadcrumb Text', 'refined-magazine' ),
    'description' => __( 'Write your own text in place of You are Here', 'refined-magazine' ),
    'section'   => 'refined_magazine_breadcrumb_options',
    'settings'  => 'refined_magazine_options[refined-magazine-breadcrumb-text]',
    'type'      => 'text',
    'priority'  => 15,
    'active_callback' => 'refined_magazine_breadcrumb_selection_option',
) );


/*Show Breadcrumb From Plugins*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-breadcrumb-display-from-plugins]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-breadcrumb-display-from-plugins'],
    'sanitize_callback' => 'refined_magazine_sanitize_select'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-breadcrumb-display-from-plugins]', array(
    'choices' => array(
        'yoast'    => __('Yoast SEO Breadcrumb','refined-magazine'),
        'rank-math'    => __('Rank Math Breadcrumb','refined-magazine'),
        'navxt'    => __('NavXT Breadcrumb','refined-magazine')
    ),
    'label'     => __( 'Select the Breadcrumb From Plugins', 'refined-magazine' ),
    'description' => __('Theme has its own breadcrumb. If you want to use the plugin breadcrumb, you need to enable the breadcrumb on the respected plugins first. Check plugin settings and enable it.', 'refined-magazine'),
    'section'   => 'refined_magazine_breadcrumb_options',
    'settings'  => 'refined_magazine_options[refined-magazine-breadcrumb-display-from-plugins]',
    'type'      => 'select',
    'priority'  => 15,
    'active_callback'=> 'refined_magazine_breadcrumb_selection_plugin',
) );