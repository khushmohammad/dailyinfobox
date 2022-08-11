<?php
/**
 * Main Navigation Hook Element.
 *
 * @package Refined Magazine
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('refined_magazine_constuct_carousel')) {
    /**
     * Add carousel on header
     *
     * @since 1.0.0
     */
    function refined_magazine_constuct_carousel()
    {

        if (is_front_page()) {
            global $refined_magazine_theme_options;
            $refined_magazine_site_layout = $refined_magazine_theme_options['refined-magazine-site-layout-options'];
            $slider_cat = $refined_magazine_theme_options['refined-magazine-select-category'];
            $featured_cat = $refined_magazine_theme_options['refined-magazine-select-category-featured-right'];
            $refined_magazine_enable_date = $refined_magazine_theme_options['refined-magazine-slider-post-date'];
            $refined_magazine_enable_author = $refined_magazine_theme_options['refined-magazine-slider-post-author'];
            $refined_magazine_enable_read_time = $refined_magazine_theme_options['refined-magazine-slider-post-read-time'];
            $refined_magazine_pagination_class = "";
            ?>
            <div class="refined-magazine-featured-block refined-magazine-ct-row clearfix">
                <?php

                refined_magazine_main_carousel($slider_cat);


                $query_args = array(
                    'post_type' => 'post',
                    'ignore_sticky_posts' => true,
                    'posts_per_page' => 3,
                    'cat' => $featured_cat
                );

                $query = new WP_Query($query_args);
                if ($query->have_posts()) :
                    ?>
                    <div class="refined-magazine-col refined-magazine-col-2">
                        <div class="refined-magazine-inner-row clearfix">
                            <?php
                            $i=1;
                            while ($query->have_posts()) :
                                $query->the_post();



                                $col_class = '';
                                if ($i == 1) {
                                    $col_class = 'refined-magazine-col-full';

                                }
                                ?>
                                <div class="refined-magazine-col <?php echo $col_class; ?>">
                                    <div class="featured-section-inner ct-post-overlay">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            if($i == 1) {
                                                ?>
                                                <div class="post-thumb">
                                                    <?php
                                                    refined_magazine_post_formats(get_the_ID());
                                                    ?>
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php
                                                        if ($refined_magazine_site_layout == 'boxed') {
                                                            the_post_thumbnail('refined-magazine-carousel-img-landscape');
                                                        } else {
                                                            the_post_thumbnail('refined-magazine-carousel-large-img-landscape');
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
                                                            the_post_thumbnail('refined-magazine-carousel-img');
                                                        } else {
                                                            the_post_thumbnail('refined-magazine-carousel-large-img');
                                                        }
                                                        ?>
                                                    </a>
                                                </div>
                                                <?php
                                            }
                                        }else{
                                            if($i == 1) {
                                                ?>
                                                <div class="post-thumb">
                                                    <?php
                                                    refined_magazine_post_formats(get_the_ID());
                                                    ?>
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php
                                                        if ($refined_magazine_site_layout == 'boxed') {
                                                         ?>
                                                         <img src="<?php echo esc_url(get_template_directory_uri()).'/candidthemes/assets/images/refined-mag-carousel-landscape.jpg' ?>" alt="<?php the_title(); ?>">
                                                         <?php
                                                     } else {
                                                        ?>
                                                        <img src="<?php echo esc_url(get_template_directory_uri()).'/candidthemes/assets/images/refined-mag-carousel-large-landscape.jpg' ?>" alt="<?php the_title(); ?>">
                                                        <?php
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
                                                        <img src="<?php echo esc_url(get_template_directory_uri()).'/candidthemes/assets/images/refined-mag-carousel-large.jpg' ?>" alt="<?php the_title(); ?>">
                                                        <?php
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                            <?php
                                        }
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
                            </div><!--.refined-magazine-col-->
                            <?php
                            $i++;

                        endwhile;
                        wp_reset_postdata()
                        ?>

                    </div>
                </div><!--.refined-magazine-col-->
                <?php
            endif;
            ?>

        </div><!-- .refined-magazine-ct-row-->
        <?php


        }//is_front_page
    }
}
add_action('refined_magazine_carousel', 'refined_magazine_constuct_carousel', 10);