<?php
/**
 * Single Post Hook Element.
 *
 * @package Refined Magazine
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
/**
 * Display sidebar
 *
 * @param none
 * @return void
 *
 * @since Refined Magazine 1.0.0
 *
 */
if (!function_exists('refined_magazine_construct_sidebar')) :

    function refined_magazine_construct_sidebar()
    {
        /*  * Adds sidebar based on customizer option
      *
           * @since Refined Magazine 1.0.0
      */
        global $refined_magazine_theme_options;
        $sidebar = $refined_magazine_theme_options['refined-magazine-sidebar-archive-page'] ? $refined_magazine_theme_options['refined-magazine-sidebar-archive-page'] : 'right-sidebar';
        if (is_singular()) {
            $sidebar = $refined_magazine_theme_options['refined-magazine-sidebar-blog-page'] ? $refined_magazine_theme_options['refined-magazine-sidebar-blog-page'] : 'right-sidebar';
            global $post;
            $single_sidebar = get_post_meta($post->ID, 'refined_magazine_sidebar_layout', true);
            if (('default-sidebar' != $single_sidebar) && (!empty($single_sidebar))) {
                $sidebar = $single_sidebar;
            }
        }
        if (is_front_page()) {
            $sidebar = $refined_magazine_theme_options['refined-magazine-sidebar-front-page'] ? $refined_magazine_theme_options['refined-magazine-sidebar-front-page'] : 'right-sidebar';
        }
        if (($sidebar == 'right-sidebar') || ($sidebar == 'left-sidebar')) {
            get_sidebar();
        }
    }
endif;
add_action('refined_magazine_sidebar', 'refined_magazine_construct_sidebar', 10);

/**
 * Display Breadcrumb
 *
 * @param none
 * @return void
 *
 * @since Refined Magazine 1.0.0
 *
 */
if (!function_exists('refined_magazine_construct_breadcrumb')) :

    function refined_magazine_construct_breadcrumb()
    {
        global $refined_magazine_theme_options;
        //Check if breadcrumb is enabled from customizer
        if ($refined_magazine_theme_options['refined-magazine-extra-breadcrumb'] == 1):
            /**
             * Adds Breadcrumb based on customizer option
             *
             * @since Refined Magazine 1.0.0
             */
            $breadcrumb_type = $refined_magazine_theme_options['refined-magazine-breadcrumb-display-from-option'];
            if ($breadcrumb_type == 'plugin-breadcrumb') {
                $breadcrumb_plugin = $refined_magazine_theme_options['refined-magazine-breadcrumb-display-from-plugins'];


                ?>
                <div class="breadcrumbs">
                    <?php
                    if ((function_exists('yoast_breadcrumb')) && ($breadcrumb_plugin == 'yoast')) {
                        yoast_breadcrumb();
                    } elseif ((function_exists('rank_math_the_breadcrumbs')) && ($breadcrumb_plugin == 'rank-math')) {
                        rank_math_the_breadcrumbs();
                    } elseif ((function_exists('bcn_display')) && ($breadcrumb_plugin == 'navxt')) {
                        bcn_display();
                    }
                    ?>
                </div>
                <?php
            } else {
                ?>
                <div class="breadcrumbs">
                    <?php
                    $breadcrumb_args = array(
                        'container' => 'div',
                        'show_browse' => false
                    );

                    $refined_magazine_you_are_here_text = esc_html($refined_magazine_theme_options['refined-magazine-breadcrumb-text']);
                    if (!empty($refined_magazine_you_are_here_text)) {
                        $refined_magazine_you_are_here_text = "<span class='breadcrumb'>" . $refined_magazine_you_are_here_text . "</span>";
                    }
                    echo "<div class='breadcrumbs init-animate clearfix'>" . $refined_magazine_you_are_here_text . "<div id='refined-magazine-breadcrumbs' class='clearfix'>";
                    breadcrumb_trail($breadcrumb_args);
                    echo "</div></div>";
                    ?>
                </div>
                <?php
            }
        endif;
    }
endif;
add_action('refined_magazine_breadcrumb', 'refined_magazine_construct_breadcrumb', 10);


/**
 * Filter to change excerpt lenght size
 *
 * @since 1.0.0
 */
