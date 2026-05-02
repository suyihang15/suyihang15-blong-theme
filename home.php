<?php
/**
 * Blog posts index template.
 *
 * This template is used for the blog posts page and the latest posts homepage.
 */
get_header(); ?>
<main class="site-main">
    <?php get_template_part( 'template-parts/post-list' ); ?>
</main>
<?php get_footer(); ?>