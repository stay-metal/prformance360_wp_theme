<?php get_header(); ?>
<div class="o-container u-margin-top-30  u-margin-bottom-40 u-padding-right-0">
    <div class="o-row">
         <div class="o-row__column o-row__column--span-12 o-row__column--span-12@small o-row__column--span-<?php echo is_active_sidebar('primary-sidebar') ? '8' : '12' ?>@mobile o-row__column--span-<?php echo is_active_sidebar('primary-sidebar') ? '8' : '12' ?>@medium u-padding-left-0 u-margin-left-0" >  
             <main role="main">
                <?php get_template_part( 'loop', 'single'); ?>
            </main>
        </div>
        <div class="o-row__column o-row__column--span-12 o-row__column--span-12@small o-row__column--span-<?php echo is_active_sidebar('primary-sidebar') ? '4' : '12' ?>@mobile o-row__column--span-4@medium">  
        <?php if ( is_active_sidebar('primary-sidebar') ) { ?>
            <?php get_sidebar(); ?>
        <?php } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>