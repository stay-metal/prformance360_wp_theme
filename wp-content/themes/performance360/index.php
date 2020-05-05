<?php get_header(); ?>
<div class="o-container u-margin-top-30  u-margin-bottom-40">
    <div class="o-row">
         <div class="o-row__column o-row__column--span-12 o-row__column--span-8@medium">  
             <main role="main">
                <?php 
                do_action( '_themename_before_loop_start'); ?>
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
                    <?php the_posts_pagination(); ?>
                <?php } else { ?>
                    <p>Записи не найдены</p>
                <?php } ?>
            </main>
        </div>
        <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">  
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>