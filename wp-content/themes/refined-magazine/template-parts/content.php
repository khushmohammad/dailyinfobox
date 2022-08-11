<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Refined Magazine
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php refined_magazine_do_microdata('article'); ?>>
    <?php
    global $refined_magazine_theme_options;
    $refined_magazine_show_image = 1;
    if(is_singular()) {
        $refined_magazine_show_image = $refined_magazine_theme_options['refined-magazine-single-page-featured-image'];
    }
    $refined_magazine_show_content = $refined_magazine_theme_options['refined-magazine-content-show-from'];
    $refined_magazine_thumbnail = (has_post_thumbnail() && ($refined_magazine_show_image == 1)) ? 'refined-magazine-has-thumbnail' : 'refined-magazine-no-thumbnail';

    ?>
    <div class="refined-magazine-content-container <?php echo $refined_magazine_thumbnail; ?>">
        <?php
        if ($refined_magazine_thumbnail == 'refined-magazine-has-thumbnail'):
            ?>
            <div class="post-thumb">
                <?php
                refined_magazine_post_formats(get_the_ID());
                refined_magazine_post_thumbnail();
                ?>
            </div>
        <?php
        endif;
        ?>
        <div class="refined-magazine-content-area">
            <header class="entry-header">

                <div class="post-meta">
                    <?php
                    refined_magazine_list_category(get_the_ID());
                    ?>
                </div>
                <?php

                if (is_singular()) :
                    the_title('<h1 class="entry-title" ' . refined_magazine_get_microdata("heading") . '>', '</h1>');
                else :
                    the_title('<h2 class="entry-title" ' . refined_magazine_get_microdata("heading") . '><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                endif;

                if ('post' === get_post_type()) :
                    ?>
                    <div class="entry-meta">
                        <?php
                        refined_magazine_posted_on();
                        refined_magazine_read_time_words_count(get_the_ID());
                        refined_magazine_posted_by();
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->


            <div class="entry-content">
                <?php
                if (is_singular()) :
                    the_content();
                else :
                    if ($refined_magazine_show_content == 'excerpt') {
                        the_excerpt();
                    } else {
                        the_content();
                    }
                endif;

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'refined-magazine'),
                    'after' => '</div>',
                ));
                ?>

                <?php
                $refined_magazine_read_more_text = $refined_magazine_theme_options['refined-magazine-read-more-text'];
                if ((!is_single()) && ($refined_magazine_show_content == 'excerpt')) {
                    if (!empty($refined_magazine_read_more_text)) { ?>
                        <p><a href="<?php the_permalink(); ?>" class="read-more-text">
                                <?php echo esc_html($refined_magazine_read_more_text); ?>

                            </a></p>
                        <?php
                    }
                }
                ?>
            </div>
            <!-- .entry-content -->

            <footer class="entry-footer">
                <?php refined_magazine_entry_footer(); ?>
            </footer><!-- .entry-footer -->

            <?php
            /**
             * refined_magazine_social_sharing hook
             * @since 1.0.0
             *
             * @hooked refined_magazine_constuct_social_sharing -  10
             */
            do_action('refined_magazine_social_sharing', get_the_ID());
            ?>
        </div> <!-- .refined-magazine-content-area -->
    </div> <!-- .refined-magazine-content-container -->
</article><!-- #post-<?php the_ID(); ?> -->
