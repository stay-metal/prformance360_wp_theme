<?php 
wp_reset_query();
 $term_id = _themename_get_term_page_connection($wp_query);
if ($term_id && $term_id != '') {
    $args = array(
        'post_type' => 'post',
        // 'tag__in' =>  $term_id,
        'posts_per_page' => -1,

    );  
    $custom_query = new WP_Query( $args );
    $wp_query = $custom_query;
}
if ( have_posts() ) { ?>

    <div class="o-container">
        <?php while (have_posts() ) { ?>
            <?php the_post(); ?>
            <?php if ($custom_query) { ?>
                <?php get_template_part( 'template-parts/post/content', 'page'); ?>
            <?php } else { ?>
                <?php get_template_part( 'template-parts/post/content', 'single'); ?>
            <?php } ?>
        <?php } ?> 
    </div>
    <?php // LAZY LOAD
        if (  $wp_query->max_num_pages > 1 )
        echo '<button class="c-load-more__button">Загрузить еще</button>';
    ?>       

    <?php } else { ?>
        <?php get_template_part( 'template-parts/post/content-none'); ?>
    <?php } ?>

    <div id="ajax-posts" class="row">
        <?php
            $postsPerPage = 3;
            $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => $postsPerPage,
            );

            $loop = new WP_Query($args);

            while ($loop->have_posts()) : $loop->the_post();
        ?>

         <div class="small-12 large-4 columns">
                <h1><?php the_title(); ?></h1>
                <p><?php the_content(); ?></p>
         </div>

         <?php
                endwhile;
        wp_reset_postdata();
         ?>
    </div>
    <div id="more_posts">Load More</div>