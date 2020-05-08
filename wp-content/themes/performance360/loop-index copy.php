<?php if ( have_posts() ) { ?>    
    <?php do_action( '_themename_before_loop_start'); ?>
    <?php $post_number = 1; ?>
        <div class="o-row">
             <?php while ( have_posts() ) { ?>
                <?php the_post(); ?>
                    <div class="o-row__column o-row__column--span-12 o-row__column--span-6@medium">  
                        <?php get_template_part( 'template-parts/post/content'); ?>
                    </div>
        <?php if ( $post_number % 2 != 0 && $post_number == $wp_query->post_count) { ?>
        </div> 
         <?php } ?>
                     <?php if ( $post_number % 2 == 0 ) { ?>
                         <?php if ($post_number != $wp_query->post_count ) { ?>               
                    </div>
                    <div class="o-row">   
         <?php } else if ($post_number == $wp_query->post_count) { ?>
        </div>   
        <?php }?>
                    <?php }?>
        <?php $post_number++ ?>
            <?php } ?>
<?php // LAZY LOAD
if (  $wp_query->max_num_pages > 1 )
echo '<div class="c-load-more__button">Загрузить еще</div>';
?>
<?php the_posts_pagination(); ?>
<?php } else { ?>
       <?php get_template_part( 'template-parts/post/content-none'); ?>
<?php } ?>