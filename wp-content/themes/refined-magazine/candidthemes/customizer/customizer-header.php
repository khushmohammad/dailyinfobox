<?php
/**
 *  Refined Magazine Header Option
 *
 * @since Refined Magazine 1.0.0
 *
 */
/*Top Header Options*/
$wp_customize->add_section( 'refined_magazine_header_ads_section', array(
   'priority'       => 16,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Header Ads Options', 'refined-magazine' ),
   'panel' 		 => 'refined_magazine_panel',
) );
/*callback functions header section*/
if ( !function_exists('refined_magazine_ads_header_active_callback') ) :
  function refined_magazine_ads_header_active_callback(){
      global $refined_magazine_theme_options;
      $refined_magazine_theme_options = refined_magazine_get_options_value();
      $enable_ads_header = absint($refined_magazine_theme_options['refined-magazine-enable-ads-header']);
      if( 1 == $enable_ads_header ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Enable Header Ads Section*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-enable-ads-header]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['refined-magazine-enable-ads-header'],
   'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-enable-ads-header]', array(
   'label'     => __( 'Show Header Advertisement', 'refined-magazine' ),
   'description' => __('Checked to Enable the header ads. Select either image or google adsense.', 'refined-magazine'),
   'section'   => 'refined_magazine_header_ads_section',
   'settings'  => 'refined_magazine_options[refined-magazine-enable-ads-header]',
   'type'      => 'checkbox',
   'priority'  => 10,
) );

/*Header Ads Image*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-header-ads-image]', array(
    'capability'    => 'edit_theme_options',
    'default'     => $default['refined-magazine-header-ads-image'],
    'sanitize_callback' => 'refined_magazine_sanitize_image'
) );
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'refined_magazine_options[refined-magazine-header-ads-image]',
        array(
            'label'   => __( 'Header Ad Image', 'refined-magazine' ),
            'section'   => 'refined_magazine_header_ads_section',
            'settings'  => 'refined_magazine_options[refined-magazine-header-ads-image]',
            'type'      => 'image',
            'priority'  => 10,
            'active_callback' => 'refined_magazine_ads_header_active_callback',
            'description' => __( 'Recommended image size of 728*90', 'refined-magazine' )
        )
    )
);

/*Ads Image Link*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-header-ads-image-link]', array(
    'capability'    => 'edit_theme_options',
    'default'     => $default['refined-magazine-header-ads-image-link'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-header-ads-image-link]', array(
    'label'   => __( 'Header Ads Image Link', 'refined-magazine' ),
    'section'   => 'refined_magazine_header_ads_section',
    'settings'  => 'refined_magazine_options[refined-magazine-header-ads-image-link]',
    'type'      => 'url',
    'active_callback' => 'refined_magazine_ads_header_active_callback',
    'priority'  => 10
) );

