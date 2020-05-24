<?php get_header(); ?>
<div class="o-container u-margin-top-30  u-margin-bottom-40 u-padding-right-0">
    <div class="o-row">
    <div class="o-row__column o-row__column--span-12 o-row__column--span-12@small o-row__column--span-12@mobile o-row__column--span-<?php echo is_active_sidebar('primary-sidebar') ? '8' : '12' ?>@medium" > 
             <main role="main">
                <?php get_template_part( 'loop', 'single'); ?>
                <?php  get_template_part( 'template-parts/single/loop', 'related'); ?>
                <?php 
                if (comments_open() || get_comments_number()) {
                comments_template(); 
                }
                ?>
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
<?php get_footer(); ?>