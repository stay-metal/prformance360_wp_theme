<?php 
$footer_widgets = count(_themename_footer_widget_sidebars()) + 1;
// echo $footer_widgets;
$small= '12';
$mobile=$medium=$large=array('1'=>'','2'=>'','3'=>'','4'=>'');

if ($footer_widgets < 2) {
    $mobile=$medium=$large=array('1'=>'12','2'=>'12','3'=>'12','4'=>'12');
    } else if ($footer_widgets == 2) {
        $mobile=array('1'=>'12','2'=>'12', '3'=>'12', '4'=>'');
       $medium=$large=array('1'=>'6','2'=>'6','3'=>'12', '4'=>'');
        } else if ($footer_widgets == 3) {
            $mobile=array('1'=>'12','2'=>'12','3'=>'12','4'=>'');
            $medium=$large=array('1'=>'4','2'=>'4','3'=>'4','4'=>'');
            } else if ($footer_widgets == 4) {
                $mobile=array('1'=>'12','2'=>'12','3'=>'12','4'=>'12');
                $medium=array('1'=>'4','2'=>'4','3'=>'4','4'=>'12');
                $large=array('1'=>'3','2'=>'3','3'=>'3','4'=>'3');
                }
$column_layout = 12/ $footer_widgets;  ?>
<?php $i = 2;?>
<?php foreach (_themename_footer_widget_sidebars() as $footer_sidebar_id) { 
    ?>
    <div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo $small?>@small o-row__column--span-<?php echo $mobile[$i]?>@mobile o-row__column--span-<?php echo $medium[ $i]?>@medium o-row__column--span-<?php echo $large[$i] ?>@large c-footer__info-container c-footer__<?php echo $footer_sidebar_id; ?>">
<?php if ( is_active_sidebar($footer_sidebar_id) ) { 
        dynamic_sidebar($footer_sidebar_id); 
        } ?>
</div>
<?php $i++?>
<?php } ?>