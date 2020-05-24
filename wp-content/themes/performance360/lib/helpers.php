<?php
function _themename_post_meta() { ?>
    <?php $hasTags = _themename_loop_tags() != ''; ?>
    <?php if (!$hasTags) $timeNoTagsClass = 'c-post__time--no-tags' ?>
    <div class="c-post__meta" >
        <?php if ($hasTags) { ?>
        <div class="c-post__tags u-align-middle">
            <?php echo _themename_loop_tags(); ?>
        </div>
        <?php } ?>
        <div class="c-post__time <?php echo $timeNoTagsClass; ?> u-flex u-align-middle">
            <?php  _themename_post_time(); ?>
        </div>
    </div>               
<?php } ?>

<?php
function _themename_post_meta_for_slider() { ?>
    <?php $tags = get_the_tags(); ?>
    <?php $color = get_term_meta( $tags[0]->term_id, '_themename_tag_color', true); ?>
    <?php $color = ( ! empty( $color ) ) ? "#{$color}" : '#007DFF'; ?>
    <div class="c-post__meta" >
        <div class="c-post__tags u-align-middle">
            <a href="<?php echo esc_url( get_tag_link( $tags[0]->term_id ) ); ?>" class="c-post__tags-link" style="color: <?php echo $color; ?>">
                <?php echo $tags[0]->name ?>
            </a>
        </div>
        <div class="c-post__time u-flex u-align-middle">
            <?php  _themename_post_time(); ?>
        </div>
    </div>               
<?php } ?>

<?php
function _themename_single_page_meta() { ?>
    <div class="c-post__meta" >
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