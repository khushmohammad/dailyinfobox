<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Refined Magazine
 */

get_header();
?>

    <section id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php

            /**
             * refined_magazine_before_main_content hook.
             *
             * @since 1.0
             */
            do_action('refined_magazine_before_main_content');


            /**
             * refined_magazine_breadcrumb hook.
             *
             * @since 1.0
             * @hooked refined_magazine_construct_breadcrumb -  10
             *
             */
            do_action('refined_magazine_breadcrumb');

            if (have_posts()) :
                ?>
                    <header class="page-header">
                        <h1 class="page-title">
                            <?php
                            /* translators: %s: search query. */
                            printf(esc_html__('Search Results for: %s', 'refined-magazine'), '<span>' . get_search_query() . '</span>');
                            ?>
                        </h1>
                    </header><!-- .page-header -->
                <div class="ct-post-list clearfix">

                    <?php
                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();

                        /**
                         * Run the loop for the search to output the results.
                         * If you want to overload this in a child theme then include a file
                         * called content-search.php and that will be used instead.
                         */
                        get_template_part('template-parts/content', 'search');

                    endwhile;
                    ?>
                </div>
                <?php

                /**
                 * refined_magazine_action_navigation hook
                 * @since Refined Magazine 1.0.0
                 *
                 * @hooked refined_magazine_posts_navigation -  10
                 */
                do_action('refined_magazine_action_navigation');

            else :

                get_template_part('template-parts/content', 'none');

            endif;

            /**
             * refined_magazine_after_main_content hook.
             *
             * @since 0.1
             */
            do_action('refined_magazine_after_main_content');
            ?>

        </main><!-- #main -->
    </section><!-- #primary -->

<?php
/**
 * refined_magazine_sidebar hook
 * @since Refined Magazine 1.0.0
 *
 * @hooked refined_magazine_sidebar -  10
 */
do_action('refined_magazine_sidebar');

get_footer();
