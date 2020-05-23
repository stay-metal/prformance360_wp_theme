<?php
require_once('lib/enqueue_assets.php');
require_once('lib/helpers.php');
require_once('lib/widgets.php');
require_once('lib/sidebars.php');
require_once('lib/theme_support.php');
require_once('lib/navigation.php');
require_once('lib/customize.php');
require_once('lib/metaboxes.php');
require_once('lib/posts-widget.php');
require_once('lib/subscribe-widget.php');
require_once('lib/sidebar_pop_posts_widget.php');




add_action("_themename_before_loop_start", "_themename_show_big_post", 1, 1);
add_action("_themename_before_loop_start", "_themename_show_medium_posts", 2);

// add_action ( "pre_get_posts", "function_to_add");


// function function_to_add($query) {
//     if ( $query -> is_main_query() ) {
//         $query -> set ('posts_per_page', 2);
//     }
// }

/*
 * Set post views count using post meta
 */
function setPostViews($postID) {
  $countKey = 'post_views_count';
  $count = get_post_meta($postID, $countKey, true);
  if($count==''){
      $count = 0;
      delete_post_meta($postID, $countKey);
      add_post_meta($postID, $countKey, '0');
  }else{
      $count++;
      update_post_meta($postID, $countKey, $count);
  }
}

if (!function_exists('_themename_show_big_post')) {
  function _themename_show_big_post()
  {
    $big_post_field = get_post_meta(get_option('page_for_posts'));
    if (isset($big_post_field['__themename_main_bg_post']) && $big_post_field['__themename_main_bg_post'][0] != '') {
      $big_post_query = new WP_Query(array(
        'p'         => $big_post_field['__themename_main_bg_post'][0],
        'post_type' => 'any'
      ));
      if ($big_post_query->have_posts()) {
        while ($big_post_query->have_posts()) : $big_post_query->the_post();
          get_template_part('template-parts/post/content', 'big_post');
        endwhile;
      }
    }
  }
}

if (!function_exists('_themename_show_medium_posts')) {
  function _themename_show_medium_posts()
  {
    $md_post_field = get_post_meta(get_option('page_for_posts'));
    $md_posts = array();
    if (isset($md_post_field['__themename_middle_one_post'][0]) && $md_post_field['__themename_middle_one_post'][0] != '') {
      $md_posts[] = $md_post_field['__themename_middle_one_post'][0];
    }
    if (isset($md_post_field['__themename_middle_two_post'][0]) && $md_post_field['__themename_middle_two_post'][0] != '') {
      $md_posts[] = $md_post_field['__themename_middle_two_post'][0];
    }
    if (!empty($md_posts)) {
      $md_post_query = new WP_Query(array(
        'post__in'         => $md_posts,
        'post_type' => 'post'
      ));
      echo '<div class="o-row">';
      if ($md_post_query->have_posts()) {
        while ($md_post_query->have_posts()) : $md_post_query->the_post();
          if (count($md_posts) > 1) {
            get_template_part('template-parts/post/content', 'md_post');
          } else {
            get_template_part('template-parts/post/content', 'big_post');
          }
        endwhile;
      }
      echo '</div>';
    }
  }
}

if (!function_exists('_themename_post_time')) {
  function _themename_post_time()
  {
    add_filter('the_time', '_themename_time_format');
    return  the_time();
  }
}

if (!function_exists('_themename_time_format')) {
  function _themename_time_format()
  {
    global $post;
    $timestamp = get_the_time('U', $post->ID);
    $date = $post->post_date;
    $date = get_post_time('j M в ', true, $post, true);
    $is_today = date('Y-m-d', current_time('timestamp')) == date('Y-m-d', $timestamp);
    $is_yesterday = date('Y-m-d', current_time('timestamp') - 86400) == date('Y-m-d', $timestamp);
    if ($is_today || $is_yesterday) {
      $mytimestamp = mb_strtolower(($is_yesterday === true) ? 'вчера' : 'сегодня');
      $mytimestamp .=  get_post_time(' в H:i');
      $mytimestamp =  '<time>' . $mytimestamp . '</time>';
    } else {
      $mytimestamp = mb_strtolower($date . get_post_time('H:i'));
      $mytimestamp =  '<time>' . $mytimestamp . '</time>';
    }
    return $mytimestamp;
  }
}

