<?php
require_once ('lib/enqueue_assets.php');
require_once ('lib/helpers.php');
require_once ('lib/sidebars.php');
require_once ('lib/theme_support.php');
require_once ('lib/navigation.php');
require_once ('lib/customize.php');
 

add_action( 'pre_get_posts', 'change_posts_per_page' );

function change_posts_per_page( $query ) {

    $query->set( 'posts_per_page', 9 );
    return;
}

add_action( "_themename_before_loop_start", "_themename_show_big_post", 1, 1);
add_action( "_themename_before_loop_start", "_themename_show_medium_posts", 2);

// add_action ( "pre_get_posts", "function_to_add");


// function function_to_add($query) {
//     if ( $query -> is_main_query() ) {
//         $query -> set ('posts_per_page', 2);
//     }
// }
if (!function_exists('_themename_show_big_post')) {
  function _themename_show_big_post() {
  echo 'BIG POST PLACE';
  }
}

if (!function_exists('_themename_show_medium_posts')) {
  function _themename_show_medium_posts() {
  echo 'MEDIUM POST PLACE';
  }
}

add_filter('the_time', '_themename_time_format');

if (!function_exists('_themename_time_format')) {
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
}

if (!function_exists('_themename_footer_widget_sidebar')) {
    function _themename_footer_widget_sidebars() {
      $sidebars = array_filter(wp_get_sidebars_widgets(), function($v, $k) {
        if (!empty($v)) return preg_match('/footer-sidebar-/',  $k);
        // $return = preg_match('/footer-sidebar-/', $element);
            return !empty($element);
    }, ARRAY_FILTER_USE_BOTH);
    return array_keys($sidebars);
    }
  }

  // Load more 
  function _themename_loadmore_ajax_handler(){
    global $wp_query;

    $is_home = json_decode( stripslashes( $_POST['is_home'] ), true );
    $args = json_decode( stripslashes( $_POST['query'] ), true );
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';
    
   if ( $is_home ) {
        query_posts( $args );
      
        if( have_posts() ) {

          while( have_posts() ): the_post();
      
            get_template_part( 'template-parts/post/content' );

          endwhile;
      
        }
        die;
   } else {
    echo 'NOT HOME';
    // query_posts( $args );
   
    // if( have_posts() ) :

    //   while( have_posts() ): the_post();
   
    //     get_template_part( 'template-parts/post/content' );

    //   endwhile;
   
    // endif;
    // die;
  }
  }
   
  add_action('wp_ajax_loadmore', '_themename_loadmore_ajax_handler');

?>