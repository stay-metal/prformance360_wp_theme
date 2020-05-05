<?php
require_once ('lib/enqueue_assets.php');
require_once ('lib/helpers.php');
require_once ('lib/sidebars.php');
 

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

add_filter('the_time', '_themename_time_format');

function _themename_time_format() {
  global $post;
  $timestamp = get_the_time( 'U', $post->ID );
  $date = $post->post_date;
  $date = get_post_time('j M в ', true, $post, true);
  $is_today = date( 'Y-m-d', current_time('timestamp') ) == date( 'Y-m-d', $timestamp );
  $is_yesterday = date( 'Y-m-d', current_time('timestamp') - 86400 ) == date( 'Y-m-d', $timestamp );
  if($is_today || $is_yesterday) {
    $mytimestamp = mb_strtolower ( ($is_yesterday === true ) ? 'вчера' : 'сегодня' );
    $mytimestamp.=  get_post_time(' в H:i');
  } else {
    $mytimestamp = mb_strtolower ( $date . get_post_time('H:i') );
  }
  return $mytimestamp;
  
}

?>