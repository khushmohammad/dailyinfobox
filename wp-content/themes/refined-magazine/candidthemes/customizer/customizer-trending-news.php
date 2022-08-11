<?php
/**
 *  Refined Magazine Top Header Option
 *
 * @since Refined Magazine 1.0.0
 *
 */
/*Top Header Options*/
$wp_customize->add_section( 'refined_magazine_trending_news_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Trending News Options', 'refined-magazine' ),
   'panel'     => 'refined_magazine_panel',
) );

/*Trending News*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-enable-trending-news]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-enable-trending-news'],
    'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-enable-trending-news]', array(
    'label'     => __( 'Trending News in Header', 'refined-magazine' ),
    'description' => __('Trending News will appear on the top header.', 'refined-magazine'),
    'section'   => 'refined_magazine_trending_news_section',
    'settings'  => 'refined_magazine_options[refined-magazine-enable-trending-news]',
    'type'      => 'checkbox',
    'priority'  => 5,
) );


/*callback functions header section*/
if ( !function_exists('refined_magazine_header_trending_active_callback') ) :
  function refined_magazine_header_trending_active_callback(){
      global $refined_magazine_theme_options;
      $refined_magazine_theme_options = refined_magazine_get_options_value();
      $enable_trending = absint($refined_magazine_theme_options['refined-magazine-enable-trending-news']);
      if( 1 == $enable_trending   ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Trending News Category Selection*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-trending-news-category]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['refined-magazine-trending-news-category'],
  'sanitize_callback' => 'absint'
) );
$wp_customize->add_control(
  new Refined_Magazine_Customize_Category_Dropdown_Control(
    $wp_customize,
    'refined_magazine_options[refined-magazine-trending-news-category]',
    array(
      'label'     => __( 'Select Category For Trending News', 'refined-magazine' ),
      'description' => __('Select the category from dropdown. It will appear on the header.', 'refined-magazine'),
      'section'   => 'refined_magazine_trending_news_section',
      'settings'  => 'refined_magazine_options[refined-magazine-trending-news-category]',
      'type'      => 'category_dropdown',
      'priority'  => 5,
      'active_callback'=>'refined_magazine_header_trending_active_callback'
    )
  )
);

/*Trending News*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-enable-trending-news-text]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-enable-trending-news-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-enable-trending-news-text]', array(
    'label'     => __( 'Trending News Text', 'refined-magazine' ),
    'description' => __('Write your own text in place of Trending news.', 'refined-magazine'),
    'section'   => 'refined_magazine_trending_news_section',
    'settings'  => 'refined_magazine_options[refined-magazine-enable-trending-news-text]',
    'type'      => 'text',
    'priority'  => 5,
    'active_callback'=>'refined_magazine_header_trending_active_callback'
) );