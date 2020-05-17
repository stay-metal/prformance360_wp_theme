<header class="c-term-page-header u-flex u-flex-direction-row ">
            <h1 class="c-term-page-header__title"> <?php echo single_cat_title(); ?> </h1>
            <div class="c-term-page-header__line"></div>
     </header> 

        <?php if (  have_posts() ) {  ?>

    <div class="o-container o-container_cat o-container__page-loop">
        <?php while (have_posts() ) { ?>
            <?php the_post(); ?>
            <?php get_template_part( 'template-parts/post/content', 'page'); ?>
        <?php } ?> 
    </div>      
    <?php // LAZY LOAD
        if (  $wp_query->max_num_pages > 1 ) { ?>
       <div class="row">
         <div class="o-row__column o-row__column--span-12 u-align-center u-flex" > 
            <button class="c-load-more__button">Загрузить еще</button>
         </div>
       <div>  
        <?php } ?>
    <?php } else { ?>
        <?php get_template_part( 'template-parts/post/content-none'); ?>
    <?php } ?>
        