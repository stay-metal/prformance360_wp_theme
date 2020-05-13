<article <?php post_class( 'c-post' ); ?>>
    <div class="c-post__inner">
        <header class="c-post__header">

            <?php _themename_post_meta(); ?>

            <h1 class="c-post__title">
                <a href="<?php the_permalink(); ?>" title = "<?php the_title_attribute(); ?>" ><?php the_title(); ?></a>
            </h1>          
        </header>

        <?php if ( get_the_post_thumbnail() !== '' ) { ?>
            <div class="c-post__thumbnail">
                <?php the_post_thumbnail( 'large' ); ?>
            </div>
        <?php } ?>

        <div class="c-post__excerpt">
            <?php the_excerpt() ?>
        </div>

        <div class="c-post__content">
            <?php the_content(); ?>
        </div>

        <footer class="c-post__footer">
            <?php 
                if (has_category()) { 
                    get_the_category_list( ', ');
                } ?>
            <div class="c-post__tags-single">
            <?php 
                if (has_tag()) { 
                //    $tags_list = get_the_tag_list( '#',' #','');
                   $tags_list = get_the_tag_list('<ul><li>','</li><li>','</li></ul>');
                   echo $tags_list;
                } ?>
            </div>
        </footer>


    </div>    
</article>