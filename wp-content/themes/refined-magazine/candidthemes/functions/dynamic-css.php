<?php
/**
 * Dynamic CSS elements.
 *
 * @package Refined Magazine
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if (!function_exists('refined_magazine_dynamic_css')) :
    /**
     * Dynamic CSS
     *
     * @since 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function refined_magazine_dynamic_css()
    {

        global $refined_magazine_theme_options;

        $refined_magazine_header_color = get_header_textcolor();
        $refined_magazine_custom_css = '';

        if (!empty($refined_magazine_header_color)) {
            $refined_magazine_custom_css .= ".site-branding h1, .site-branding p.site-title,.ct-dark-mode .site-title a, .site-title, .site-title a, .site-title a:hover, .site-title a:visited:hover { color: #{$refined_magazine_header_color}; }";
        }

        if (!empty($refined_magazine_theme_options['refined-magazine-site-title-hover'])) {
            $refined_magazine_site_title_hover_color = esc_attr($refined_magazine_theme_options['refined-magazine-site-title-hover']);
            $refined_magazine_custom_css .= ".ct-dark-mode .site-title a:hover,.site-title a:hover, .site-title a:visited:hover, .ct-dark-mode .site-title a:visited:hover { color: {$refined_magazine_site_title_hover_color}; }";
        }


        if (!empty($refined_magazine_theme_options['refined-magazine-site-tagline'])) {
            $refined_magazine_site_desc_color = esc_attr($refined_magazine_theme_options['refined-magazine-site-tagline']);
            $refined_magazine_custom_css .= ".ct-dark-mode .site-branding  .site-description, .site-branding  .site-description { color: {$refined_magazine_site_desc_color}; }";
        }

        /* Primary Color Section */
        if (!empty($refined_magazine_theme_options['refined-magazine-primary-color'])) {
            $refined_magazine_primary_color = esc_attr($refined_magazine_theme_options['refined-magazine-primary-color']);

            //font-color
            $refined_magazine_custom_css .= ".entry-content a, .entry-title a:hover, .related-title a:hover, .posts-navigation .nav-previous a:hover, .post-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover, .post-navigation .nav-next a:hover, #comments .comment-content a:hover, #comments .comment-author a:hover, .offcanvas-menu nav ul.top-menu li a:hover, .offcanvas-menu nav ul.top-menu li.current-menu-item > a, .error-404-title, #refined-magazine-breadcrumbs a:hover, .entry-content a.read-more-text:hover, a:hover, a:visited:hover, .widget_refined_magazine_category_tabbed_widget.widget ul.ct-nav-tabs li a  { color : {$refined_magazine_primary_color}; }";

            //background-color
            $refined_magazine_custom_css .= ".candid-refined-post-format, .refined-magazine-featured-block .refined-magazine-col-2 .candid-refined-post-format, .cat-links a,.top-bar,.main-navigation ul li a:hover, .main-navigation ul li.current-menu-item > a, .main-navigation ul li a:hover, .main-navigation ul li.current-menu-item > a, .trending-title, .search-form input[type=submit], input[type=\"submit\"], ::selection, #toTop, .breadcrumbs span.breadcrumb, article.sticky .refined-magazine-content-container, .candid-pagination .page-numbers.current, .candid-pagination .page-numbers:hover, .ct-title-head, .widget-title:before, .widget ul.ct-nav-tabs:before, .widget ul.ct-nav-tabs li.ct-title-head:hover, .widget ul.ct-nav-tabs li.ct-title-head.ui-tabs-active { background-color : {$refined_magazine_primary_color}; }";


            //border-color
            $refined_magazine_custom_css .= ".candid-refined-post-format, .refined-magazine-featured-block .refined-magazine-col-2 .candid-refined-post-format, blockquote, .search-form input[type=\"submit\"], input[type=\"submit\"], .candid-pagination .page-numbers { border-color : {$refined_magazine_primary_color}; }";

            $refined_magazine_custom_css .= ".cat-links a:focus{ outline : 1px dashed {$refined_magazine_primary_color}; }";
        }

        $refined_magazine_custom_css .= ".ct-post-overlay .post-content, .ct-post-overlay .post-content a, .widget .ct-post-overlay .post-content a, .widget .ct-post-overlay .post-content a:visited, .ct-post-overlay .post-content a:visited:hover, .slide-details:hover .cat-links a { color: #fff; }";

        if(!empty($refined_magazine_theme_options['refined-magazine-enable-category-color'])){
            $enable_category_color = $refined_magazine_theme_options['refined-magazine-enable-category-color'];
            if ($enable_category_color == 1) {
                $args = array(
                    'orderby' => 'id',
                    'hide_empty' => 0
                );
                $categories = get_categories($args);
                $wp_category_list = array();
                $i = 1;
                foreach ($categories as $category_list) {
                    $wp_category_list[$category_list->cat_ID] = $category_list->cat_name;

                    $cat_color = 'cat-' . esc_attr(get_cat_id($wp_category_list[$category_list->cat_ID]));


                    if (array_key_exists($cat_color, $refined_magazine_theme_options)) {
                        $cat_color_code = $refined_magazine_theme_options[$cat_color];
                        $refined_magazine_custom_css .= "
                    .cat-{$category_list->cat_ID} .ct-title-head,
                    .cat-{$category_list->cat_ID}.widget-title:before,
                     .cat-{$category_list->cat_ID} .widget-title:before,
                      .ct-cat-item-{$category_list->cat_ID}{
                    background: {$cat_color_code}!important;
                    }
                    ";
                        $refined_magazine_custom_css .= "
                    .widget_refined_magazine_category_tabbed_widget.widget ul.ct-nav-tabs li a.ct-tab-{$category_list->cat_ID} {
                    color: {$cat_color_code}!important;
                    }
                    ";
                    }


                    $i++;
                }
            }
        }

        if(!empty($refined_magazine_theme_options['refined-magazine-logo-section-background'])){
            $logo_section_color = esc_attr( $refined_magazine_theme_options['refined-magazine-logo-section-background'] );
            $refined_magazine_custom_css .= ".logo-wrapper-block{background-color : {$logo_section_color}; }";
        }

        if(!empty($refined_magazine_theme_options['refined-magazine-boxed-width-options'])){
            $box_width = absint($refined_magazine_theme_options['refined-magazine-boxed-width-options']);
            $refined_magazine_custom_css .= "@media (min-width: 1600px){.ct-boxed #page{max-width : {$box_width}px; }}";

            if($box_width < 1370){
                $refined_magazine_custom_css .= "@media (min-width: 1450px){.ct-boxed #page{max-width : {$box_width}px; }}";
            }
        }

        wp_add_inline_style('refined-magazine-style', $refined_magazine_custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'refined_magazine_dynamic_css', 99);