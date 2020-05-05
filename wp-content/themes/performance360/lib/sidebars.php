<?php 

function _themename_sidebar_widgets(){
    register_sidebar( 
        array(
            'id' => 'primary-sidebar',
            'name' => esc_html('Основной Sidebar'),
            'description' => esc_html('Sidebar на главной странице, странице категории, поста и поиска'),
            'before_widget' => '<section id="%1$s" class="c-sidebar-widget u-margin-bottom-20 %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h5 class="c-sidebar-widget__title u-margin-bottom-10"',
            'after-title' => '</h5>' 
            
        )
    );
}

add_action('widgets_init', '_themename_sidebar_widgets');

?>