if (!function_exists('refined_magazine_alter_excerpt')) :
    function refined_magazine_alter_excerpt($length)
    {
        if (is_admin()) {
            return $length;
        }
        global $refined_magazine_theme_options;
        $refined_magazine_excerpt_length = $refined_magazine_theme_options['refined-magazine-excerpt-length'];
        if (!empty($refined_magazine_excerpt_length)) {
            return $refined_magazine_excerpt_length;
        }
        return 50;
    }
endif;
add_filter('excerpt_length', 'refined_magazine_alter_excerpt');


/**
 * Post Navigation Function
 *
 * @param null
 * @return void
 *
 * @since 1.0.0
 *
 */
if (!function_exists('refined_magazine_posts_navigation')) :
    function refined_magazine_posts_navigation()
    {
        global $refined_magazine_theme_options;
        $refined_magazine_pagination_option = $refined_magazine_theme_options['refined-magazine-pagination-options'];
        if ($refined_magazine_pagination_option == 'default') {
            the_posts_navigation();
        } else {
            echo "<div class='candid-pagination'>";
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => __('&laquo; Prev', 'refined-magazine'),
                'next_text' => __('Next &raquo;', 'refined-magazine'),
            ));
            echo "</div>";
        }
    }
endif;
add_action('refined_magazine_action_navigation', 'refined_magazine_posts_navigation', 10);


/**
 * Social Sharing Hook *
 * @param int $post_id
 * @return void
 *
 * @since 1.0.0
 *
 */
if (!function_exists('refined_magazine_constuct_social_sharing')) :
    function refined_magazine_constuct_social_sharing($post_id)
    {
        global $refined_magazine_theme_options;
        $refined_magazine_enable_blog_sharing = $refined_magazine_theme_options['refined-magazine-enable-blog-sharing'];
        $refined_magazine_enable_single_sharing = $refined_magazine_theme_options['refined-magazine-enable-single-sharing'];
        $refined_magazine_enable_front_sharing = $refined_magazine_theme_options['refined-magazine-enable-static-page-sharing'];
        if (($refined_magazine_enable_blog_sharing != 1) && (!is_singular())) {
            return;
        }
        if (($refined_magazine_enable_single_sharing != 1) && (is_singular())) {
            return;
        }
        if (($refined_magazine_enable_front_sharing != 1) && (is_front_page()) && ('page' == get_option('show_on_front'))) {
            return;
        }
        $refined_magazine_url = get_the_permalink($post_id);
        $refined_magazine_title = get_the_title($post_id);
        $refined_magazine_image = get_the_post_thumbnail_url($post_id);

        //sharing url
        $refined_magazine_twitter_sharing_url = esc_url('http://twitter.com/share?text=' . $refined_magazine_title . '&url=' . $refined_magazine_url);
        $refined_magazine_facebook_sharing_url = esc_url('https://www.facebook.com/sharer/sharer.php?u=' . $refined_magazine_url);
        $refined_magazine_pinterest_sharing_url = esc_url('http://pinterest.com/pin/create/button/?url=' . $refined_magazine_url . '&media=' . $refined_magazine_image . '&description=' . $refined_magazine_title);
        $refined_magazine_linkedin_sharing_url = esc_url('http://www.linkedin.com/shareArticle?mini=true&title=' . $refined_magazine_title . '&url=' . $refined_magazine_url);

        ?>
        <div class="meta_bottom">
            <div class="text_share header-text"><?php _e('Share', 'refined-magazine'); ?></div>
            <div class="post-share">
                    <a target="_blank" href="<?php echo $refined_magazine_facebook_sharing_url; ?>">
                        <i class="fa fa-facebook"></i>
                        <?php esc_html_e('Facebook', 'refined-magazine'); ?>
                    </a>
                    <a target="_blank" href="<?php echo $refined_magazine_twitter_sharing_url; ?>">
                        <i class="fa fa-twitter"></i>                        
                        <?php esc_html_e('Twitter', 'refined-magazine'); ?>
                    </a>
                    <a target="_blank" href="<?php echo $refined_magazine_pinterest_sharing_url; ?>">
                        <i class="fa fa-pinterest"></i>
                        
                        <?php esc_html_e('Pinterest', 'refined-magazine'); ?>
                    </a>
                    <a target="_blank" href="<?php echo $refined_magazine_linkedin_sharing_url; ?>">
                        <i class="fa fa-linkedin"></i>
                        <?php esc_html_e('Linkedin', 'refined-magazine'); ?>
                        
                    </a>
            </div>
        </div>
        <?php
    }
