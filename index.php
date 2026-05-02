<?php get_header(); ?>
<?php if ( is_front_page() ) : ?>
    <?php get_template_part( 'template-parts/homepage', 'profile' ); ?>
<?php endif; ?>
<main class="site-main">
    <?php get_template_part( 'template-parts/post-list' ); ?>
</main>
<?php get_footer(); ?>