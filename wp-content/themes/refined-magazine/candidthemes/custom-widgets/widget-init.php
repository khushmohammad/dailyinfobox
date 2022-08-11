<?php

if ( ! function_exists( 'refined_magazine_load_widgets' ) ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function refined_magazine_load_widgets() {

        // Highlight Post.
        register_widget( 'Refined_Magazine_Featured_Post' );

        // Author Widget.
        register_widget( 'Refined_Magazine_Author_Widget' );
		
		// Social Widget.
        register_widget( 'Refined_Magazine_Social_Widget' );

        // Post Slider Widget.
        register_widget( 'Refined_Magazine_Post_Slider' );

        // Tabbed Widget.
        register_widget( 'Refined_Magazine_Tabbed_Post' );

        // Two Category Column Widget.
        register_widget( 'Refined_Magazine_Category_Column' );

        // Grid Layout Widget.
        register_widget( 'Refined_Magazine_Grid_Post' );

        // Advertisement Widget.
        register_widget( 'Refined_Magazine_Advertisement_Widget' );

        // Thumbnail Widget.
        register_widget( 'Refined_Magazine_Thumb_Posts' );

    }

endif;
add_action( 'widgets_init', 'refined_magazine_load_widgets' );