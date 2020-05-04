<?php get_header(); ?>

    <?php if ( have_posts() ) { ?>
        <?php while ( have_posts() ) { ?>
            <?php the_post(); ?>
            <h2>
                <a href="<?php the_permalink(); ?> "><?php the_title(); ?></a>
            </h2>
        <?php } ?> 
    <?php } else { ?>
        <p>Записи не найдены</p>
    <?php } ?>
 
<?php get_footer(); ?>