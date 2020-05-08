<?php if ( have_posts() ) { ?>
    <?php do_action( '_themename_before_loop_start'); ?>
    <?php while ( have_posts() ) { ?>
        <?php the_post(); ?>
        <?php get_template_part( 'template-parts/post/content'); ?>
    <?php } ?> 
    <?php the_posts_pagination(); ?>
<?php } else { ?>
       <?php get_template_part( 'template-parts/post/content-none'); ?>
<?php } ?>
<?php if (  $wp_query->max_num_pages > 1 )
echo '<div class="c-load-more__button">Загрузить еще</div>';
?>