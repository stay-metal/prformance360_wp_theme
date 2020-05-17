<?php 
 $term_id = _themename_get_term_page_connection($wp_query);
if ($term_id && $term_id != '') {
    $args = array(
        'post_type' => 'post',
        'tag__in' =>  $term_id,
        'paged' => 1,
        'posts_per_page' => 1,

    );  
    $custom_query = new WP_Query( $args );
    
}
?>

<?php
if ( $custom_query -> have_posts() ) { ?>

    <div class="o-container o-container__page-loop">
        <?php while ($custom_query -> have_posts() ) { ?>
            <?php $custom_query -> the_post(); ?>
            <?php if ($custom_query) { ?>
                <?php get_template_part( 'template-parts/post/content', 'page'); ?>
            <?php } else { ?>
                <?php get_template_part( 'template-parts/post/content', 'single'); ?>
            <?php } ?>
            
        <?php } ?> 
        

    </div>
    <?php // LAZY LOAD
        if (  $custom_query->max_num_pages > 1 )
        echo '<button class="c-load-more__button-tags">Загрузить еще</button>';
    ?>       
<script>
var posts_tagPage = '<?php echo json_encode( $custom_query->query_vars ) ?>',
current_page_tagPage = <?php echo $custom_query->query_vars['paged'] ?>,
max_page_tagPage = <?php echo $custom_query->max_num_pages ?>
</script>
    <?php } else { ?>
        <?php get_template_part( 'template-parts/post/content-none'); ?>
    <?php } ?>