<?php $hasThumbnail = get_the_post_thumbnail() !== ''; ?>
<div class="carousel-slider-item">
    <?php if ($hasThumbnail) { ?>
        <div class="carousel-slider-item__imageholder">
            <a class="carousel-slider-item__image" href="<?php the_permalink(); ?>" title = "<?php the_title_attribute(); ?>" >
                <img src="<?php echo get_the_post_thumbnail_url() ?>" />
            </a>
        </div>
    <?php } ?>
    <?php if (!$hasThumbnail) { ?>
        <div class="carousel-slider-item__imageholder">
            <a class="carousel-slider-item__image" onclick="return false;">
                <img src="http://www.fillmurray.com/g/400/300" />
            </a>
        </div>
    <?php } ?>
    <div class="carousel-slider-item__meta"><?php _themename_post_meta(); ?></div>
    <a href="<?php the_permalink(); ?>" title = "<?php the_title_attribute(); ?>" >
        <div class="c-post__meta carousel-slider-item__title">
            <?php the_title(); ?>
        </div>
    </a>
</div>