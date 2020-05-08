<div class="o-row__column--span-6 o-row_column-masonry">
    <article <?php post_class( 'c-post c-post_masonry u-margin-bottom-20' ); ?>>
            <?php _themename_post_meta(); ?>          
            <h2>
                <a href="<?php the_permalink(); ?>" title = "<?php the_title_attribute(); ?>" ><?php the_title(); ?></a>
            </h2>
            <?php the_post_thumbnail('large'); ?>
            <div>
                <?php //the_excerpt() ?>
            </div>
    </article>
</div>