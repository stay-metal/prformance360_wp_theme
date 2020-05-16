<?php

class _themename_Subscribe_Widgets extends WP_Widget {

    
    public function __construct()
    {
        parent::__construct(
            'subscribe_widget',
            esc_html('Performance360 - подписка'),
                array(
                    'description' => esc_html('Виджет вывода блока с подпиской')
                )
            );
         }    
    public function form($instance){
        if(isset($instance['title'])){
            $title = $instance['title'];
        } else {
            $title = '';
        }

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"> Текст над формой: </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
    <?php
    }
    public function widget($args, $instance)
    {
       echo $args['before_widget'];
        if(isset($instance['title']) && $instance['title'] != '') {
            $title = apply_filters('widget_title', $instance['title']);
             echo  '<div class="widget_subscribe_widget__title">'.$title.'</div>' ;
        }
        echo '<div class="widget_subscribe_widget__container">
        <form role="search" method="get" class="widget_subscribe_widget__form" action="">
        <label class="widget_subscribe_widget__form-label">
            <input type="search" class="widget_subscribe_widget__form-input" placeholder="e-mail" value="" name="s" />
            <button class="widget_subscribe_widget__form-submit" type="submit">Подписаться</button>
        </label>
 
    </form>';
       echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance)
    {
            $error = '';
            $instance = array();
            $instance['title'] = isset($new_instance['title']) ? sanitize_text_field(($new_instance['title'])) : '';
            
        return $instance;
    }

}
function _themename_register_subscribe_widget(){
    register_widget( '_themename_Subscribe_Widgets' );
}

add_action('widgets_init', '_themename_register_subscribe_widget');

