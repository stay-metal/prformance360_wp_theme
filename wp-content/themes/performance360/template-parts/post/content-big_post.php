
<div class="o-row">
    <div class="o-row__column o-row__column--span-12  u-margin-left-0 u-margin-right-0  u-padding-left-0 u-padding-right-0">
    <?php if ( get_the_post_thumbnail() !== '' ) { ?> <div class="u-bg-image u-border-radius" style="background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.6)), url(<?php echo get_the_post_thumbnail_url() ?>)"> <?php } ?>
            <article <?php post_class( 'c-post c-post-big u-margin-bottom-20 u-bg-color-primary-black' ); ?>>
                    <div class="c-post__meta c-post-big__meta">
                        <?php _themename_post_meta(); ?>
                    </div>
                    <h2 class="c-post__title c-post-big__title">
                        <a href="<?php the_permalink(); ?>" title = "<?php the_title_attribute(); ?>" ><?php the_title(); ?></a>
                    </h2>
                    <div class="c-post__excerpt c-post-big__excerpt">
                        <?php the_excerpt() ?>
                    </div>
            </article>
<?php if ( get_the_post_thumbnail() !== '' ) { ?></div> <?php } ?>
    </div>
</div>