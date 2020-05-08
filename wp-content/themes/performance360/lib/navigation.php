<?php

function _themename_register_menus() {
    register_nav_menus(  array(
        'main-menu' => esc_html('Главное меню'),
        'top-menu' => esc_html('Верхнее меню'),
        'soc-menu' => esc_html('Ссылки на соц. сети')
    )
  );
}

if (!function_exists('_themename_dropdown_icon')) {
function _themename_dropdown_icon($title, $item, $args, $depth){
    if ( $args->theme_location == "main-menu" ) {
        if( in_array('menu-item-has-children', $item->classes) ){
            if($depth == 0) {
                $title .= '<i class="fa fa-angle-down"></i>';
            } else {
                $title .= '<i class="fa fa-angle-right"></i>';
            }
        }
    }
    return $title;
}
}

if (!function_exists('_themename_soc_icon')) {
    function _themename_soc_icon($title, $item, $args, $depth){
        $fa_classes = array('fas', 'far', 'fal', 'fad', 'fab');
        if ( $args->theme_location == "soc-menu" ) {
            if(in_array($item->classes[0], $fa_classes) && preg_match('/fa-/',$item->classes[1])){
                    $title = '<i class="'.esc_attr($item->classes[0]).' '.esc_attr($item->classes[1]).'"></i>';
                } else {
                    $title = '';
                }
        }
        return $title;
    }
    }

add_filter( 'nav_menu_item_title', '_themename_dropdown_icon', 10, 4 );
add_filter( 'nav_menu_item_title', '_themename_soc_icon', 11, 4 );
add_action('init', '_themename_register_menus');