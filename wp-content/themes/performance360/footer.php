<footer>
<?php 
$column_layout = 12/_themename_footer_widget_column_count();
// echo $column_count; 
?>
    <div class="c-footer">
        <div class="o-container">
            <div class="o-row">
                <div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo $column_layout ?>@medium c-footer__info-container">
                COMPANY INFO
                </div>
                <?php for ($i = _themename_footer_widget_column_count(); $i != 1; $i--) { ?>
                 <div class="o-row__column o-row__column--span-12  o-row__column--span-<?php echo $column_layout ?>@medium">
                <?php
                $sidebar_id = 'footer-sidebar-'.((_themename_footer_widget_column_count() - $i)+1);
                ?>
                <?php if ( is_active_sidebar($sidebar_id) ) { 
                        dynamic_sidebar($sidebar_id); 
                      } ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</footer>

        <?php wp_footer();?>
    </body>
</html>