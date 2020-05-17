<?php

function _themename_post_meta() { ?>
    <div class="o-row c-post__meta" >
        <?php if(_themename_loop_tags() != '') { ?>
        <div class="c-post__tags u-align-middle">
            <?php echo _themename_loop_tags(); ?>
        </div>
        <?php } ?>
        <div class="c-post__time u-flex u-align-middle">
            <?php  _themename_post_time(); ?>
        </div>
    </div>               
<?php } ?>
<?php
function _themename_single_page_meta() { ?>
    <div class="o-row c-post__meta" >
        <?php if(_themename_single_page_cats() != '') { ?>
        <div class="c-post__tags u-align-middle">
            <?php echo _themename_single_page_cats(); ?>
        </div>
        <?php } ?>
        <div class="c-post__time u-flex u-align-middle">
            <?php  _themename_post_time(); ?>
        </div>
    </div>               
<?php } ?>