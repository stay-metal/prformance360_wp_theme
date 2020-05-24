<?php if ( is_home() ) { ?> 
    <?php do_action( '_themename_before_loop_start'); ?>
<?php }?>
<?php 
    $big_post_field = get_post_meta( get_option( 'page_for_posts' ));
    $md_post_field = get_post_meta( get_option( 'page_for_posts' ));
    $the_query = new WP_Query( array( 'post__not_in' => array($md_post_field['__themename_middle_one_post'][0],$md_post_field['__themename_middle_two_post'][0],$big_post_field['__themename_main_bg_post'][0] ) ) );
    
if ( $the_query->have_posts() ) { ?>

    <div class="o-container o-container_masonry" >

        <?php while ($the_query->have_posts() ) { ?>
            <?php $the_query->the_post(); ?>
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