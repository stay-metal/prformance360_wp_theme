<?php if ( is_home() ) { ?> 
    <div class="o-container">
    <?php do_action( '_themename_before_loop_start'); ?>
</div>
<?php }?>
<?php 
if ( have_posts() ) { ?>

    <div class="o-container">
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