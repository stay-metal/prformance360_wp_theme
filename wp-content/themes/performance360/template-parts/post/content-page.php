<?php  $term_id = _themename_get_term_page_connection($wp_query); 
if ($term_id && $term_id!='') { 
    $post_class = 'c-post-term'; }
    else {
    $post_class = 'c-post-term'; 
    }
    $post_class =  $post_class.' c-post u-margin-bottom-20  u-flex u-flex-direction-row';
?>
<article <?php post_class( $post_class ); ?>>
        <?php if ( get_the_post_thumbnail() !== '' ) { ?> 
        <div class="c-post-term__thumbnail-container">
            <div class="c-post-term__thumbnail u-bg-image u-border-radius" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)">
            </div>
        </div>
        <?php } ?>
        <div class="c-post-term__content-container <?php echo (get_the_post_thumbnail() !== '') ? 'c-post-term__content-container_has-thumb' : '' ?> u-flex u-flex-direction-column">
            <?php _themename_post_meta(); ?>
            <h2 class="c-post-term__title">
                <a href="<?php the_permalink(); ?>" title = "<?php the_title_attribute(); ?>" ><?php the_title(); ?></a>
            </h2>
            <div class="c-post-term__excerpt">
                <?php the_excerpt() ?>
            </div>
        </div>
</article>