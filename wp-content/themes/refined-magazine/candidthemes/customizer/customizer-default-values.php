<?php
/**
 * Refined Magazine Theme Customizer default values
 *
 * @package Refined Magazine
 */
if ( !function_exists('refined_magazine_default_theme_options_values') ) :
    function refined_magazine_default_theme_options_values() {
        $default_theme_options = array(

             /*General Colors*/
            'refined-magazine-primary-color' => '#0d19a3',
            'refined-magazine-site-title-hover'=> '',
            'refined-magazine-site-tagline'=> '',
            

            /*Logo Section Colors*/
            'refined-magazine-logo-section-background' => '#4240ed',

            /*logo position*/
            'refined-magazine-custom-logo-position'=> 'center',

            /*Site Layout Options*/
            'refined-magazine-site-layout-options'=>'boxed',
            'refined-magazine-boxed-width-options'=> 1500,

            /*Top Header Section Default Value*/
            'refined-magazine-enable-top-header'=> true,
            'refined-magazine-enable-top-header-social'=> true,
            'refined-magazine-enable-top-header-menu'=> true,
            'refined-magazine-enable-top-header-date' => true,
            'refined-magazine-top-header-date-format'=>'default-date',
            
            /*Treding News*/
            'refined-magazine-enable-trending-news' => true,
            'refined-magazine-enable-trending-news-text'=> esc_html__('Trending News','refined-magazine'),
            'refined-magazine-trending-news-category'=> 0,

            /*Menu Section*/
            'refined-magazine-enable-menu-section-search'=> true,
            'refined-magazine-enable-sticky-primary-menu'=> true,
            'refined-magazine-enable-menu-home-icon' => true,

            /*Header Ads Default Value*/
            'refined-magazine-enable-ads-header'=> false,
            'refined-magazine-header-ads-image'=> '',
            'refined-magazine-header-ads-image-link'=> 'https://www.candidthemes.com/themes/refined-magazine/',

            /*Slider Section Default Value*/
            'refined-magazine-enable-slider' => true,
            'refined-magazine-select-category'=> 0,
            'refined-magazine-select-category-featured-right' => 0,
            'refined-magazine-slider-post-date'=> true,
            'refined-magazine-slider-post-author'=> false,
            'refined-magazine-slider-post-category'=> true,
            'refined-magazine-slider-post-read-time'=> true,
            

            /*Sidebars Default Value*/
            'refined-magazine-sidebar-blog-page'=>'right-sidebar',
            'refined-magazine-sidebar-front-page' => 'right-sidebar',
            'refined-magazine-sidebar-archive-page'=> 'right-sidebar',

            /*Blog Page Default Value*/
            'refined-magazine-content-show-from'=>'excerpt',
            'refined-magazine-excerpt-length'=>25,
            'refined-magazine-pagination-options'=>'numeric',
            'refined-magazine-read-more-text'=> esc_html__('Read More','refined-magazine'),
            'refined-magazine-enable-blog-author'=> false,
            'refined-magazine-enable-blog-category'=> true,
            'refined-magazine-enable-blog-date'=> true,
            'refined-magazine-enable-blog-comment'=> false,
            'refined-magazine-enable-blog-tags'=> false,

            /*Single Page Default Value*/
            'refined-magazine-single-page-featured-image'=> true,
            'refined-magazine-single-page-related-posts'=> true,
            'refined-magazine-single-page-related-posts-title'=> esc_html__('Related Posts','refined-magazine'),
            'refined-magazine-enable-single-category' => true,
            'refined-magazine-enable-single-date' => true,
            'refined-magazine-enable-single-author' => true,
            

            /*Sticky Sidebar Options*/
            'refined-magazine-enable-sticky-sidebar'=> true,

            /*Social Share Options*/
            'refined-magazine-enable-single-sharing'=> true,
            'refined-magazine-enable-blog-sharing'=> false,
            'refined-magazine-enable-static-page-sharing' => false,

            /*Footer Section*/
            'refined-magazine-footer-copyright' =>  esc_html__('All Rights Reserved 2021.','refined-magazine'),
            'refined-magazine-go-to-top'=> true,
            
            
            /*Extra Options*/
            'refined-magazine-extra-breadcrumb'=> true,
            'refined-magazine-breadcrumb-text'=>  esc_html__('You are Here','refined-magazine'),
            'refined-magazine-extra-preloader'=> true,
            'refined-magazine-front-page-content' => false,
            'refined-magazine-extra-hide-read-time' => false,
            'refined-magazine-extra-post-formats-icons'=> true,
            'refined-magazine-enable-category-color' => false,

            'refined-magazine-breadcrumb-display-from-option'=> 'theme-default',
            'refined-magazine-breadcrumb-display-from-plugins'=> 'yoast',

        );
        return apply_filters( 'refined_magazine_default_theme_options_values', $default_theme_options );
    }
endif;

/**
 *  Refined Magazine Theme Options and Settings
 *
 * @since Refined Magazine 1.0.0
 *
 * @param null
 * @return array refined_magazine_get_options_value
 *
 */
if ( !function_exists('refined_magazine_get_options_value') ) :
    function refined_magazine_get_options_value() {
        $refined_magazine_default_theme_options_values = refined_magazine_default_theme_options_values();
        $refined_magazine_get_options_value = get_theme_mod( 'refined_magazine_options');
        if( is_array( $refined_magazine_get_options_value )){
            return array_merge( $refined_magazine_default_theme_options_values, $refined_magazine_get_options_value );
        }
        else{
            return $refined_magazine_default_theme_options_values;
        }
    }
endif;