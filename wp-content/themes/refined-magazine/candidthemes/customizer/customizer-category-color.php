<?php
/**
 *  Refined Magazine Category Color Option
 *
 * @since Refined Magazine 1.0.0
 *
 */
/*Category Color Options*/
$wp_customize->add_section('refined_magazine_category_color_setting', array(
    'priority'      => 72,
    'title'         => __('Category Color', 'refined-magazine'),
    'description'   => __('You can select the different color for each category.', 'refined-magazine'),
    'panel'          => 'refined_magazine_panel'
));

/*Customizer color*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-enable-category-color]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['refined-magazine-enable-category-color'],
   'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-enable-category-color]', array(
   'label'     => __( 'Enable Category Color', 'refined-magazine' ),
   'description' => __('Checked to enable the category color and select the required color for each category.', 'refined-magazine'),
   'section'   => 'refined_magazine_category_color_setting',
   'settings'  => 'refined_magazine_options[refined-magazine-enable-category-color]',
   'type'      => 'checkbox',
   'priority'  => 1,
) );

/*callback functions header section*/
if ( !function_exists('refined_magazine_colors_active_callback') ) :
  function refined_magazine_colors_active_callback(){
      global $refined_magazine_theme_options;
      $refined_magazine_theme_options = refined_magazine_get_options_value();
      $enable_color = absint($refined_magazine_theme_options['refined-magazine-enable-category-color']);
      if( 1 == $enable_color ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

$i = 1;
$args = array(
    'orderby' => 'id',
    'hide_empty' => 0
);
$categories = get_categories( $args );
$wp_category_list = array();
foreach ($categories as $category_list ) {
    $wp_category_list[$category_list->cat_ID] = $category_list->cat_name;

    $wp_customize->add_setting('refined_magazine_options[cat-'.get_cat_id($wp_category_list[$category_list->cat_ID]).']', array(
        'default'           => $default['refined-magazine-primary-color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(
    	new WP_Customize_Color_Control(
    		$wp_customize,
		    'refined_magazine_options[cat-'.get_cat_id($wp_category_list[$category_list->cat_ID]).']',
		    array(
		    	'label'     => sprintf(__('"%s" Color', 'refined-magazine'), $wp_category_list[$category_list->cat_ID] ),
			    'section'   => 'refined_magazine_category_color_setting',
			    'settings'  => 'refined_magazine_options[cat-'.get_cat_id($wp_category_list[$category_list->cat_ID]).']',
			    'priority'  => $i,
                'active_callback'   => 'refined_magazine_colors_active_callback'
		    )
	    )
    );
    $i++;
}