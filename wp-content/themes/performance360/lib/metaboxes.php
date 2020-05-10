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

global $post;
$main_post = get_post_meta($this_post->ID, '__themename_main_bg_post', true);
?>
<label for="_themename_main_post_id"><b> Основной пост: </b></label>
    <select name="_themename_main_post_id" id="_themename_main_post_id">
        <?php
        $args = array( 'numberposts' => -1);
        $posts = get_posts($args);
        foreach( $posts as $post ) : setup_postdata($post); ?>
            <option value="<?php echo $post->ID; ?>" <?php if ( $post->ID == $main_post) echo 'selected="selected"'; ?>><?php the_title(); ?></option>
        <?php endforeach; ?>
    </select>
</br>
<?php 
// Middle post 1 
$m_one_post = get_post_meta($this_post->ID, '__themename_middle_one_post', true); ?>
<label for="_themename_m_one_post_id"><b> Средний пост #1: </b></label>
    <select name="_themename_m_one_post_id" id="_themename_m_one_post_id">
        <?php
        $args = array( 'numberposts' => -1);
        $posts = get_posts($args);
        foreach( $posts as $post ) : setup_postdata($post); ?>
            <option value="<?php echo $post->ID; ?>" <?php if ( $post->ID == $m_one_post) echo 'selected="selected"'; ?>><?php the_title(); ?></option>
        <?php endforeach; ?>
    </select>
    </br>
    <?php 
// Middle post 2 
$m_two_post = get_post_meta($this_post->ID, '__themename_middle_two_post', true); ?>
<label for="_themename_m_two_post_id"><b> Средний пост #2: </b></label>
    <select name="_themename_m_two_post_id" id="_themename_m_two_post_id">
        <?php
        $args = array( 'numberposts' => -1);
        $posts = get_posts($args);
        foreach( $posts as $post ) : setup_postdata($post); ?>
            <option value="<?php echo $post->ID; ?>" <?php if ( $post->ID == $m_two_post) echo 'selected="selected"'; ?>><?php the_title(); ?></option>
        <?php endforeach; ?>
    </select>   

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