<?php 
function _themename_add_meta_box() {
    global $post;
   
    if ($post->ID == get_option( 'page_for_posts' ) ) {
    add_meta_box( '_themename_post_metabox', 
    'Главные материалы', 
    '_themename_main_bg_md_posts', 
    'page',
    'normal', 
    'default'
    );
}
}

add_action( 'add_meta_boxes', '_themename_add_meta_box' );

function _themename_main_bg_md_posts($this_post){

//Big Post
$main_post = get_post_meta($this_post->ID, '__themename_main_bg_post', true);
if (!$main_post || $main_post == '') $main_post = 0; 
?>
<label for="_themename_main_post_id"><b> Основной пост: </b></label>
<?php     $dropdown_args = array(
    'depth'            => 0,
    'post_type'        => 'post',
    'name'             => '_themename_page_field',
    'selected'         => $main_post,
    'show_option_none' => 'Нет',
    'sort_column'      => 'menu_order, post_title',
    'value_field'      => 'ID',
    'echo'             => 1,
);
wp_dropdown_pages( $dropdown_args );

?>
</br>
<?php 
// Middle post 1 
$m_one_post = get_post_meta($this_post->ID, '__themename_middle_one_post', true); 
if (!$m_one_post || $m_one_post  == '') $m_one_post  = 0; 
?>
<label for="_themename_m_one_post_id"><b> Средний пост #1: </b></label>
<?php   $dropdown_args_m_one = array(
    'depth'            => 0,
    'post_type'        => 'post',
    'name'             => '_themename_m_one_post_id',
    'selected'         => $m_one_post ,
    'show_option_none' => 'Нет',
    'sort_column'      => 'menu_order, post_title',
    'value_field'      => 'ID',
    'echo'             => 1,
);

wp_dropdown_pages( $dropdown_args_m_one );
?>

</br>
<?php 
// Middle post 2 
$m_two_post = get_post_meta($this_post->ID, '__themename_middle_two_post', true); 
if (!$m_two_post || $m_two_post  == '') $m_two_post  = 0; 
?>
<label for="_themename_m_two_post_id"><b> Средний пост #2: </b></label>
<?php   $dropdown_args_m_two = array(
    'depth'            => 0,
    'post_type'        => 'post',
    'name'             => '_themename_m_two_post_id',
    'selected'         => $m_two_post ,
    'show_option_none' => 'Нет',
    'sort_column'      => 'menu_order, post_title',
    'value_field'      => 'ID',
    'echo'             => 1,
);

wp_dropdown_pages( $dropdown_args_m_two );
?>
    <?php
    }
    ?>
<?php function _themename_save_post_metabox($post_id, $post) {
    if( isset ( $_POST['_themename_main_post_id'] ) ) {
        update_post_meta( $post_id, 
        '__themename_main_bg_post', 
        $_POST['_themename_main_post_id'] 
        );
    }
    if( isset ( $_POST['_themename_m_one_post_id'] ) ) {
        update_post_meta( $post_id, 
        '__themename_middle_one_post', 
        $_POST['_themename_m_one_post_id'] 
        );      
    }
    if( isset ( $_POST['_themename_m_two_post_id'] ) ) {
        update_post_meta( $post_id, 
        '__themename_middle_two_post', 
        $_POST['_themename_m_two_post_id'] 
        );    
    }
}
?>
<?php add_action( 'save_post', '_themename_save_post_metabox', 10, 2 ); ?>

