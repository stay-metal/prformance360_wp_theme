<?php

function _themename_register_menus() {
    register_nav_menus(  array(
        'main-menu' => esc_html('Главное меню'),
        'top-menu' => esc_html('Верхнее меню'),
    )
  );
}

function _themename_dropdown_icon($title, $item, $args, $depth){
    if ( $args->theme_location == "main-menu" ) {
        if(in_array('menu-item-has-children', $item->classes) && !in_array('mega', $item->classes)){
            if($depth == 0) {
                $title .= '<i class="fa fa-angle-down"></i>';
            } else {
                $title .= '<i class="fa fa-angle-right"></i>';
            }
        }
    }
    return $title;
}

add_filter( 'nav_menu_item_title', '_themename_dropdown_icon', 10, 4 );
add_action('init', '_themename_register_menus');