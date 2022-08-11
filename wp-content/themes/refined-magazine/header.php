<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Refined Magazine
 */
global $refined_magazine_theme_options;
$refined_magazine_theme_options = refined_magazine_get_options_value();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> <?php refined_magazine_do_microdata('body'); ?>>
<?php
//wp_body_open hook from WordPress 5.2
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}else { 
    do_action( 'wp_body_open' ); 
}
?>
<div id="page" class="site">
    <?php
    /**
     * refined_magazine_before_header hook.
     *
     * @since 1.0.0
     *
     * @hooked refined_magazine_do_skip_to_content_link - 10
     *
     */
    do_action('refined_magazine_before_header');


    /**
     * refined_magazine_header_start_container hook.
     *
     * @since 1.0.0
     *
     */
    do_action('refined_magazine_header_start');

    /**
     * refined_magazine_header hook.
     *
     * @since 1.0.0
     *
     * @hooked refined_magazine_construct_header - 10
     */
    do_action('refined_magazine_header');

    /**
     * refined_magazine_header_end_container hook.
     *
     * @since 1.0.0
     *
     */
    do_action('refined_magazine_header_end');

    /**
     * refined_magazine_after_header hook.
     *
     * @since 1.0.0
     *
     */
    do_action('refined_magazine_after_header');


    if (($refined_magazine_theme_options['refined-magazine-enable-trending-news'] == 1) && (is_front_page())):
        do_action('refined_magazine_trending_news');
    endif;

    //Check if slider is enabled from customizer
    if ($refined_magazine_theme_options['refined-magazine-enable-slider'] == 1):
            /**
             * refined_magazine_carousel hook.
             *
             * @since 1.0.0
             *
             * @hooked refined_magazine_constuct_carousel - 10
             */
            do_action('refined_magazine_carousel');

    endif;

    //Full Width Sidebar Area below the featured Section
    if (is_active_sidebar('refined-magazine-home-full-width-area') && is_front_page()) {
        ?>
        <div class="ct-below-featured-area">
            <div class="container-inner">
                <?php dynamic_sidebar('refined-magazine-home-full-width-area'); ?>
            </div>
        </div>
        <?php
    }

    ?>

    <div id="content" class="site-content">
        <?php
        $container_class = !is_page_template('elementor_header_footer') ? 'container-inner ct-container-main' : 'container-outer ct-container-main';
        ?>
        <div class="<?php echo $container_class; ?> clearfix">