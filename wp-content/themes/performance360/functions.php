<?php
require_once ('lib/helpers.php');
require_once ('lib/enqueue_assets.php');

add_action( "_themename_before_loop_start", "_themename_show_big_post", 1, 1);
add_action( "_themename_before_loop_start", "_themename_show_medium_posts", 2);
// add_action ( "pre_get_posts", "function_to_add");


// function function_to_add($query) {
//     if ( $query -> is_main_query() ) {
//         $query -> set ('posts_per_page', 2);
//     }
// }

function _themename_show_big_post() {
echo 'BIG POST PLACE';
}

function _themename_show_medium_posts() {
    echo 'MEDIUM POST PLACE';
    }

?>