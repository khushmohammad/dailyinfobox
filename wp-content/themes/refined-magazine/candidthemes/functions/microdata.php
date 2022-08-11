<?php
/**
 * Header elements.
 *
 * @package Refined Magazine
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


/**
 * Get any necessary microdata.
 *
 * @since 1.0.0
 *
 * @param string $context The element to target.
 * @return string Our final attribute to add to the element.
 */
if (!function_exists('refined_magazine_get_microdata')) :
    function refined_magazine_get_microdata($context)
    {
        $data = false;

        if ('microdata' !== apply_filters('refined_magazine_schema_type', 'microdata')) {
            return false;
        }

        if ('body' === $context) {
            $type = 'WebPage';

            if (is_home() || is_archive() || is_attachment() || is_tax() || is_single()) {
                $type = 'Blog';
            }

            if (is_search()) {
                $type = 'SearchResultsPage';
            }

            $type = apply_filters('refined_magazine_body_itemtype', $type);

            $data = sprintf(
                'itemtype="https://schema.org/%s" itemscope',
                esc_html($type)
            );
        }

        if ('header' === $context) {
            $data = 'itemtype="https://schema.org/WPHeader" itemscope';
        }

        if ('navigation' === $context) {
            $data = 'itemtype="https://schema.org/SiteNavigationElement" itemscope';
        }

        if ('article' === $context) {
            $type = apply_filters('refined_magazine_article_itemtype', 'CreativeWork');

            $data = sprintf(
                'itemtype="https://schema.org/%s" itemscope',
                esc_html($type)
            );
        }

        if ('heading' === $context) {
            $data = 'itemprop="headline"';
        }

        if ('content' === $context) {
            $data = 'itemprop="text"';
        }

        if ('post-author' === $context) {
            $data = 'itemprop="author" itemtype="https://schema.org/Person" itemscope';
        }

        if ('post-author-name' === $context) {
            $data = 'itemprop="name"';
        }

        if ('comment-body' === $context) {
            $data = 'itemtype="https://schema.org/Comment" itemscope';
        }

        if ('comment-author' === $context) {
            $data = 'itemprop="author" itemtype="https://schema.org/Person" itemscope';
        }

        if ('sidebar' === $context) {
            $data = 'itemtype="https://schema.org/WPSideBar" itemscope';
        }

        if ('footer' === $context) {
            $data = 'itemtype="https://schema.org/WPFooter" itemscope';
        }

        if ('date-published' === $context) {
            $data = 'itemprop="datePublished"';
        }

        if ('date-modified' === $context) {
            $data = 'itemprop="dateModified"';
        }

        if ($data) {
            return apply_filters("refined_magazine_{$context}_microdata", $data);
        }
    }
endif;


/**
 * Output our microdata for an element.
 *
 * @since 1.0.0
 *
 * @param $context The element to target.
 * @return string The microdata.
 */
if (!function_exists('refined_magazine_do_microdata')) :
    function refined_magazine_do_microdata($context)
    {
        echo refined_magazine_get_microdata($context); // WPCS: XSS ok, sanitization ok.
    }
endif;