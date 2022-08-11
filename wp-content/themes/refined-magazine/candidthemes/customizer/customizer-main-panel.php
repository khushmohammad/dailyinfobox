<?php
    /*
     * Customizer default value loaded here.
     */
    $default = refined_magazine_default_theme_options_values();

    /*
    * Theme Options Panel
    */
    $wp_customize->add_panel( 'refined_magazine_panel', array(
     'priority' => 25,
     'capability' => 'edit_theme_options',
     'title' => __( 'Refined Magazine Options', 'refined-magazine' ),
    ) );

        /**
         * Load Customizer About
         *
         * About Section
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-about.php';
        /**
         * Load Customizer Color
         *
         * Color Setting
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-colors.php';

        /**
         * Load Customizer Header Top setting
         *
         * Header section need to manage from here
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-top-header.php';

        /**
         * Load Customizer Trending News setting
         *
         * Header section need to manage from here
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-trending-news.php';

        /**
         * Load Customizer Trending News setting
         *
         * Header section need to manage from here
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-menu-section.php';

         /**
         * Load Customizer Slider Setting
         *
         * Manage Carousel Slider from here
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-slider.php';


        /**
         * Load Customizer Logo setting
         *
         * Header section need to manage from here
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-logo-options.php';

        /**
         * Load site layout setting
         *
         * site layout section can be managed from here
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-site-layout.php';

        /**
         * Load Customizer Header setting
         *
         * Header section need to manage from here
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-header.php';

        /**
         * Load Customizer Sidebar setting
         *
         * Header section need to manage from here
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-sidebar.php';

        /**
         * Load Customizer Category Color
         *
         * Header section need to manage from here
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-category-color.php';

        /**
         * Load Customizer Blog Page Setting
         *
         * Manage Blog page
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-blog-page.php';

        /**
         * Load Customizer Single Page Setting
         *
         * Manage Single page
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-single-page.php';
        
        /**
         * Load Customizer Sticky Sidebar
         *
         * Manage Sticky Sidebar
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-sticky-sidebar.php';

         /**
         * Load Customizer Social Share
         *
         * Manage Social Share
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-social-share.php';


        /**
         * Load Customizer Footer
         *
         * Manage Footer
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-footer.php';

        /**
         * Load Additonal Settings
         *
         * Manage Breadcrumbs
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-additional.php';

        /**
         * Load breadcrumb Settings
         *
         * Manage Breadcrumbs
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-breadcrumb.php';