<?php
/**
 * Front page template.
 *
 * If the site is set to display latest posts or a static page, this template
 * ensures posts are still displayed with the blog list and links to single posts.
 */
get_header(); ?>
<?php if ( is_front_page() ) : ?>
    <?php get_template_part( 'template-parts/homepage', 'profile' ); ?>
<?php endif; ?>
<?php
$paged = max( 1, get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' ) );
if ( is_front_page() && ! is_home() ) {
    $posts_query = new WP_Query( array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => get_option( 'posts_per_page', 10 ),
        'paged'          => $paged,
    ) );
} else {
    global $wp_query;
    $posts_query = $wp_query;
}
?>
<main class="site-main">
    <?php get_template_part( 'template-parts/post-list', null, array( 'query' => $posts_query ) ); ?>
</main>
<?php if ( isset( $posts_query ) && $posts_query instanceof WP_Query && $posts_query !== $wp_query ) : ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php get_footer(); ?>