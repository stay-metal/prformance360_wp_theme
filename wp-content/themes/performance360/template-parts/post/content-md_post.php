
 <div class="o-row__column o-row__column--span-12  o-row__column--span-6@medium">
<?php if ( get_the_post_thumbnail() !== '' ) { ?><div class="u-bg-image u-border-radius" style="background-image: linear-gradient(rgba(0,0,0,.4), rgba(0,0,0,.5)), url(<?php echo get_the_post_thumbnail_url() ?>)"> <?php } ?>
        <article <?php post_class( 'c-post c-post-medium u-margin-bottom-20 u-bg-color-secondary-blue' ); ?>>
                <div class="c-post__meta c-post-medium__meta">
                    <?php _themename_post_meta(); ?>
                </div>
                <h2 class="c-post__title c-post-medium__title">
                    <a href="<?php the_permalink(); ?>" title = "<?php the_title_attribute(); ?>" ><?php the_title(); ?></a>
                </h2>
        </article>
        <?php if ( get_the_post_thumbnail() !== '' ) { ?>  </div>  <?php } ?>  
</div>