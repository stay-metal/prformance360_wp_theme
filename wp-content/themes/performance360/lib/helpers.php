<?php

function _themename_post_meta() {
    // $time_diff = human_time_diff( get_post_time('U'), current_time('timestamp') );
    echo '<div>';
    the_tags();
    echo  '</div>';
    echo  '<div>';
    echo  '<a href="'. esc_url( get_permalink() ) .'">';
    echo  '<time>' . esc_html( get_the_time() ) . '</time>';
    echo  '</a></div>';          
            
}



?>