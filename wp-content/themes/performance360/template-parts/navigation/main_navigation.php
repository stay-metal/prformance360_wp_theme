<div class="u-bg-color-light-blue">
    <div class="o-container u-flex u-align-justify js_main-nav" >
        <nav class="c-main-navigation c-main-navigation--desktop">
            <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
        </nav>
        <div class="c-main-navigation__search-form u-align-middle">
            <?php get_search_form(); ?>
        </div>
        <li style="display: none;" class="menu-item js_more-element"><a onclick="return false;">Еще <i class="fas fa-chevron-down"></i></a></li>
    </div>
    <div class="o-container u-flex u-align-justify mobile-menu-top" >
        <nav class="c-main-navigation--mobile">
            <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
        </nav>
    </div>
</div>