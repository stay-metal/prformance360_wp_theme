
<?php 
if ( have_posts() ) { ?>
<?php if ( is_home() ) { ?> 
    <?php do_action( '_themename_before_loop_start'); ?>
<?php }?>

    <div class="o-container o-container_masonry">
        <?php while (have_posts() ) { ?>
            <?php the_post(); ?>
            <?php get_template_part( 'template-parts/post/content', 'masonry'); ?>
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