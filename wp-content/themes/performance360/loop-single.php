<?php if ( is_home() ) { ?> 
    <div class="o-container">
    <?php do_action( '_themename_before_loop_start'); ?>
</div>
<?php }?>
<?php 
if ( have_posts() ) { ?>
    <div class="o-container">
        <?php while (have_posts() ) { ?>
            <?php setPostViews(get_the_ID()); ?>
            <?php the_post(); ?>
            <?php get_template_part( 'template-parts/post/content', 'single'); ?>
        <?php } ?> 
    </div>    
    <?php } else { ?>
        <?php get_template_part( 'template-parts/post/content-none'); ?>
    <?php } ?>