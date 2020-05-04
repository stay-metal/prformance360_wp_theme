<?php

function _themename_post_meta() {
    // $time_diff = human_time_diff( get_post_time('U'), current_time('timestamp') );
    echo '<div>';
    the_tags();
    echo  '</div>';
    echo  '<div>';
    _themename_post_time();
    echo '</div>';                    
}

function _themename_post_time() {
    // $time_diff = human_time_diff( get_post_time('U'), current_time('timestamp') );
    echo  '<time>' . the_time() . '</time>';
    
}



?>