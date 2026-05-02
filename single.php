<?php get_header(); ?>
<main class="site-main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header>
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="entry-meta">
                    <span><?php echo get_the_date(); ?></span> · <span><?php the_author(); ?></span> · <span><?php comments_number('暂无评论','1 条评论','% 条评论'); ?></span>
                </div>
            </header>
            <div class="entry-content"><?php the_content(); ?></div>
        </article>
        <?php
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
        ?>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
