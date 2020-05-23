<?php

class pop_posts_widget extends WP_Widget
{


    public function __construct()
    {
        parent::__construct(
            'pop_posts_widget',
            esc_html('Популятрные посты'),
            array(
                'description' => esc_html('Виджет вывода 5 популярных постов')
            )
        );
    }
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = '';
        }
?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"> Заголовок: </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
<?php
    }
    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        if (isset($instance['title']) && $instance['title'] != '') {
            $title = apply_filters('widget_title', $instance['title']);
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $posts_query = new WP_Query(
            array(
                'posts_per_page' => 5,
                'meta_key' => 'post_views_count',
                'orderby' => 'meta_value_num',
                'order' => 'DESC'
            )
        );

        if ($posts_query->have_posts()) {
            while ($posts_query->have_posts()) {
                $posts_query->the_post();
                $has_post_thumb = get_the_post_thumbnail() !== '';
                echo '<div class="widget_posts_widget__post-container">';
                echo '<a class="siderbar-post__widget" href="' . get_the_permalink() . '">';
                echo $has_post_thumb ? '<img src="' . get_the_post_thumbnail_url() . '" /></a>' : '<img src="' . get_stylesheet_directory_uri() . '/src/assets/images/placeholder.png" />';
                echo '<div class="widget_posts_widget__post-title widget_posts_widget__post-title_full-width">';
                echo '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
                echo '</div>';
                echo '</div>';
            }
        }
        echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = isset($new_instance['title']) ? sanitize_text_field(($new_instance['title'])) : '';

        return $instance;
    }
}
function _themename_register_pop_posts_widget()
{
    register_widget('pop_posts_widget');
}

add_action('widgets_init', '_themename_register_pop_posts_widget');