endif;
add_action('refined_magazine_social_sharing', 'refined_magazine_constuct_social_sharing', 10);

if (!function_exists('refined_magazine_excerpt_words')) :
    function refined_magazine_excerpt_words($post_id, $word_count = 25, $read_more = '')
    {
        $content = get_the_content($post_id);
        $trimmed_content = wp_trim_words($content, $word_count, $read_more);
        return $trimmed_content;

    }
endif;


if (!function_exists('refined_magazine_main_carousel')) :
    function refined_magazine_main_carousel($cat_id = '')
    {
        global $refined_magazine_theme_options;
        $refined_magazine_site_layout = $refined_magazine_theme_options['refined-magazine-site-layout-options'];

        $refined_magazine_enable_date = $refined_magazine_theme_options['refined-magazine-slider-post-date'];
        $refined_magazine_enable_author = $refined_magazine_theme_options['refined-magazine-slider-post-author'];

        $refined_magazine_slider_args = array();
        if(is_rtl()){
            $refined_magazine_slider_args['rtl']      = true;
        }
        $refined_magazine_slider_args_encoded = wp_json_encode( $refined_magazine_slider_args );

        $query_args = array(
            'post_type' => 'post',
            'ignore_sticky_posts' => true,
            'posts_per_page' => 4,
            'cat' => $cat_id
        );

        $query = new WP_Query($query_args);
        $count = $query->post_count;
        if ($query->have_posts()) :
            ?>

                        <div class="refined-magazine-col">
                <ul class="ct-post-carousel slider hover-prev-next" data-slick='<?php echo $refined_magazine_slider_args_encoded; ?>'>
                <?php
            while ($query->have_posts()) :
                $query->the_post();
                ?>
                    <li>
                            <div class="featured-section-inner ct-post-overlay">
                                <?php
                                if (has_post_thumbnail()) {
                                    ?>
                                    <div class="post-thumb">
                                        <?php
                                        refined_magazine_post_formats(get_the_ID());
                                        ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php
                                            if ($refined_magazine_site_layout == 'boxed') {
                                                the_post_thumbnail('refined-magazine-carousel-img');
                                            } else {
                                                the_post_thumbnail('refined-magazine-carousel-large-img');
                                            }
                                            ?>
                                        </a>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <div class="post-thumb">
                                        <?php
                                        refined_magazine_post_formats(get_the_ID());
                                        ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php
                                            if ($refined_magazine_site_layout == 'boxed') {
                                                ?>
                                                <img src="<?php echo esc_url(get_template_directory_uri()).'/candidthemes/assets/images/refined-mag-carousel.jpg' ?>" alt="<?php the_title(); ?>">
                                                <?php
                                            } else {
                                                ?>
                                                <img src="<?php echo esc_url(get_template_directory_uri()).'/candidthemes/assets/images/refined-mag-carousel-large.jpg' ?>" alt="<?php the_title_attribute(); ?>">
                                                <?php
                                            }
                                            ?>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="featured-section-details post-content">
                                    <div class="post-meta">
                                        <?php
                                        refined_magazine_featured_list_category(get_the_ID());
                                        ?>
                                    </div>
                                    <h3 class="post-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                        <div class="post-meta">
                                            <?php
                                            if ($refined_magazine_enable_date) {
                                                refined_magazine_widget_posted_on();
                                            }
                                            refined_magazine_read_time_slider(get_the_ID());
                                            if ($refined_magazine_enable_author) {
                                                refined_magazine_widget_posted_by();
                                            }
                                            ?>
                                        </div>
                                </div>
                            </div> <!-- .featured-section-inner -->
                    </li>
                <?php
            endwhile;
            wp_reset_postdata();
                ?>
                </ul>
                        </div><!--.refined-magazine-col-->
        <?php
        endif;

    }
endif;

if (!function_exists('refined_magazine_is_blog')) :
function refined_magazine_is_blog () {
    global  $post;
    $posttype = get_post_type($post );
    return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}

endif;