<?php get_header(); ?>

    <?php if ( have_posts() ) { ?>
        <?php while ( have_posts() ) { ?>
            <?php the_post(); ?>
             <div> 
                <?php the_tags(); ?>
            </div>
            <div> 
                <a href="<?php echo get_permalink() ?>">
                    <?php $time_diff = human_time_diff( get_post_time('U'), current_time('timestamp') ); ?>
                    <time><?php the_time(); ?></time>
                </a>
            </div>
            <h2>
                <a href="<?php the_permalink(); ?>" title = "<?php the_title_attribute(); ?>" ><?php the_title(); ?></a>
            </h2>

        <?php } ?> 
    <?php } else { ?>
        <p>Записи не найдены</p>
    <?php } ?>
 
<?php get_footer(); ?>