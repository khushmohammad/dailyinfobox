<?php
/**
 * Front page hook for all WordPress Conditions
 *
 * @param null
 * @return null
 *
 * @since Refined Magazine 1.1.0
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('refined_magazine_front_page')) :

    function refined_magazine_front_page()
    {

        if (is_active_sidebar('refined-magazine-home-widget-area')) {
            dynamic_sidebar('refined-magazine-home-widget-area');
        }
        global $refined_magazine_theme_options;
        $refined_magazine_front_page_content = $refined_magazine_theme_options['refined-magazine-front-page-content'];

        if (false == $refined_magazine_front_page_content) {
            if ('posts' == get_option('show_on_front')) {
                if (have_posts()) :
                    echo "<div class='refined-news-article-wrapper ct-post-list clearfix'>";
                    /* Start the Loop */
                    while (have_posts()) : the_post();

                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part('template-parts/content', get_post_format());
                    endwhile;
                    echo '</div>';
                    /**
                     * refined_magazine_post_navigation hook
                     * @since Refined Magazine 1.0.0
                     *
                     * @hooked refined_magazine_posts_navigation -  10
                     */
                    do_action('refined_magazine_action_navigation');

                else :
                    get_template_part('template-parts/content', 'none');
                endif;
            } else {
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content', 'page');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                endwhile; // End of the loop.
            }
        }
    }

endif;
add_action('refined_magazine_action_front_page', 'refined_magazine_front_page', 10);

/**
 * Function to list categories of a post
 *
 * @param int $post_id
 * @return void Lists of categories with its link
 *
 * @since 1.0.0
 *
 */
if (!function_exists('refined_magazine_list_category')) :
    function refined_magazine_list_category($post_id = 0)
    {

        if (0 == $post_id) {
            global $post;
            if (isset($post->ID)) {
                $post_id = $post->ID;
            }
        }
        if (0 == $post_id) {
            return null;
        }
        $categories = get_the_category($post_id);
        $separator = '&nbsp;';
        $output = '';
        if ($categories) {
            $output .= '<span class="cat-name"><i class="fa fa-folder-open"></i>';
            foreach ($categories as $category) {
                $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '"  rel="category tag">' . esc_html($category->cat_name) . '</a>' . $separator;
            }
            $output .= '</span>';
            echo trim($output, $separator);
        }

    }
endif;


/**
 * Function to modify tag clouds font size
 *
 * @param none
 * @return array $args
 *
 * @since 1.0.0
 *
 */
if (!function_exists('refined_magazine_tag_cloud_widget')) :
    function refined_magazine_tag_cloud_widget($args)
    {
        $args['largest'] = 12; //largest tag
        $args['smallest'] = 12; //smallest tag
        $args['unit'] = 'px'; //tag font unit
        return $args;
    }
endif;
add_filter('widget_tag_cloud_args', 'refined_magazine_tag_cloud_widget');


/**
 * Callback functions for comments
 *
 * @param $comment
 * @param $args
 * @param $depth
 * @return void
 *
 * @since 1.0.0
 *
 */
