<?php 
 $term_id = _themename_get_term_page_connection($wp_query);
if ($term_id && $term_id != '') {
    $args = array(
        'post_type' => 'post',
        'tag__in' =>  $term_id
    );  
    $custom_query = new WP_Query( $args );
    $wp_query = $custom_query;
}
if ( have_posts() ) { ?>

    <div class="o-container">
        <?php while (have_posts() ) { ?>
            <?php the_post(); ?>
            <?php if ($custom_query) { ?>
                <?php get_template_part( 'template-parts/post/content', 'page'); ?>
            <?php } else { ?>
                <?php get_template_part( 'template-parts/post/content', 'single'); ?>
            <?php } ?>
        <?php } ?> 
    </div>
    <?php // LAZY LOAD
        if (  $wp_query->max_num_pages > 1 )
        echo '<button class="c-load-more__button">Загрузить еще</button>';
    ?>       
        <?php// the_posts_pagination(); ?>
    <?php } else { ?>
        <?php get_template_part( 'template-parts/post/content-none'); ?>
    <?php } ?>