if (!function_exists('_themename_footer_widget_sidebar')) {
  function _themename_footer_widget_sidebars()
  {
    $sidebars = array_filter(wp_get_sidebars_widgets(), function ($v, $k) {
      if (!empty($v)) return preg_match('/footer-sidebar-/',  $k);
      // $return = preg_match('/footer-sidebar-/', $element);
      return !empty($element);
    }, ARRAY_FILTER_USE_BOTH);
    return array_keys($sidebars);
  }
}


// Load more 
function _themename_loadmore_ajax_handler()
{


  $is_home = json_decode(stripslashes($_POST['is_home']), true);
  $args = json_decode(stripslashes($_POST['query']), true);
  $args['paged'] = $_POST['page'] + 1;
  $args['post_status'] = 'publish';


  if ($is_home) {
    query_posts($args);

    if (have_posts()) {

      while (have_posts()) : the_post();

        get_template_part('template-parts/post/content', 'masonry');

      endwhile;
    }
  } else {

    query_posts($args);

    if (have_posts()) :

      while (have_posts()) : the_post();

        get_template_part('template-parts/post/content', 'page');

      endwhile;

    endif;
    die;
  }
}

add_action('wp_ajax_loadmore', '_themename_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', '_themename_loadmore_ajax_handler');

function _themename_single_meta($id, $key, $default)
{
  $value = get_post_meta($id, $key, true);
  if (!$value && $default) {
    return $default;
  }
  return $value;
}

// THE EXERPT
if (!function_exists('_themename_excerpt_length')) {
  function _themename_excerpt_length($length)
  {
    return 0;
  }
}
if (!function_exists('_themename_excerpt_more')) {
  function _themename_excerpt_more($more)
  {
    return '';
  }
}
if (!function_exists('_themename_the_excerpt')) {
  // function _themename_the_excerpt($post_excerpt) {
  //       return 'filtred';
  //       }
}

add_filter('excerpt_more', '_themename_excerpt_more');
add_filter('excerpt_length', '_themename_excerpt_length');
// add_action( 'the_excerpt', '_themename_the_excerpt' );

add_filter('the_tags', '_themename_tags_filter', 10, 5);

function _themename_single_tags()
{
  global $post;
  $tags = get_terms(array(
    'taxonomy'      => array('post_tag'),
    'object_ids'    =>  $post->ID,
    'orderby'       => 'id',
    'order'         => 'ASC',
  ));
  $tag_list = '';
  $i = 1;
  if (!empty($tags)) {
    foreach ($tags as $tag) {
      $color = get_term_meta($tag->term_id, '_themename_tag_color', true);
      if ($i <= 2) {
        $tag_list .= '<a href="' . get_page_link($tag->page_rel) . '" class="c-post__tags-link" style="color:#' . $tag->color . '; background-color: ' . $tag->bgColor . '">#' . $tag->name . '</a> ';
      }
      $i++;
    }
  }
  echo $tag_list;
}

// function _themename_get_term_page_connection($wp_query) {
//   $page_id  =$wp_query->queried_object->ID;
//   $terms = get_terms( 'post_tag', [
//     'hide_empty' => false,
//   ] );
//   foreach($terms as $term) {
//     if (get_term_meta( $term->term_id, '_themename_page_field', true) && get_term_meta( $term->term_id, '_themename_page_field', true) == $page_id) {
//     return $term->term_id;
//     }
//   }
// }
// #007DFF
function _themename_loop_tags()
{
  global $post;


  $tags = get_terms(array(
    'taxonomy'      => array('post_tag'),
    'object_ids'    =>  $post->ID,
    'orderby'       => 'id',
    'order'         => 'ASC',
  ));
  $tags_final_array = [];

  foreach ($tags as $tag) {
    $page = get_term_meta($tag->term_id, '_themename_page_field', true);
    $color = get_term_meta($tag->term_id, '_themename_tag_color', true);
    $bgColor = get_term_meta($tag->term_id, '_themename_tag_bg_color', true);
    $tag->page_rel = $page;
  
    if (!empty($page)) {
      if (!empty($color)) {
        $tag->color = $color;
      } else {
        $tag->color = 'AD6868';
      }
      if (!empty($bgColor)) {
        $bgClass = 'c-post__tag--with-background';
        $tag->bgColor = "#$bgColor";
      } else {
        $tag->bgColor = 'rgba(255, 0, 0, 0)';
      }
      $tags_final_array[] = $tag;
    }
  }

  $tag_list = '';
  $i = 1;
  if (!empty($tags_final_array)) {
    foreach ($tags_final_array as $tag) {
      if ($i <= 2) {
        $tag_list .= '<a href="' . get_page_link($tag->page_rel) . '" class="c-post__tags-link '. $bgClass .'" style="color:#' . $tag->color . '; background-color: ' . $tag->bgColor . '">' . $tag->name . '</a> ';
      }
      $i++;
    }
  }
  return $tag_list;
}

