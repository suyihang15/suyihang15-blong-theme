<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <div class="entry-meta">
            <span><?php echo get_the_date(); ?></span> · <span><?php the_author(); ?></span> · <span><?php comments_number( '暂无评论', '1 条评论', '% 条评论' ); ?></span>
        </div>
    </header>
    <div class="entry-content">
        <?php the_excerpt(); ?>
    </div>
    <div class="entry-footer">
        <a href="<?php the_permalink(); ?>"><?php esc_html_e( '阅读全文', 'suyihang15' ); ?></a>
        <span><?php esc_html_e( '分类：', 'suyihang15' ); ?><?php the_category( ', ' ); ?></span>
    </div>
</article>
