
<?php 
    
if ( have_posts() ) { ?>
     </header> 
     <div class="o-row__column o-row__column--span-12">
            <header class="c-term-page-header u-flex u-flex-direction-row ">
            <h1 class="c-search-page-header__title">   <?php
                        printf( esc_html__('Результаты поиска: %s', '_themename'), get_search_query() )
                    ?> </h1>
     </header> 
        </div>
    <div class="o-container o-container_masonry u-margin-left-0 u-margin-right-0  u-padding-left-0 u-padding-right-0" >

        <?php while (have_posts() ) { ?>
            <?php the_post(); ?>
            <?php get_template_part( 'template-parts/post/content', 'masonry'); ?>
        <?php } ?> 
    </div>
    <?php // LAZY LOAD
        if (  $wp_query->max_num_pages > 1 ) { ?>
       <div class="row">
         <div class="o-row__column o-row__column--span-12 u-align-center u-flex" > 
            <button class="c-load-more__button">Загрузить еще</button>
         </div>
       <div>
        <?php }?>       
    <?php } else { ?>
        <?php get_template_part( 'template-parts/post/content-none'); ?>
    <?php } ?>