<?php
if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="c-comments">
        <h2 class="c-comments__title">
            <?php
            printf(
                    _n(
                    '<b class="c-comments__title_number-one">%1$s</b> комментарий',
                    'Комментарии <b <b class="c-comments__title_number-many">%1$s</b>',
                    get_comments_number(),
                    '_themename'
                ),
                number_format_i18n(get_comments_number()),
            );
            ?> 
        </h2>
        <?php _themename_comment_form(); ?>
        <ul class="c-comments__list">
            <?php wp_list_comments( array(
                'avatar_size' => 50,
                'reply_text' => 'Ответить',
                'callback' => '_themename_comment_callback'
            )
            ); ?>
        </ul>
        <?php the_comments_pagination() ?>
</div>