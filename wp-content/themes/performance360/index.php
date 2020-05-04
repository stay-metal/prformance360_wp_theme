<?php get_header(); ?>

    <?php if ( have_posts() ) { ?>
        <?php while ( have_posts() ) { ?>
            <?php the_post(); ?>
            <?php _themename_post_meta(); ?>
            <h2>
                <a href="<?php the_permalink(); ?>" title = "<?php the_title_attribute(); ?>" ><?php the_title(); ?></a>
            </h2>
            <div>
                <?php the_excerpt() ?>
            </div>
        <?php } ?> 
    <?php } else { ?>
        <p>Записи не найдены</p>
    <?php } ?>
 
<?php get_footer(); ?>