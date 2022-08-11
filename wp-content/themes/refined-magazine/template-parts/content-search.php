<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Refined Magazine
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php refined_magazine_do_microdata('article'); ?>>
    <?php
    $refined_magazine_thumbnail = (has_post_thumbnail()) ? 'refined-magazine-has-thumbnail' : 'refined-magazine-no-thumbnail';
    ?>
    <div class="refined-magazine-content-container <?php echo $refined_magazine_thumbnail; ?>">
        <?php
        if (has_post_thumbnail()):
            refined_magazine_post_thumbnail();
        endif;
        ?>
        <div class="refined-magazine-content-area">
            <header class="entry-header">
                <?php
                if ('post' === get_post_type()) :
                    ?>
                    <div class="entry-meta">
                        <?php
                        refined_magazine_list_category(get_the_ID());
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif;
                ?>
                <?php the_title(sprintf('<h2 class="entry-title" '.refined_magazine_get_microdata("heading").'><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

                <?php if ('post' === get_post_type()) : ?>
                    <div class="entry-meta">
                        <?php
                        refined_magazine_posted_on();
                        refined_magazine_posted_by();
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->

            <div class="entry-summary">
                <?php
                $refined_magazine_show_content = 'excerpt';
                if ( $refined_magazine_show_content == 'excerpt' ) {
                    the_excerpt();
                } else {
                    the_content();
                }
                ?>
            </div><!-- .entry-summary -->

            <footer class="entry-footer">
                <?php refined_magazine_entry_footer(); ?>
            </footer><!-- .entry-footer -->
        </div> <!-- .refined-magazine-content-area -->
        <?php
        /**
         * refined_magazine_social_sharing hook
         * @since 1.0.0
         *
         * @hooked refined_magazine_constuct_social_sharing -  10
         */
        do_action( 'refined_magazine_social_sharing' ,get_the_ID() );
        ?>
    </div> <!-- .refined-magazine-content-container -->
</article><!-- #post-<?php the_ID(); ?> -->
