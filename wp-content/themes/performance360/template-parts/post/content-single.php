<article <?php post_class( 'c-post c-post-single' ); ?>>
    <div class="c-post__inner c-post-single__inner">
        <header class="c-post__header c-post-single__header">

            <?php _themename_single_page_meta(); ?>

            <h1 class="c-post__title c-post-single__title">
                <a href="<?php the_permalink(); ?>" title = "<?php the_title_attribute(); ?>" ><?php the_title(); ?></a>
            </h1>          
        </header>

        <?php if ( get_the_post_thumbnail() !== '' ) { ?>
            <div class="c-post__thumbnail c-post-single__thumbnail">
                <div class="c-post-single__thumbnail-border-radius">
                    <?php the_post_thumbnail( '_themename-single-thumb' ); ?>
                </div>
            </div>
        <?php } ?>
        <?php if (has_excerpt()) { ?>
        <div class="c-post__excerpt c-post-single__excerpt">
            <?php the_excerpt() ?>
        </div>
        <?php } ?>

        <div class="c-post__content c-post-single__content">
            <?php the_content(); ?>
        </div>

        <footer class="c-post__footer c-post-single__footer">
            <div class="o-row">
                <div class="o-row__column o-row__column--span-12 o-row__column--span-12@medium o-row__column--span-12@mobile u-margin-left-0 u-margin-right-0 u-padding-right-0 u-padding-left-0">
                        <?php 
                            if (has_category()) { 
                                get_the_category_list( ', ');
                            } ?>
                        <div class="c-post__tags c-post-single__tags">
                            <?php 
                                if (has_tag()) { 
                                _themename_single_tags();
                                } ?>
                         </div>
                    </div>
            </div>
        </footer>


    </div>    
</article>