<?php
/**
 * Template part for displaying page content in page.php
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
            the_post_thumbnail();
        endif;
        ?>
        <div class="refined-magazine-content-area">
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title" '.refined_magazine_get_microdata("heading").'>', '</h1>'); ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php
                the_content();

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'refined-magazine'),
                    'after' => '</div>',
                ));
                ?>
            </div><!-- .entry-content -->

            <?php if (get_edit_post_link()) : ?>
                <footer class="entry-footer">
                    <?php
                    edit_post_link(
                        sprintf(
                            wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                                __('Edit <span class="screen-reader-text">%s</span>', 'refined-magazine'),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            get_the_title()
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                    ?>
                </footer><!-- .entry-footer -->
            <?php endif; ?>
            <?php
            /**
             * refined_magazine_social_sharing hook
             * @since 1.0.0
             *
             * @hooked refined_magazine_constuct_social_sharing -  10
             */
            do_action( 'refined_magazine_social_sharing' ,get_the_ID() );
            ?>
        </div> <!-- .refined-magazine-content-area -->
    </div> <!-- .refined-magazine-content-container -->
</article><!-- #post-<?php the_ID(); ?> -->
