<div class="o-row__column--span-6 o-row_column-masonry o-row__column--span-12@small o-row__column--span-6@mobile o-row__column--span-6@medium">
    <article <?php post_class( 'c-post c-post_masonry u-margin-bottom-10' ); ?>>
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