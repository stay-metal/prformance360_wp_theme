<?php

function _themename_register_menus() {
    register_nav_menus(  array(
        'main-menu' => esc_html('Главное меню'),
        'top-menu' => esc_html('Верхнее меню'),
    ));
    register_nav_menus(  array(
        
    ));
}

add_action('init', '_themename_register_menus');