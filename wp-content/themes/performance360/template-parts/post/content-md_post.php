
    <div class="o-row__column o-row__column--span-12  o-row__column--span-6@medium">
        <article <?php post_class( 'c-post u-margin-bottom-20' ); ?>>
                <div class="c-post__meta">
                    <?php _themename_post_meta(); ?>
                </div>
                <h2 class="c-post__title">
                    <a href="<?php the_permalink(); ?>" title = "<?php the_title_attribute(); ?>" ><?php the_title(); ?></a>
                </h2>
        </article>
    </div>