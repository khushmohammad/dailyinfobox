<?php
/**
 *  Refined Magazine Single Page Option
 *
 * @since Refined Magazine 1.0.0
 *
 */
/*Single Page Options*/
$wp_customize->add_section( 'refined_magazine_single_page_section', array(
   'priority'       => 68,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Single Post Options', 'refined-magazine' ),
   'panel' 		 => 'refined_magazine_panel',
) );

/*Featured Image Option*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-single-page-featured-image]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-single-page-featured-image'],
    'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-single-page-featured-image]', array(
    'label'     => __( 'Enable Featured Image', 'refined-magazine' ),
    'description' => __('You can hide or show featured image on single page.', 'refined-magazine'),
    'section'   => 'refined_magazine_single_page_section',
    'settings'  => 'refined_magazine_options[refined-magazine-single-page-featured-image]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );
/*Enable Category*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-enable-single-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-enable-single-category'],
    'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-enable-single-category]', array(
    'label'     => __( 'Enable Category', 'refined-magazine' ),
    'description' => __('Checked to Enable Category In Single post and page.', 'refined-magazine'),
    'section'   => 'refined_magazine_single_page_section',
    'settings'  => 'refined_magazine_options[refined-magazine-enable-single-category]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );
/*Enable Date*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-enable-single-date]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-enable-single-date'],
    'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-enable-single-date]', array(
    'label'     => __( 'Enable Date', 'refined-magazine' ),
    'description' => __('Checked to Enable Date In Single post and page.', 'refined-magazine'),
    'section'   => 'refined_magazine_single_page_section',
    'settings'  => 'refined_magazine_options[refined-magazine-enable-single-date]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );
/*Enable Author*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-enable-single-author]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-enable-single-author'],
    'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-enable-single-author]', array(
    'label'     => __( 'Enable Author', 'refined-magazine' ),
    'description' => __('Checked to Enable Author In Single post and page.', 'refined-magazine'),
    'section'   => 'refined_magazine_single_page_section',
    'settings'  => 'refined_magazine_options[refined-magazine-enable-single-author]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );

/*Related Post Options*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-single-page-related-posts]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-single-page-related-posts'],
    'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-single-page-related-posts]', array(
    'label'     => __( 'Enable Related Posts', 'refined-magazine' ),
    'description' => __('3 Post from similar category will display at the end of the page. More Options is in Premium Version', 'refined-magazine'),
    'section'   => 'refined_magazine_single_page_section',
    'settings'  => 'refined_magazine_options[refined-magazine-single-page-related-posts]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );
/*callback functions related posts*/
if ( !function_exists('refined_magazine_related_post_callback') ) :
    function refined_magazine_related_post_callback(){
        global $refined_magazine_theme_options;
        $refined_magazine_theme_options = refined_magazine_get_options_value();
        $related_posts = absint($refined_magazine_theme_options['refined-magazine-single-page-related-posts']);
        if( 1 == $related_posts ){
            return true;
        }
        else{
            return false;
        }
    }
endif;
/*Related Post Title*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-single-page-related-posts-title]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-single-page-related-posts-title'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-single-page-related-posts-title]', array(
    'label'     => __( 'Related Posts Title', 'refined-magazine' ),
    'description' => __('Give the appropriate title for related posts', 'refined-magazine'),
    'section'   => 'refined_magazine_single_page_section',
    'settings'  => 'refined_magazine_options[refined-magazine-single-page-related-posts-title]',
    'type'      => 'text',
    'priority'  => 20,
    'active_callback'=>'refined_magazine_related_post_callback'
) );

