<form role="search" method="get" class="c-search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
<button class="c-search-form__button" type="submit"><span class="u-screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', '_themename' ); ?></span><i class="fas fa-search" aria-hidden="true"></i></button>
    <label class="c-search-form__label">
        <input type="search" class="c-search-form__field" placeholder="<?php echo esc_attr_x( 'Поиск', 'placeholder', '_themename' ) ?>" value="<?php echo esc_attr(get_search_query()) ?>" name="s" />
    </label>
    
</form>