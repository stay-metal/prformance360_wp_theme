
<?php $term_id_field = get_post_meta(get_the_ID()); 
if (!empty($term_id_field['__themename_relate_tag_id']))
$term_id_field = $term_id_field['__themename_relate_tag_id'][0];
if ($term_id_field && $term_id_field!='') {
    $term_id = $term_id_field;
} else {
    $term_id = _themename_get_term_page_connection($wp_query); 
}
if ($term_id && $term_id != '') {
    $args = array(
        'post_type' => 'post',
        'tag__in' =>  $term_id,
        'paged' => 1,
        'posts_per_page' => 3,

    );  
    $custom_query = new WP_Query( $args );
    
}
?>

<?php
if ($term_id && $term_id != '') { ?>
    <header class="c-term-page-header u-flex u-flex-direction-row ">
            <h1 class="c-term-page-header__title"> <?php echo get_the_title() ?> </h1>
            <div class="c-term-page-header__line"></div>
     </header> 
<?php if ( $custom_query -> have_posts() ) {  ?>

    <div class="o-container o-container__page-loop u-margin-left-0 u-margin-right-0 u-padding-left-0 u-padding-right-0">
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
        ?>
        <div class="o-row__column o-row__column--span-12 u-align-center u-flex" > 
         <?php echo '<button class="c-load-more__button-tags">Загрузить еще</button>'; ?>
        </div>      
<script>
var posts_tagPage = '<?php echo json_encode( $custom_query->query_vars ) ?>',
current_page_tagPage = <?php echo $custom_query->query_vars['paged'] ?>,
max_page_tagPage = <?php echo $custom_query->max_num_pages ?>
</script>

    <?php } else { ?>
        <?php get_template_part( 'template-parts/post/content-none'); ?>
    <?php } ?>
    <?php } else {?>    
        <?php if (  have_posts() ) {  ?>

    <div class="o-container o-container__page-loop">
        <?php while (have_posts() ) { ?>
            <?php the_post(); ?>
                <?php get_template_part( 'template-parts/post/content', 'single'); ?>
        <?php } ?> 
    </div>      

    <?php } else { ?>
        <?php get_template_part( 'template-parts/post/content-none'); ?>
    <?php } ?>
        
    <?php } ?>