if (!function_exists('refined_magazine_commment_list')) :

    function refined_magazine_commment_list($comment, $args, $depth)
    {
        $args['avatar_size'] = apply_filters('refined_magazine_comment_avatar_size', 50);

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
            <div class="comment-body">
                <?php _e('Pingback:', 'refined-magazine'); // WPCS: XSS OK. ?><?php comment_author_link(); ?><?php edit_comment_link(__('Edit', 'refined-magazine'), '<span class="edit-link">', '</span>'); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
            <article id="div-comment-<?php comment_ID(); ?>"
                     class="comment-body" <?php refined_magazine_do_microdata('comment-body'); ?>>
                <footer class="comment-meta">
                    <?php
                    if (0 != $args['avatar_size']) {
                        echo get_avatar($comment, $args['avatar_size']);
                    }
                    ?>
                    <div class="comment-author-info">
                        <div class="comment-author vcard" <?php refined_magazine_do_microdata('comment-author'); ?>>
                            <?php printf('<span itemprop="name" class="fn"><strong>%s</strong></span>', get_comment_author_link()); ?>
                        </div><!-- .comment-author -->

                        <div class="entry-meta comment-metadata">
                                    <span><i class="fa fa-calendar"></i><a
                                                href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                        <time datetime="<?php comment_time('c'); ?>" itemprop="datePublished">
                                    <?php printf( // WPCS: XSS OK.
                                    /* translators: 1: date, 2: time */
                                        _x('%1$s at %2$s', '1: date, 2: time', 'refined-magazine'),
                                        get_comment_date(),
                                        get_comment_time()
                                    ); ?>s
                                    </time>
                                </a></span>
                            <?php edit_comment_link(__('Edit', 'refined-magazine'), '<span class="edit-link"><i class="fa fa-pencil"></i> ', '</span>'); ?>
                            <?php
                            comment_reply_link(array_merge($args, array(
                                'add_below' => 'div-comment',
                                'depth' => $depth,
                                'max_depth' => $args['max_depth'],
                                'before' => '<span class="reply"><i class="fa fa-comment-o"></i> ',
                                'after' => '</span>',
                            )));
                            ?>
                        </div><!-- .comment-metadata -->
                    </div><!-- .comment-author-info -->

                    <?php if ('0' == $comment->comment_approved) : ?>
                        <p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'refined-magazine'); // WPCS: XSS OK. ?></p>
                    <?php endif; ?>
                </footer><!-- .comment-meta -->

                <div class="comment-content" itemprop="text">
                    <?php comment_text(); ?>
                </div><!-- .comment-content -->
            </article><!-- .comment-body -->
        <?php
        endif;
    }
endif;

/**
 * Add sidebar class in body
 *
 * @since 1.0.0
 *
 */
if (!function_exists('refined_magazine_custom_body_class')) :
    function refined_magazine_custom_body_class($classes)
    {
        global $refined_magazine_theme_options;
        $refined_magazine_sidebar = '';
        if(!empty($refined_magazine_theme_options['refined-magazine-sidebar-archive-page'])) {
            $refined_magazine_sidebar = $refined_magazine_theme_options['refined-magazine-sidebar-archive-page'];
        }
        if (is_singular()) {
            if(!empty($refined_magazine_theme_options['refined-magazine-sidebar-blog-page'])) {
                $refined_magazine_sidebar = $refined_magazine_theme_options['refined-magazine-sidebar-blog-page'];
            }
            global $post;
            $single_sidebar = get_post_meta($post->ID, 'refined_magazine_sidebar_layout', true);
            if (('default-sidebar' != $single_sidebar) && (!empty($single_sidebar))) {
                $refined_magazine_sidebar = $single_sidebar;
            }
        }
        if (is_front_page() && !empty($refined_magazine_theme_options['refined-magazine-sidebar-front-page'])) {
            $refined_magazine_sidebar = $refined_magazine_theme_options['refined-magazine-sidebar-front-page'];
        }

        $body_background = esc_attr(get_background_color());
        if ($body_background != 'fff' && $body_background != 'ffffff') {
            $classes[] = 'ct-bg';
        }
        if (!empty($refined_magazine_theme_options['refined-magazine-site-layout-options']) && $refined_magazine_theme_options['refined-magazine-site-layout-options'] == 'boxed') {
            $classes[] = 'ct-boxed';
        } else {
            $classes[] = 'ct-full-layout';
        }
        if ( !empty($refined_magazine_theme_options['refined-magazine-enable-sticky-sidebar']) && $refined_magazine_theme_options['refined-magazine-enable-sticky-sidebar'] == 1) {
            $classes[] = 'ct-sticky-sidebar';
        }
        if ($refined_magazine_sidebar == 'no-sidebar') {
            $classes[] = 'no-sidebar';
        } elseif ($refined_magazine_sidebar == 'left-sidebar') {
            $classes[] = 'left-sidebar';
        } elseif ($refined_magazine_sidebar == 'middle-column') {
            $classes[] = 'middle-column';
        } else {
            $classes[] = 'right-sidebar';
        }
        return $classes;
    }
endif;

add_filter('body_class', 'refined_magazine_custom_body_class');

/**
 * Remove ... From Excerpt
 *
 * @since 1.0.0
 *
 */
if (!function_exists('refined_magazine_excerpt_more')) :
    function refined_magazine_excerpt_more($more)
    {
        if (!is_admin()) {
            return '';
        }
    }
endif;
add_filter('excerpt_more', 'refined_magazine_excerpt_more');

