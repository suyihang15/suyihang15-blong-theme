<?php
/**
 * Theme search form.
 *
 * This file is used by get_search_form() to display the search form in header.
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php _x( '搜索：', 'label', 'suyihang15' ); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( '搜索文章...', 'placeholder', 'suyihang15' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit"><?php echo esc_html_x( '搜索', 'submit button', 'suyihang15' ); ?></button>
</form>
