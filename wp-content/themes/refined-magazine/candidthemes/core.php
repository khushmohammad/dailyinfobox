<?php
/**
 * File to load the custom-sidebar folder
 * @package Refined Magazine
 *
 * Load files
*/
/**
 * Load Custom Functions
 */
require get_template_directory() . '/candidthemes/functions/custom-functions.php';

/**
 * Load Schema Microdata
 */
require get_template_directory() . '/candidthemes/functions/microdata.php';


/**
 * Load Metabox Sidebar
 */
require get_template_directory() . '/candidthemes/metabox/metabox-sidebar.php';

/**
 * Load Header Hooks
 */
require get_template_directory() . '/candidthemes/functions/hook-header.php';
require get_template_directory() . '/candidthemes/functions/header/hook-header-top.php';
require get_template_directory() . '/candidthemes/functions/header/hook-header-main.php';
require get_template_directory() . '/candidthemes/functions/header/hook-header-nav.php';
require get_template_directory() . '/candidthemes/functions/header/hook-header-misc.php';
require get_template_directory() . '/candidthemes/functions/header/hook-carousel.php';

/**
 * Load Miscellaneous Hooks
 */
require get_template_directory() . '/candidthemes/functions/hook-misc.php';

/**
 * Load Footer Hooks
 */
require get_template_directory() . '/candidthemes/functions/hook-footer.php';

/**
 * Load Single Post Hooks
 */
require get_template_directory() . '/candidthemes/functions/hook-single.php';

/**
 * Load Sanitize Functions
 */
require get_template_directory() . '/candidthemes/functions/sanitize-functions.php';

/**
 * Load category dropdown functions
 */
require get_template_directory() . '/candidthemes/functions/customizer-category-control.php';

/**
 * Load breadcrumb_trail File
 */
if (!function_exists('breadcrumb_trail')) {
	require get_template_directory() . '/candidthemes/assets/framework/breadcrumbs/breadcrumbs.php';
}

/**
 * Load Dynamic CSS from customizer
 */
require get_template_directory() . '/candidthemes/functions/dynamic-css.php';

/**
 * Load custom widgets
 */
require get_template_directory() . '/candidthemes/custom-widgets/widget-init.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-author-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-featured-posts-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-social-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-post-slider-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-tabbed-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-category-column-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-grid-post-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-advertisement-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-thumbnail-posts-widget.php';


/**
 * Customizer Pro
*/
require get_template_directory() . '/candidthemes/customizer-pro/class-customize.php';

/**
 * TGM Library and function load
 */
require get_template_directory() . '/candidthemes/tgm-library/tgm-plugin-activation.php';
require get_template_directory() . '/candidthemes/tgm-library/tgm.php';
