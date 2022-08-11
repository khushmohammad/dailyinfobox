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
 * Display related posts from same category
 *
 * @param int $post_id
 * @return void
 *
 * @since 1.0.0
 *
 */
if (!function_exists('refined_magazine_related_post')) :

    function refined_magazine_related_post($post_id)
    {

        global $refined_magazine_theme_options;
        if ($refined_magazine_theme_options['refined-magazine-single-page-related-posts'] == 0) {
            return;
        }
        $categories = get_the_category($post_id);
        if ($categories) {
            $category_ids = array();
            $category = get_category($category_ids);
            $categories = get_the_category($post_id);
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
            $count = $category->category_count;
            if ($count > 1) { ?>
                <div class="related-pots-block">
                    <?php
                    $refined_magazine_related_post_title = $refined_magazine_theme_options['refined-magazine-single-page-related-posts-title'];
                    if (!empty($refined_magazine_related_post_title)):
                        ?>
                        <h2 class="widget-title">
                            <?php echo $refined_magazine_related_post_title; ?>
                        </h2>
                    <?php
                    endif;
                    ?>
                    <ul class="related-post-entries clearfix">
                        <?php
                        $refined_magazine_cat_post_args = array(
                            'category__in' => $category_ids,
                            'post__not_in' => array($post_id),
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'post_status' => 'publish',
                            'ignore_sticky_posts' => true
                        );
                        $refined_magazine_featured_query = new WP_Query($refined_magazine_cat_post_args);

                        while ($refined_magazine_featured_query->have_posts()) : $refined_magazine_featured_query->the_post();
                            ?>
                            <li>
                                <?php
                                if (has_post_thumbnail()):
                                    ?>
                                    <figure class="widget-image">
                                        <a href="<?php the_permalink() ?>">
                                            <?php the_post_thumbnail('refined-magazine-small-thumb'); ?>
                                        </a>
                                    </figure>
                                <?php
                                endif;
                                ?>
                                <div class="featured-desc">
                                    <h2 class="related-title">
                                        <a href="<?php the_permalink() ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    <div class="entry-meta">
                                        <?php
                                        refined_magazine_posted_on();
                                        ?>
                                    </div><!-- .entry-meta -->
                                </div>
                            </li>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div> <!-- .related-post-block -->
                <?php
            }
        }
    }
endif;
add_action('refined_magazine_related_posts', 'refined_magazine_related_post', 10, 1);