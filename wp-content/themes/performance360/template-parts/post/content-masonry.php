<div class="o-row__column--span-6 o-row_column-masonry o-row__column--span-12@small o-row__column--span-6@mobile o-row__column--span-6@medium">
    <article <?php post_class( 'c-post c-post_masonry u-margin-bottom-10' ); ?>>
            <div class="c-post__meta c-post-masonry__meta">
            <?php _themename_post_meta(); ?>    
            </div>
            <h2 class="c-post__title c-post-masonry__title <?php echo ( get_the_post_thumbnail() !== '' ) ? 'c-post-masonry__title-thumb' : 'c-post-masonry__title-thumb-no'?>">
                <a href="<?php the_permalink(); ?>" title = "<?php the_title_attribute(); ?>" ><?php the_title(); ?></a>
            </h2>
            <?php if ( get_the_post_thumbnail() !== '' ) { ?>
            <div class="c-post__thumbnail c-post-masonry__thumbnail">
                <div class="u-fadeout-5">
                <a href="<?php the_permalink(); ?>" title = "<?php the_title_attribute(); ?>" ><?php the_post_thumbnail('_themename-main-loop-thumb'); ?></a>
                </div>
            </div>
        <?php } ?>
           
    </article>
</div>