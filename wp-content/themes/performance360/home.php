<?php get_header(); ?>
<div class="o-container u-margin-top-30  u-margin-bottom-40">
    <div class="o-row">
    <div class="o-row__column o-row__column--span-12 o-row__column--span-12@small o-row__column--span-12@mobile o-row__column--span-<?php echo is_active_sidebar('primary-sidebar') ? '8' : '12' ?>@medium" >   
             <main role="main">
                <?php get_template_part( 'loop', 'index'); ?>
            </main>
        </div>
        <?php if ( is_active_sidebar('primary-sidebar') ) { ?>
        <div class="o-row__column o-row__column--span-12 o-row__column--span-12@small o-row__column--span-12@mobile o-row__column--span-4@medium">  
        <?php if ( is_active_sidebar('primary-sidebar') ) { ?>
            <?php get_sidebar(); ?>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>

<?php $slider_id = get_theme_mod( '_themename_slider_cat_id', ''); ?>
<?php $cat = get_category($slider_id) ?>
<?php $slider_query = new WP_Query(array( 'cat' => $slider_id )); ?>
<?php if ( $slider_query->have_posts() ) { ?>
    <div class="slider-container">
        <div class="slider-name"><?php echo $cat->name; ?></div>
        <div class="owl-carousel owl-theme js_slider-carousel">
            <?php while ($slider_query->have_posts() ) { ?>
                <?php $slider_query->the_post(); ?>
                <?php get_template_part( 'template-parts/post/content', 'slider'); ?>
            <?php } ?> 
        </div>      
            <?php// the_posts_pagination(); ?>
        <?php } else { ?>
            <?php get_template_part( 'template-parts/post/content-none'); ?>
        <?php } ?>
    </div>
<?php get_footer(); ?>