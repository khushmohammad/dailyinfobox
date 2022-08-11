<?php
/**
 *  Refined Magazine Blog Page Option
 *
 * @since Refined Magazine 1.0.0
 *
 */
/*Blog Page Options*/
$wp_customize->add_section( 'refined_magazine_blog_page_section', array(
   'priority'       => 45,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Blog Section Options', 'refined-magazine' ),
   'panel' 		 => 'refined_magazine_panel',
) );

/*Blog Page Show content from*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-content-show-from]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-content-show-from'],
    'sanitize_callback' => 'refined_magazine_sanitize_select'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-content-show-from]', array(
   'choices' => array(
    'excerpt'    => __('Excerpt','refined-magazine'),
    'content'    => __('Content','refined-magazine')
),
   'label'     => __( 'Select Content Display Option', 'refined-magazine' ),
   'description' => __('You can enable excerpt from Screen Options inside post section of dashboard', 'refined-magazine'),
   'section'   => 'refined_magazine_blog_page_section',
   'settings'  => 'refined_magazine_options[refined-magazine-content-show-from]',
   'type'      => 'select',
   'priority'  => 10,
) );
/*Blog Page excerpt length*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-excerpt-length]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-excerpt-length'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-excerpt-length]', array(
    'label'     => __( 'Size of Excerpt Content', 'refined-magazine' ),
    'description' => __('Enter the number per Words to show the content in blog page.', 'refined-magazine'),
    'section'   => 'refined_magazine_blog_page_section',
    'settings'  => 'refined_magazine_options[refined-magazine-excerpt-length]',
    'type'      => 'number',
    'priority'  => 10,
) );
/*Blog Page Pagination Options*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-pagination-options]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-pagination-options'],
    'sanitize_callback' => 'refined_magazine_sanitize_select'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-pagination-options]', array(
   'choices' => refined_magazine_pagination_types(),
   'label'     => __( 'Pagination Types', 'refined-magazine' ),
   'description' => __('Select the Required Pagination Type', 'refined-magazine'),
   'section'   => 'refined_magazine_blog_page_section',
   'settings'  => 'refined_magazine_options[refined-magazine-pagination-options]',
   'type'      => 'select',
   'priority'  => 10,
) );
/*Blog Page read more text*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-read-more-text]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-read-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-read-more-text]', array(
    'label'     => __( 'Enter Read More Text', 'refined-magazine' ),
    'description' => __('Read more text for blog and archive page.', 'refined-magazine'),
    'section'   => 'refined_magazine_blog_page_section',
    'settings'  => 'refined_magazine_options[refined-magazine-read-more-text]',
    'type'      => 'text',
    'priority'  => 10,
) );

/*Blog Page author*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-enable-blog-author]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-enable-blog-author'],
    'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-enable-blog-author]', array(
    'label'     => __( 'Show Author', 'refined-magazine' ),
    'description' => __('Checked to show the author.', 'refined-magazine'),
    'section'   => 'refined_magazine_blog_page_section',
    'settings'  => 'refined_magazine_options[refined-magazine-enable-blog-author]',
    'type'      => 'checkbox',
    'priority'  => 10,
) );
/*Blog Page category*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-enable-blog-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-enable-blog-category'],
    'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-enable-blog-category]', array(
    'label'     => __( 'Show Category', 'refined-magazine' ),
    'description' => __('Checked to show the category.', 'refined-magazine'),
    'section'   => 'refined_magazine_blog_page_section',
    'settings'  => 'refined_magazine_options[refined-magazine-enable-blog-category]',
    'type'      => 'checkbox',
    'priority'  => 10,
) );
/*Blog Page date*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-enable-blog-date]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-enable-blog-date'],
    'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-enable-blog-date]', array(
    'label'     => __( 'Show Date', 'refined-magazine' ),
    'description' => __('Checked to show the Date.', 'refined-magazine'),
    'section'   => 'refined_magazine_blog_page_section',
    'settings'  => 'refined_magazine_options[refined-magazine-enable-blog-date]',
    'type'      => 'checkbox',
    'priority'  => 10,
) );
/*Blog Page comment*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-enable-blog-comment]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-enable-blog-comment'],
    'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-enable-blog-comment]', array(
    'label'     => __( 'Show Comment', 'refined-magazine' ),
    'description' => __('Checked to show the Comment.', 'refined-magazine'),
    'section'   => 'refined_magazine_blog_page_section',
    'settings'  => 'refined_magazine_options[refined-magazine-enable-blog-comment]',
    'type'      => 'checkbox',
    'priority'  => 10,
) );

/*Blog Page comment*/
$wp_customize->add_setting( 'refined_magazine_options[refined-magazine-enable-blog-tags]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['refined-magazine-enable-blog-tags'],
    'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
) );
$wp_customize->add_control( 'refined_magazine_options[refined-magazine-enable-blog-tags]', array(
    'label'     => __( 'Show Tags', 'refined-magazine' ),
    'description' => __('Checked to show the Tags.', 'refined-magazine'),
    'section'   => 'refined_magazine_blog_page_section',
    'settings'  => 'refined_magazine_options[refined-magazine-enable-blog-tags]',
    'type'      => 'checkbox',
    'priority'  => 10,
) );