<?php get_header(); ?>
<main class="site-main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header>
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
            <div class="entry-content"><?php the_content(); ?></div>
        </article>
        <?php if ( comments_open() || get_comments_number() ) {
            comments_template();
        } ?>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
