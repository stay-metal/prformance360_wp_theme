<?php

class _themename_Posts_Widgets extends WP_Widget {

    
    public function __construct()
    {
        parent::__construct(
            'posts_widget',
            esc_html('Performance360 - посты'),
                array(
                    'description' => esc_html('Виджет вывода постов')
                )
            );
         }    
    public function form($instance){
        // var_dump($instance);
        if(isset($instance['title'])){
            $title = $instance['title'];
        } else {
            $title = '';
        }
        if(isset($instance['posts'])){
            $posts = $instance['posts'];
        } else {
            $posts = '';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"> Заголовок: </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('posts'); ?>"> Посты: </label>
            <input class="widefat" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" type="text" value="<?php echo esc_attr($posts); ?>" />
            <?php if ($instance['posts_error'] && $instance['posts_error'] != '') { ?>
                <span style="color:red;"> <?php echo $instance['posts_error'];?> </span><br>
            <?php } ?>
            <span> Перечислите id постов через запятую </span>
        </p>
    <?php
    }
    public function widget($args, $instance)
    {
       echo $args['before_widget'];
        if(isset($instance['title']) && $instance['title'] != '') {
            $title = apply_filters('widget_title', $instance['title']);
             echo $args['before_title']. $title . $args['after_title'];
        }
            $posts_id = explode(',', $instance['posts'] );

            $posts_query = new WP_Query(
                array(
                    // 'post_type' => 'post',
                    // 'posts_per_page' => -1,
                    'post__in' => $posts_id,
                    'post_status' => 'publish'
                )
            );
            if ($posts_query -> have_posts()){
                    while($posts_query -> have_posts()){
                        $posts_query -> the_post();
                        echo '<div class="widget_posts_widget__post-container">';
                            if(get_the_post_thumbnail() !== '') {
                                echo '<a href="'.get_the_permalink() .'"><div class="u-bg-image widget_posts_widget__post-thumbnail" style="background-image: url('. get_the_post_thumbnail_url() .'); " >';
                                    // the_post_thumbnail( '_themename-posts-widget-thumb' );
                                echo '</div></a>';
                            } else {
                                echo '<a href="'.get_the_permalink() .'"><div class="u-bg-image widget_posts_widget__post-thumbnail" style="background-image: url('. get_template_directory_uri() .'/dist/assets/images/placeholder.png); " >';
                                    // the_post_thumbnail( '_themename-posts-widget-thumb' );
                                echo '</div></a>';                                
                            }
                            // if(get_the_post_thumbnail() !== '') {
                            echo '<div class="widget_posts_widget__post-title">';
                            // } 
                            // else {
                            //     echo '<div class="widget_posts_widget__post-title widget_posts_widget__post-title_full-width">'; 
                            // }
                           echo ' <a href="'.get_the_permalink() .'">' .get_the_title() .'</a>';
                            echo '</div>';
                        echo '</div>';
                    }
    
            }
            // var_dump($posts_query);
            // die;
       echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance)
    {
            $error = '';
            $instance = array();
            $instance['title'] = isset($new_instance['title']) ? sanitize_text_field(($new_instance['title'])) : '';
            $posts = preg_replace('/\s+/', '', $new_instance['posts']);
            if(!preg_match('/^(\d+)(,(\d+))*$/', $posts)) {
                $instance['posts']= $old_instance['posts'];
                $instance['posts_error'] = 'Посты необходимо вводить в формате: id1,id2,id3...';
            } else {
                $instance['posts_error'] = '';
                $instance['posts']= $new_instance['posts'];
            }
            
        return $instance;
    }

}
function _themename_register_posts_widget(){
    register_widget( '_themename_Posts_Widgets' );
}

add_action('widgets_init', '_themename_register_posts_widget');

