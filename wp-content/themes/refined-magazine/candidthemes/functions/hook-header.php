<?php
/**
 * Header Hook Element.
 *
 * @package Refined Magazine
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if (!function_exists('refined_magazine_do_skip_to_content_link')) {
    /**
     * Add skip to content link before the header.
     *
     * @since 1.0.0
     */
    function refined_magazine_do_skip_to_content_link()
    {
        ?>
        <a class="skip-link screen-reader-text"
           href="#content"><?php esc_html_e('Skip to content', 'refined-magazine'); ?></a>
        <?php
    }
}
add_action('refined_magazine_before_header', 'refined_magazine_do_skip_to_content_link', 10);

if (!function_exists('refined_magazine_preloader')) {
    /**
     * Add preloader to website
     *
     * @since 1.0.0
     */
    function refined_magazine_preloader()
    {
        global $refined_magazine_theme_options;


        //Check if preloader is enabled from customizer
        if ($refined_magazine_theme_options['refined-magazine-extra-preloader'] == 1) :
            ?>
            <!-- Preloader -->
            <div id="loader-wrapper">
                <div id="loader"></div>

                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>

            </div>
        <?php
        endif;

    }
}
add_action('refined_magazine_before_header', 'refined_magazine_preloader', 20);

if (!function_exists('refined_magazine_header_start_container')) {
    /**
     * Add header html open tag
     *
     * @since 1.0.0
     */
    function refined_magazine_header_start_container()
    {
        ?>
        <header id="masthead" class="site-header" <?php refined_magazine_do_microdata('header'); ?>>
        <?php

    }
}
add_action('refined_magazine_header_start', 'refined_magazine_header_start_container', 10);


if (!function_exists('refined_magazine_construct_header')) {
    /**
     * Add header block.
     *
     * @since 1.0.0
     */
    function refined_magazine_construct_header()
    {
        /**
         * refined_magazine_after_header_open hook.
         *
         * @since 1.0.0
         *
         */
        do_action('refined_magazine_after_header_open');
        ?>
        <div class="overlay"></div>
        <?php
        global $refined_magazine_theme_options;

        //Check if top header is enabled from customizer
        if ($refined_magazine_theme_options['refined-magazine-enable-top-header'] == 1):

            /**
             * refined_magazine_top_bar hook.
             *
             * @since 1.0.0
             *
             * @hooked refined_magazine_before_top_bar - 5
             * @hooked refined_magazine_trending_news - 10
             * @hooked refined_magazine_top_header_right_start - 15
             * @hooked refined_magazine_top_social_menu - 20
             * @hooked refined_magazine_top_menu - 25
             * @hooked refined_magazine_top_search - 30
             * @hooked refined_magazine_top_header_right_end - 35
             * @hooked refined_magazine_after_top_bar - 40
             */
            do_action('refined_magazine_top_bar');
        endif; // $refined_magazine_theme_options['refined-magazine-enable-top-header']


        /**
         * refined_magazine_main_header hook.
         *
         * @since 1.0.0
         *
         * @hooked refined_magazine_construct_main_header - 10
         *
         */
        do_action('refined_magazine_main_header');


        /**
         * refined_magazine_main_navigation hook.
         *
         * @since 1.0.0
         *
         * @hooked refined_magazine_construct_main_navigation - 10
         *
         */
        do_action('refined_magazine_main_navigation');


        /**
         * refined_magazine_before_header_close hook.
         *
         * @since 1.0.0
         *
         */
        do_action('refined_magazine_before_header_close');

    }
}
add_action('refined_magazine_header', 'refined_magazine_construct_header', 10);


if (!function_exists('refined_magazine_header_end_container')) {
    /**
     * Add header html close tag
     *
     * @since 1.0.0
     */
    function refined_magazine_header_end_container()
    {
        ?>
        </header><!-- #masthead -->
        <?php

    }
}
add_action('refined_magazine_header_end', 'refined_magazine_header_end_container', 10);

if (!function_exists('refined_magazine_header_ads')) {
    /**
     * Add header ads
     *
     * @since 1.0.0
     */
    function refined_magazine_header_ads()
    {
        global $refined_magazine_theme_options;
        $logo_position = $refined_magazine_theme_options['refined-magazine-custom-logo-position'];
        if ($logo_position == 'center') {
            $logo_class = 'full-wrapper text-center';
            $logo_right_class = 'full-wrapper';
        } else {
            $logo_class = 'float-left';
            $logo_right_class = 'float-right';
        }
        $refined_magazine_header_ad_image = esc_url($refined_magazine_theme_options['refined-magazine-header-ads-image']);
        $refined_magazine_header_ad_url = esc_url($refined_magazine_theme_options['refined-magazine-header-ads-image-link']);
        if (!empty($refined_magazine_header_ad_image)):
            ?>
            <div class="logo-right-wrapper clearfix  <?php echo $logo_class ?>">
                <?php
                if (!empty($refined_magazine_header_ad_image) && (!empty($refined_magazine_header_ad_url))) {
                    ?>
                    <a href="<?php echo esc_url($refined_magazine_header_ad_url); ?>" target="_blank">
                        <img src="<?php echo esc_url($refined_magazine_header_ad_image); ?>"
                             class="<?php echo esc_attr($logo_right_class); ?>">
                    </a>
                    <?php
                } else if (!empty($refined_magazine_header_ad_image)) {
                    ?>
                    <img src="<?php echo esc_url($refined_magazine_header_ad_image); ?>"
                         class="<?php echo esc_attr($logo_right_class); ?>">
                    <?php
                }
                ?>
            </div> <!-- .logo-right-wrapper -->
        <?php
        endif; // !empty $refined_magazine_header_ad_image


    }
}
add_action('refined_magazine_header_ads', 'refined_magazine_header_ads', 10);


if (!function_exists('refined_magazine_trending_news_item')) {
    /**
     * Add trending news section
     *
     * @since 1.0.0
     */
    function refined_magazine_trending_news_item()
    {
        global $refined_magazine_theme_options;
        $trending_cat = absint($refined_magazine_theme_options['refined-magazine-trending-news-category']);
        $trending_title = esc_html($refined_magazine_theme_options['refined-magazine-enable-trending-news-text']);
        if (is_rtl()) {
            $marquee_class = 'trending-right';
        } else {
            $marquee_class = 'trending-left';
        }
        ?>
        <?php
        $query_args = array(
            'post_type' => 'post',
            'ignore_sticky_posts' => true,
            'posts_per_page' => 10,
            'cat' => $trending_cat
        );

        $query = new WP_Query($query_args);
        if ($query->have_posts()) :
            ?>

            <div class="trending-wrapper">
                <?php
                if ($trending_title):
                    ?>
                    <strong class="trending-title">
                        <?php echo $trending_title; ?>
                    </strong>
                <?php
                endif;
                ?>
                <div class="trending-content <?php echo $marquee_class; ?>">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                        ?>
                        <a href="<?php the_permalink(); ?>"
                           title="<?php the_title(); ?>">
                                <span class="img-marq">
                                     <?php the_post_thumbnail('thumbnail'); ?>
                                </span>
                            <?php the_title(); ?>
                        </a>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>

                </div>
            </div> <!-- .top-right-col -->
        <?php
        endif;
        ?>
        <?php


    }
}
add_action('refined_magazine_trending_news', 'refined_magazine_trending_news_item', 10);