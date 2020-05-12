
<div class="o-row">
    <div class="o-row__column o-row__column--span-12">
        <article <?php post_class( 'c-post u-margin-bottom-20' ); ?>>
                <div class="c-post__meta">
                    <?php _themename_post_meta(); ?>
                </div>
                <h2 class="c-post__title">
                    <a href="<?php the_permalink(); ?>" title = "<?php the_title_attribute(); ?>" ><?php the_title(); ?></a>
                </h2>
                <div class="c-post__excerpt">
                    <?php the_excerpt() ?>
                </div>
        </article>
    </div>
</div>