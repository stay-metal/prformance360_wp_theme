<?php
    function _themename_comment_callback ($comment, $args, $depth) {
        ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(['c-comment', $comment->comment_parent ? 'c-comment_child' : '']); ?> >
            <article class="c-comment-body"> 
                <?php echo get_avatar($comment, 50, false, false,  array('class'=>'c-comment__avatar')); ?>
                <div class="c-comment__content">
                    <div class="c-comment__meta">
                        <div class="c-comment__author">
                        <?php echo get_comment_author( $comment ); ?>
                         </div>
                        <div class="c-comment__time">
                        <time datetime="<?php comment_time('c')?>">
                            <?php echo human_time_diff(get_comment_time('U'), current_time('U')).' назад';?>
                        <time>
                        </div>
                    </div>
                        <?php //edit_comment_link('Редактировать', '<span class ="c-comment__edit-link">','</span>'); ?>
                               
                    <div class="c-comment__text">
                        <?php comment_text();?>
                    </div>
                    <?php comment_reply_link(array(
                        'depth' => $depth,
                        'max_depth' => $args['max_depth']
                     ));?>
                </div>
             </article>

            </time></a>
        </li>

<?php
        // echo '<pre>';
        //     var_dump($comment);
        // echo '</pre>';
    }
?>