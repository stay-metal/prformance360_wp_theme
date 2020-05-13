<?php 
$footer_widgets = count(_themename_footer_widget_sidebars()) + 1;
// echo $footer_widgets;
$small= '12';
$mobile=$medium=$large=array('one'=>'','two'=>'','three'=>'','four'=>'');

if ($footer_widgets < 2) {
$mobile=$medium=$large=array('one'=>'12');
} else if ($footer_widgets == 2) {
    $mobile=$medium=$large=array('one'=>'6');
    } else if ($footer_widgets == 3) {
        $mobile=array('one'=>'12');
        $medium=$large=array('one'=>'4');
        } else if ($footer_widgets == 4) {
            $mobile=array('one'=>'6');
            $medium=$large=array('one'=>'3');
            }
$column_layout = 12/ $footer_widgets; 
$email = get_theme_mod( '_themename_info_email', '');
$footer_logo = get_theme_mod( '_themename_footer_logo', '');
?>
<div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo $small?>@small o-row__column--span-<?php echo $mobile['one']?>@mobile o-row__column--span-<?php echo $medium['one']?>@medium o-row__column--span-<?php echo $large['one'] ?>@large c-footer__info-container">
        <div class="o-row">
            <div class="o-row__column o-row__column--span-12">
            <img width="277" height="40" src="<?php echo $footer_logo; ?>" class="c-footer__info-logo" alt="performance360">                              
        </div>
            <?php if( has_nav_menu('soc-menu') ){ ?>
            <div class="o-row__column o-row__column--span-12 u-flex">
            <div class="c-footer__soc u-flex u-align-middle">Читать в соцсетях: </div><div class="c-footer__soc-menu"><?php get_template_part( 'template-parts/navigation/soc_navigation' ); ?></div>
            </div>   
            <?php } ?>     
            <?php if($email){ ?>
            <div class="o-row__column o-row__column--span-12">
                <div class="o-row">
                    <div class="o-row__column o-row__column--span-12">   
                        <div class="c-footer__editorial-title"> Редакция: </div>
                    </div>
                    <div class="o-row__column o-row__column--span-12">           
                        <div class="c-footer__editorial-email"> <?php echo esc_html($email);?> </div>
                    </div>
                </div>  
            </div> 
            <?php } ?>
        </div>

</div>