/**
 * Post Formats
 *
 * @since  Refined Magazine 1.0.0
 */
if (!function_exists('refined_magazine_post_formats')):
    function refined_magazine_post_formats($post_id)
    {
        global $refined_magazine_theme_options;
        if (!empty($refined_magazine_theme_options['refined-magazine-extra-post-formats-icons']) && $refined_magazine_theme_options['refined-magazine-extra-post-formats-icons'] != 1):
            $hide_post_format_icon = $refined_magazine_theme_options['refined-magazine-extra-post-formats-icons'];
            $post_formats = get_post_format($post_id);
            switch ($post_formats) {
                case "image":
                    $post_formats = "<div class='candid-refined-post-format'><i class='fa fa-image'></i></div>";
                    break;
                case "video":
                    $post_formats = "<div class='candid-refined-post-format'><i class='fa fa-video-camera'></i></div>";

                    break;
                case "gallery":
                    $post_formats = "<div class='candid-refined-post-format'><i class='fa fa-camera'></i></div>";
                    break;
                case "audio":
                    $post_formats = "<div class='candid-refined-post-format'><i class='fa fa-volume-up'></i></div>";
                    break;
                default:
                    $post_formats = "";
            }

            echo $post_formats;
        endif;
    }

endif;


/* Word read count Pagination */
if (!function_exists('refined_magazine_read_time_words_count')) :
    /**
     * @param $content
     *
     * @return string
     */
    function refined_magazine_read_time_words_count($post_id)
    {
        global $refined_magazine_theme_options;
        if (!empty($refined_magazine_theme_options['refined-magazine-extra-hide-read-time']) && $refined_magazine_theme_options['refined-magazine-extra-hide-read-time'] != 1) {
            refined_magazine_read_time($post_id);

        }
    }

endif;


/* Word read count Pagination */
if (!function_exists('refined_magazine_read_time_slider')) :
    /**
     * @param $content
     *
     * @return string
     */
    function refined_magazine_read_time_slider($post_id)
    {
        global $refined_magazine_theme_options;
        $refined_magazine_read_time = $refined_magazine_theme_options['refined-magazine-slider-post-read-time'];
        if ($refined_magazine_read_time == 1) {
            refined_magazine_read_time($post_id);

        }
    }

endif;


/* Word read count Pagination */
if (!function_exists('refined_magazine_read_time')) :
    /**
     * @param $content
     *
     * @return string
     */
    function refined_magazine_read_time($post_id)
    {
        global $refined_magazine_theme_options;
        $content = apply_filters('the_content', get_post_field('post_content', $post_id));
        $read_words = 200;
        $decode_content = html_entity_decode($content);
        $filter_shortcode = do_shortcode($decode_content);
        $strip_tags = wp_strip_all_tags($filter_shortcode, true);
        $count = str_word_count($strip_tags);
        $word_per_min = (absint($count) / $read_words);
        $word_per_min = ceil($word_per_min);

        if (absint($word_per_min) > 0) {
            $word_count_strings = sprintf(_n('%s min read', '%s min read', number_format_i18n($word_per_min), 'refined-magazine'), number_format_i18n($word_per_min));
            if ('post' == get_post_type($post_id)):
                echo '<span class="min-read"><i class="fa fa-clock-o" aria-hidden="true"></i>';
                echo esc_html($word_count_strings);
                echo '</span>';
            endif;

        }
    }

endif;

if (!function_exists('refined_magazine_add_menu_description')) :
    function refined_magazine_add_menu_description( $item_output, $item, $depth, $args ) {

        if( 'menu-1' == $args->theme_location  && $item->description )
            $item_output = str_replace( '</a>', '<span class="menu-description">' . $item->description . '</span></a>', $item_output );

        return $item_output;
    }
endif;
add_filter( 'walker_nav_menu_start_el', 'refined_magazine_add_menu_description', 10, 4 );


//Pagination types array function
if( !function_exists( 'refined_magazine_pagination_types' ) ) :
    /*
     * Function to pagination types in array
     */
    function refined_magazine_pagination_types() {

        $pagination_types = array(
            'default'    => __('Default','refined-magazine'),
            'numeric'    => __('Numeric','refined-magazine'),
        );

        return $pagination_types;
    }
endif;