function _themename_single_page_cats()
{
  global $post;
  $cats = wp_get_post_categories($post->ID);
  $tag_list = '';
  foreach ($cats as $cat) {
    $tag_list .= '<a href="' . get_category_link($cat) . '" class="c-post__tags-link" style="color:#EB5757">' . get_cat_name($cat) . '</a> ';
  }
  return $tag_list;
}


function _themename_tags_filter($tag_list, $before, $sep, $after, $id)
{
  global $post;
  $tags = get_terms(array(
    'taxonomy'      => array('post_tag'),
    'object_ids'    =>  $post->ID,
    // 'count'         => 2,
    'orderby'       => 'id',
    'order'         => 'ASC',
    // 'hide_empty'    => true, 
    // 'include'       => array(),
    // 'exclude'       => array(), 
    // 'exclude_tree'  => array(), 
    'number'        => 2,
    // 'fields'        => 'all', 
    // 'slug'          => '', 
    // 'parent'         => '',
    // 'hierarchical'  => true, 
    // 'child_of'      => 0, 
    // 'get'           => '', 
    // 'name__like'    => '',
    // 'pad_counts'    => false, 
    // 'offset'        => '', 
    // 'search'        => '', 
    // 'cache_domain'  => 'core',
    // 'name'          => '',    
    // 'childless'     => false, 
    // 'update_term_meta_cache' => true, // подгружать метаданные в кэш
    // 'meta_query'    => '',
  ));
  $tag_list = '';
  foreach ($tags as $tag) {
    $tag_list .= '<a href="' . get_tag_link($tag->term_id) . '" class="c-post__tags-link">' . $tag->name . '</a> ';
  }
  // var_dump($tags);  
  // die;
  return $tag_list;
}

//IMAGE SIZES

function _themename_thumbs_sizes()
{
  add_image_size('_themename-main-loop-thumb', 300, 150, array('center', 'center'));
  add_image_size('_themename-single-thumb', 845, 300, array('center', 'center'));
  add_image_size('_themename-posts-widget-thumb', 117, 70, false);
}
add_action('after_setup_theme', '_themename_thumbs_sizes');

// ADD COLOR OF TAG TEXT
function _themename_add_tag_color($taxonomy)
{
?>
  <div class="form-field term-colorpicker-wrap">
    <label for="term-colorpicker">Цвет: </label>
    <input type="color" name="_themename_tag_color" value="#AD6868" class="colorpicker" id="term-colorpicker" />
    <p>В этом поле можно выбрать цвета текста тега</p>
  </div>
<?php
}
add_action('add_tag_form_fields', '_themename_add_tag_color');


function _themename_edit_tag_color($term)
{

  $color = get_term_meta($term->term_id, '_themename_tag_color', true);
  $color = (!empty($color)) ? "#{$color}" : '#AD6868';

?>
  <tr class="form-field term-colorpicker-wrap">
    <th scope="row"><label for="term-colorpicker">Цвет: <?php echo $color; ?></label></th>
    <td>
      <input type="color" name="_themename_tag_color" value="<?php echo $color; ?>" class="colorpicker" id="term-colorpicker" />
      <p class="description">В этом поле можно выбрать цвета текста тега</p>
    </td>
  </tr>

<?php
}
add_action('edit_tag_form_fields', '_themename_edit_tag_color');


// ADD TAG BACKGROUND COLOR
function _themename_add_tag_bg_color($taxonomy)
{
?>
  <div class="form-field term-colorpicker-wrap">
    <label for="term-colorpicker">Цвет: </label>
    <input type="color" name="_themename_tag_bg_color" value="#fffff" class="colorpicker" id="term-colorpicker" />
    <p>В этом поле можно выбрать цвета бекграунда тега</p>
  </div>
<?php
}
add_action('add_tag_form_fields', '_themename_add_tag_bg_color');


function _themename_edit_tag_bg_color($term)
{

  $color = get_term_meta($term->term_id, '_themename_tag_bg_color', true);
  $color = (!empty($color)) ? "#{$color}" : '#ffffff';

?>
  <tr class="form-field term-colorpicker-wrap">
    <th scope="row"><label for="term-colorpicker">Цвет: <?php echo $color; ?></label></th>
    <td>
      <input type="color" name="_themename_tag_bg_color" value="<?php echo $color; ?>" class="colorpicker" id="term-colorpicker" />
      <p class="description">В этом поле можно выбрать цвета бекграунда тега</p>
    </td>
  </tr>

<?php
}
add_action('edit_tag_form_fields', '_themename_edit_tag_bg_color');

