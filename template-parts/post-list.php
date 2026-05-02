<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$query = isset( $args['query'] ) && $args['query'] instanceof WP_Query ? $args['query'] : $GLOBALS['wp_query'];
$paged = max( 1, get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' ) );
?>
<?php if ( is_search() ) : ?>
    <header class="archive-header">
        <h1 class="archive-title"><?php printf( __( '搜索结果：%s', 'suyihang15' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
    </header>
<?php endif; ?>

<?php if ( $query->have_posts() ) : ?>
    <div id="post-list">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <?php get_template_part( 'template-parts/content', 'post' ); ?>
        <?php endwhile; ?>
    </div>
    <?php if ( ! is_search() && $query->max_num_pages > 1 ) : ?>
        <div id="load-more-wrap">
            <button id="load-more" class="load-more-btn" data-page="<?php echo esc_attr( $paged + 1 ); ?>" data-max-pages="<?php echo esc_attr( $query->max_num_pages ); ?>">
                <?php esc_html_e( '加载更多文章', 'suyihang15' ); ?>
            </button>
        </div>
    <?php endif; ?>
<?php else : ?>
    <article>
        <p><?php esc_html_e( '当前没有可显示的文章，请稍后再来。', 'suyihang15' ); ?></p>
    </article>
<?php endif; ?>
