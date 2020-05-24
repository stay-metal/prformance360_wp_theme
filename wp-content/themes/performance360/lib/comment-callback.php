<?php
    function _themename_comment_callback ($comment, $args, $depth) {
        ?>
        <li id="comment-<?php comment_ID(); ?>" <?php comment_class('c-comment', $comment->comment_parent ? 'c-comment_child' : '') ?> >
            <article class="c-comment-body"> 
                <?php echo get_avatar($comment, 50, false, false,  array('class'=>'c-comments__avatar')); ?>
            <div class="c-somments__content">
                <div class="c-somments__author">
                </div>
                <?php edit_comment_link('Редактировать', '<span class ="c-comments__edit-link">','</span>'); ?>
                <time datetime="<?php comment_time('c')?>">
                <?php echo human_time_diff(get_comment_time('U'), current_time('U')).' назад';?>
                <time>
            </div>
            <article>

            </time></a>
        </li>

<?php
        // echo '<pre>';
        //     var_dump($comment);
        // echo '</pre>';
    }
?>