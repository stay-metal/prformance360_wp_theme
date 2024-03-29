<?php

function _themename_theme_support(){
    add_theme_support( 'title-tag');
    add_theme_support( 'post-thumbnails');
    add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-logo', array(
        'height' => 40,
        'width' => 276,
        'flex-height' => true,
        'flex-width' => true,
    ));
}

add_action( 'after_setup_theme','_themename_theme_support');