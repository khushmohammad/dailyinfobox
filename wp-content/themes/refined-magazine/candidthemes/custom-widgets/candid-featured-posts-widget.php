<?php
/**
 * Refined Magazine Featured Post Widget.
 *
 * @since 1.0.0
 */
if (!class_exists('Refined_Magazine_Featured_Post')) :

    /**
     * Highlight Post widget class.
     *
     * @since 1.0.0
     */
    class Refined_Magazine_Featured_Post extends WP_Widget
    {
        private function defaults()
        {
            $defaults = array(
                'title' => esc_html__('Popular News', 'refined-magazine'),
                'cat' => 0,
                'post-number' => 5,
            );
            return $defaults;
        }

        public function __construct()
        {
            $opts = array(
                'classname' => 'refined-magazine-featured-post',
                'description' => esc_html__('Displays Featured Post in Home Page. Place it in Home Widget Area Top.', 'refined-magazine'),
            );

            parent::__construct('refined-magazine-featured-post', esc_html__('Refined Magazine Featured Post', 'refined-magazine'), $opts);
        }


        public function widget($args, $instance)
        {
            $instance = wp_parse_args((array)$instance, $this->defaults());
            $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
            echo $args['before_widget'];

            $cat_id = !empty($instance['cat']) ? $instance['cat'] : '';
            if (!empty($title)) {
                $cat_class = 'cat-' . $cat_id;
                ?>
                <div class="title-wrapper <?php echo $cat_class; ?>">
                    <?php
                    echo $args['before_title'];
                    if (!empty($cat_id)) {
                        ?>
                        <a href="<?php echo esc_url(get_category_link($cat_id)); ?>"> <?php echo esc_html($title); ?> </a>
                        <?php
                    } else {
                        echo esc_html($title);
                    }
                    echo $args['after_title'];
                    ?>
                </div>
                <?php
            }

            $post_number = !empty($instance['post-number']) ? $instance['post-number'] : 5;
            global $refined_magazine_theme_options;
            $hide_read_time = 0;
            if(!empty( $refined_magazine_theme_options['refined-magazine-extra-hide-read-time'] )){
                $hide_read_time = $refined_magazine_theme_options['refined-magazine-extra-hide-read-time'];
            }

            $query_args = array(
                'post_type' => 'post',
                'cat' => absint($cat_id),
                'posts_per_page' => absint($post_number),
                'ignore_sticky_posts' => true
            );

            $query = new WP_Query($query_args);
            $count = $query->post_count;
            if ($query->have_posts()) :
                $i = 1;

                ?>
                <div class="ct-grid-post clearfix">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                        ?>
                        <?php

                        if ($i == 1) {
                            ?>
                            <div class="ct-two-cols ct-first-column">
                                <section class="ct-grid-post-list">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        ?>
                                        <div class="post-thumb">
                                            <?php
                                            refined_magazine_post_formats(get_the_ID());
                                            ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('refined-magazine-carousel-img'); ?>
                                            </a>
                                        </div>
                                        <?php
                                    } else{
                                        ?>

                                        <div class="post-thumb">
                                            <?php
                                            refined_magazine_post_formats(get_the_ID());
                                            ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?php echo esc_url(get_template_directory_uri()) . '/candidthemes/assets/images/refined-mag-carousel.jpg' ?>"
                                                     alt="<?php the_title(); ?>">

                                            </a>
                                        </div>

                                        <?php
                                    }
                                    ?>
                                    <div class="post-content mt-10">
                                            <div class="post-meta">
                                                <?php
                                                refined_magazine_list_category(get_the_ID());
                                                ?>
                                            </div>
                                        <h3 class="post-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                            <div class="post-meta">
                                                <?php
                                                    refined_magazine_posted_on();
                                                if ($hide_read_time != 1) {
                                                    refined_magazine_read_time_words_count(get_the_ID());
                                                }

                                                ?>
                                            </div>
                                            <div class="post-excerpt">
                                                <?php echo refined_magazine_excerpt_words(get_the_ID(), absint(25)); ?>
                                            </div>
                                    </div><!-- Post content end -->
                                </section>

                            </div>
                            <?php
                        } else {
                            if ($i == 2) {
                                ?>

                                <div class="ct-two-cols">

                                <div class="list-post-block">
                                <ul class="list-post">
                                <?php
                            }
                            ?>
                            <li>
                                <div class="post-block-style">

                                    <?php
                                    if (has_post_thumbnail()) {
                                        ?>
                                        <div class="post-thumb">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('thumbnail'); ?>
                                            </a>
                                        </div>
                                        <?php
                                    } else{ ?>
                                        <div class="post-thumb">
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?php echo esc_url(get_template_directory_uri()) . '/candidthemes/assets/images/refined-mag-thumb.jpg' ?>"
                                                     alt="<?php the_title(); ?>">
                                            </a>
                                        </div><!-- Post thumb end -->
                                    <?php }
                                    ?>
                                    <div class="post-content">
                                            <div class="post-meta">
                                                <?php
                                                refined_magazine_list_category(get_the_ID());
                                                ?>
                                            </div>
                                        <div class="featured-post-title">
                                            <h3 class="post-title"><a
                                                        href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                        </div>
                                            <div class="post-meta">
                                                <?php
                                                    refined_magazine_posted_on();
                                                if ($hide_read_time != 1) {
                                                    refined_magazine_read_time_words_count(get_the_ID());
                                                }

                                                ?>
                                            </div>
                                        <?php
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <?php
                            if ($i == $count) {
                                ?>
                                </ul>
                                </div> <!-- .list-post-block -->
                                </div> <!-- .ct-two-cols -->
                                <?php
                            }
                        }
                        ?>
                        <?php
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            <?php
            endif;

            echo $args['after_widget'];

        }

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;

            $instance['title'] = sanitize_text_field($new_instance['title']);
            $instance['cat'] = absint($new_instance['cat']);
            $instance['post-number'] = absint($new_instance['post-number']);
            return $instance;
        }

        function form($instance)
        {
            $instance = wp_parse_args((array )$instance, $this->defaults());

            $title = esc_attr($instance['title']);
            ?>
            <p>
                <label
                        for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'refined-magazine'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                       value="<?php echo esc_attr($instance['title']); ?>"/>
            </p>
            <p class="custom-dropdown-posts">
                <label for="<?php echo esc_attr($this->get_field_name('cat')); ?>">
                    <strong><?php esc_html_e('Select Category: ', 'refined-magazine'); ?></strong>
                </label>
                <?php
                $cat_args = array(
                    'orderby' => 'name',
                    'hide_empty' => 0,
                    'id' => $this->get_field_id('cat'),
                    'name' => $this->get_field_name('cat'),
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'selected' => absint($instance['cat']),
                    'show_option_all' => esc_html__('Show Recent Posts', 'refined-magazine')
                );
                wp_dropdown_categories($cat_args);
                ?>
            </p>

            <p>
                <label
                        for="<?php echo esc_attr($this->get_field_id('post-number')); ?>"><?php esc_html_e('Number of Posts to Display:', 'refined-magazine'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('post-number')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('post-number')); ?>" type="number"
                       value="<?php echo esc_attr($instance['post-number']); ?>"/>
            </p>
            <?php
        }
    }

endif;