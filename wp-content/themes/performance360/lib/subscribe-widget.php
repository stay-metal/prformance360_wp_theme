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
        <form role="search" method="POST" class="widget_subscribe_widget__form" action="">
        <label class="widget_subscribe_widget__form-label">
            <input type="search" class="widget_subscribe_widget__form-input" placeholder="e-mail" value="" name="widget_subscribe_widget__form-email" />
            <input type="hidden" id="ajax_url" value="'.admin_url('admin-ajax.php').'"/>
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

add_action( 'wp_ajax_performance_subscribe_send', 'performance_send_subscribe' );
add_action( 'wp_ajax_nopriv_performance_subscribe_send', 'performance_send_subscribe' );

function performance_send_subscribe() {
    $email =  $_POST['email'];
    $to = "vad.lambrianov@yandex.ru";
    $subject = "Запрос на подписку";
    $message = "Новый запрос на подписку. /n
    e-mail: '. $email .'"; 

    if( wp_mail($to, $subject, $message) ){
        return true;
    } else {
        return false;
    }
    die(); 
}

