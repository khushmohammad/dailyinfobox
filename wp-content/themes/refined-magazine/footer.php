<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Refined Magazine
 */

?>
</div> <!-- .container-inner -->
</div><!-- #content -->
<?php
if (is_active_sidebar('above-footer')) {
    ?>
    <div class="ct-above-footer">
        <div class="container-inner">
            <?php dynamic_sidebar('above-footer'); ?>
        </div>
    </div>
    <?php
}
?>
<?php

/**
 * refined_magazine_before_footer hook.
 *
 * @since 1.0.0
 *
 */
do_action('refined_magazine_before_footer');


/**
 * refined_magazine_header hook.
 *
 * @since 1.0.0
 *
 * @hooked refined_magazine_footer_start - 5
 * @hooked refined_magazine_footer_socials - 10
 * @hooked refined_magazine_footer_widget - 15
 * @hooked refined_magazine_footer_siteinfo - 20
 * @hooked refined_magazine_footer_end - 25
 */
do_action('refined_magazine_footer');
?>

<?php
/**
 * refined_magazine_construct_gototop hook
 *
 * @since 1.0.0
 *
 */
do_action('refined_magazine_gototop');

?>

<?php

/**
 * refined_magazine_after_footer hook.
 *
 * @since 1.0.0
 *
 */
do_action('refined_magazine_after_footer');
?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
