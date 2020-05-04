<?php
remove_action( "_themename_before_loop_start", "_themename_show_big_post", 1, 1);

add_action('wp_enqueue_scripts', 'newtheme_child_scripts');

// Add new styles to childtheme, to override parent styles

function newtheme_child_scripts() {
//     wp_enqueue_style( 'newtheme_child_stylesheet', get_stylesheet_directory_uri().'/bundle.css', array('_themename-stylesheet'),'1.0.0', 'all' );
} 




?>