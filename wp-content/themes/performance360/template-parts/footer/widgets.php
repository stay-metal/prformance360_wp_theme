<?php $column_layout = 12/( count(_themename_footer_widget_sidebars()) + 1); ?>
<?php foreach (_themename_footer_widget_sidebars() as $footer_sidebar_id) { ?>
    <div class="o-row__column o-row__column--span-12  o-row__column--span-<?php echo $column_layout ?>@medium">
<?php if ( is_active_sidebar($footer_sidebar_id) ) { 
        dynamic_sidebar($footer_sidebar_id); 
        } ?>
</div>
<?php } ?>