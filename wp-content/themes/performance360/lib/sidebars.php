<?php 

function _themename_sidebar_widgets(){
    register_sidebar( 
        array(
            'id' => 'primary-sidebar',
            'name' => esc_html('Основной Sidebar'),
            'description' => esc_html('Sidebar на главной странице, странице категории, поста и поиска'),
            'before_widget' => '<section id="%1$s" class="c-sidebar-widget u-margin-bottom-20 %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h5 class="c-sidebar-widget__title">',
            'after-title' => '</h5>' 
            
        )
    );
}

function _themename_footer_widgets(){
    register_sidebar( 
        array(
            'id' => 'footer-sidebar-1',
            'name' => esc_html('Footer колонка 1'),
            'description' => esc_html('Footer колонка 1'),
            'before_widget' => '<section id="%1$s" class="c-footer-widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h5 class="c-footer-widget__title u-margin-bottom-10">',
            'after-title' => '</h5>' 
            
        )
    );

    register_sidebar( 
        array(
            'id' => 'footer-sidebar-2',
            'name' => esc_html('Footer колонка 2'),
            'description' => esc_html('Footer колонка 2'),
            'before_widget' => '<section id="%1$s" class="c-footer-widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h5 class="c-footer-widget__title u-margin-bottom-10">',
            'after-title' => '</h5>' 
            
        )
    );

    register_sidebar( 
        array(
            'id' => 'footer-sidebar-3',
            'name' => esc_html('Footer колонка 3'),
            'description' => esc_html('Footer колонка 3'),
            'before_widget' => '<section id="%1$s" class="c-footer-widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h5 class="c-footer-widget__title u-margin-bottom-10">',
            'after-title' => '</h5>' 
            
        )
    );
}

add_action('widgets_init', '_themename_sidebar_widgets');
add_action('widgets_init', '_themename_footer_widgets');

?>