<?php get_header(); ?>
<?php  $term_id = _themename_get_term_page_connection($wp_query); ?>

<div class="o-container u-margin-top-30@medium  u-margin-bottom-40">
    <div class="o-row">
         <div class="o-row__column o-row__column--span-12 o-row__column--span-12@small o-row__column--span-12@mobile o-row__column--span-<?php echo is_active_sidebar('primary-sidebar') ? '8' : '12' ?>@medium" >  
             <main role="main">
                <?php get_template_part( 'loop', 'page'); ?>
            </main>
        </div>
        <?php if ( is_active_sidebar('primary-sidebar') ) { ?>
        <div class="o-row__column o-row__column--span-12 o-row__column--span-12@small o-row__column--span-12@mobile o-row__column--span-4@medium <?php echo ( $term_id ) ?'c-term-page-sidebar' : ''  ?>">  
        <?php if ( is_active_sidebar('primary-sidebar') ) { ?>
            <?php get_sidebar(); ?>
                    <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>
<?php get_footer(); ?>