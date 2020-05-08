<?php $column_layout = 12/( count(_themename_footer_widget_sidebars()) + 1); 
$email = get_theme_mod( '_themename_info_email', '');
?>
<div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo $column_layout ?>@medium c-footer__info-container">
        <div class="o-row">
            <div class="o-row__column o-row__column--span-12">
            Logo (from customizer)
            </div>
            <?php if( has_nav_menu('soc-menu') ){ ?>
            <div class="o-row__column o-row__column--span-12 u-flex">
            <span class="c-footer__soc">Читать в соцсетях: </span><?php get_template_part( 'template-parts/navigation/soc_navigation' ); ?>
            </div>   
            <?php } ?>     
            <?php if($email){ ?>
            <div class="o-row__column o-row__column--span-12">
                <div class="o-row">
                    <div class="o-row__column o-row__column--span-12">   
                        <div class="c-footer__redation-title"> Редакция: </div>
                    </div>
                    <div class="o-row__column o-row__column--span-12">           
                        <div class="c-footer__redation-email"> <?php echo esc_html($email);?> </div>
                    </div>
                </div>  
            </div> 
            <?php } ?>
        </div>

</div>