function _themename_save_termmeta_tag($term_id)
{
  // Save term color if possible
  if (isset($_POST['_themename_tag_color']) && !empty($_POST['_themename_tag_color'])) {
    $sanitized_color = sanitize_hex_color_no_hash($_POST['_themename_tag_color']);
    update_term_meta($term_id, '_themename_tag_color', $sanitized_color);
  } else {
    delete_term_meta($term_id, '_themename_tag_color');
  }

  // Save term color if possible
  if (isset($_POST['_themename_tag_bg_color']) && !empty($_POST['_themename_tag_bg_color'])) {
    $sanitized_color = sanitize_hex_color_no_hash($_POST['_themename_tag_bg_color']);
    update_term_meta($term_id, '_themename_tag_bg_color', $sanitized_color);
  } else {
    delete_term_meta($term_id, '_themename_tag_bg_color');
  }
}
add_action('created_term', '_themename_save_termmeta_tag');
add_action('edit_term', '_themename_save_termmeta_tag');


function _themename_add_page_field($taxonomy)
{
  $dropdown_args = array(
    'depth'            => 0,
    'post_type'        => 'page',
    'name'             => '_themename_page_field',
    'selected'         => 0,
    'show_option_none' => 'Нет',
    'sort_column'      => 'menu_order, post_title',
    'value_field'      => 'ID',
    'echo'             => 1,
  ); ?>
  <div class="form-field _themename_page_field">
    <label for="_themename_page_field" style="padding-bottom: 5px;">Привязка к странице: </label>
    <?php
    wp_dropdown_pages($dropdown_args);
    ?>
  </div>
<?php
}
add_action('add_tag_form_fields', '_themename_add_page_field');

function _themename_edit_page_field($term)
{

  $page = get_term_meta($term->term_id, '_themename_page_field', true);
  $page = (!empty($page)) ? $page : 0;

  $dropdown_args = array(
    'depth'            => 0,
    'post_type'        => 'page',
    'name'             => '_themename_page_field',
    'selected'         => $page,
    'show_option_none' => 'Нет',
    'sort_column'      => 'menu_order, post_title',
    'value_field'      => 'ID',
    'echo'             => 1,
  );
?>
  <tr class="form-field _themename_page_field">
    <th scope="row"><label for="_themename_page_field">Привязка к странице: </label></th>
    <p class="description">В данном поле нужно указать страницу</p>
    <td>
      <?php
      wp_dropdown_pages($dropdown_args);
      $defaults = array(
        'depth'            => 0,
        'post_type'        => 'post',
        'name'             => '_themename_page_field',
        'selected'         => $page,
        'show_option_none' => 'Нет',
        'sort_column'      => 'menu_order, post_title',
        'value_field'      => 'ID',
        'echo'             => 1,
      );
      wp_dropdown_pages($defaults);
      ?>
    </td>
  </tr>
<?php
}

add_action('edit_tag_form_fields', '_themename_edit_page_field');



function _themename_save_pagemeta_tag($term_id)
{
  // Save term color if possible
  if (isset($_POST['_themename_page_field']) && !empty($_POST['_themename_page_field'])) {
    // $sanitized_color = sanitize_hex_color_no_hash($_POST['_themename_tag_color']);
    update_term_meta($term_id, '_themename_page_field', $_POST['_themename_page_field']);
  } else {
    delete_term_meta($term_id, '_themename_page_field');
  }
}
add_action('created_term', '_themename_save_pagemeta_tag');
add_action('edit_term', '_themename_save_pagemeta_tag');

// Page - tag connection

function _themename_get_term_page_connection($wp_query)
{
  $page_id  = $wp_query->queried_object->ID;
  $terms = get_terms('post_tag', [
    'hide_empty' => false,
  ]);
  foreach ($terms as $term) {
    if (get_term_meta($term->term_id, '_themename_page_field', true) && get_term_meta($term->term_id, '_themename_page_field', true) == $page_id) {
      return $term->term_id;
    }
  }
}

// add_action('pre_get_posts','myf88');
// function myf88($query) {

//   $term_id = _themename_get_term_page_connection($query);

//   if ( !is_admin() && $query->is_main_query() &&  $query->is_page && $term_id  && $term_id != '')   {
//     $query->set( 'post_type', 'post' );
//     $query->set( 'numberposts', -1 );
//     print_r($query);

//   }
// }




?>