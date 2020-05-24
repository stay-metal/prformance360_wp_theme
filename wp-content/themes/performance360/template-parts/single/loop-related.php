<?php
$the_query = _themname_get_related_posts( get_the_ID(), 4); ?>
<?php if ( isset($the_query) && !empty($the_query) ) { ?>
<div class="c-post-single__related-container"> 
    <div class="c-post-single__related-header"> 
        <h3 class="c-post-single__related-header-title">Читайте также</h3>
    </div>
    <div class="c-post-single__related-content u-flex u-flex-direction-row u-flex-wrap"> 
        <?php if ( $the_query -> have_posts() ) { ?>
            <?php while ( $the_query->have_posts() ) { ?>
                <?php $the_query->the_post(); ?>
                <article <?php post_class( 'c-post__related' ); ?>>
                <?php _themename_post_meta(); ?>
                <h2 class="c-post__related-title">
                    <a href="<?php the_permalink(); ?>" title = "<?php the_title_attribute(); ?>" ><?php the_title(); ?></a>
                </h2>
                </article>
            <?php } ?> 
        <?php } ?>
    </div>
</div>
<?php } ?>
<?php wp_reset_postdata();?>
