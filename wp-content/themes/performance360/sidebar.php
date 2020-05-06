<?php $sidebar_bg = "c-sidebar__bg-color"; ?>
<aside role="complementary" class="<?php echo $sidebar_bg; ?>">
<?php if ( is_active_sidebar('primary-sidebar') ) { ?>
    <?php dynamic_sidebar('primary-sidebar'); ?>
<?php } ?>
</aside>