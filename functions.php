<?php
function suyihang15_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 320,
        'flex-width'  => true,
        'flex-height' => true,
    ));
    add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption'));
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'suyihang15' ),
    ) );
}
add_action( 'after_setup_theme', 'suyihang15_setup' );

function suyihang15_default_menu( $args = array() ) {
    echo '<div class="menu-fallback">';
    echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( '首页', 'suyihang15' ) . '</a>';
    echo '<a href="' . esc_url( get_bloginfo( 'rss2_url' ) ) . '" target="_blank" rel="noopener">RSS订阅</a>';
    echo '<a href="https://suyihang15.com/" target="_blank" rel="noopener">主题作者</a>';
    echo '</div>';
}

// Include customizer
require get_template_directory() . '/inc/customizer.php';

function suyihang15_scripts() {
    wp_enqueue_style( 'suyihang15-style', get_stylesheet_uri() );
    $custom_css = '';
    $background_image = get_theme_mod( 'background_image' );
    if ( $background_image ) {
        $custom_css .= 'body { background-image: url(' . esc_url( $background_image ) . '); background-size: cover; background-attachment: fixed; }';
    }
    $primary_color = get_theme_mod( 'primary_color', '#1a73e8' );
    $background_color = get_theme_mod( 'background_color', '#f5f5f5' );
    $text_color = get_theme_mod( 'text_color', '#222' );
    $custom_css .= ':root { --primary-color: ' . esc_attr( $primary_color ) . '; --background-color: ' . esc_attr( $background_color ) . '; --text-color: ' . esc_attr( $text_color ) . '; }';
    if ( $custom_css ) {
        wp_add_inline_style( 'suyihang15-style', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'suyihang15_scripts' );

function suyihang15_set_posts_per_page( $query ) {
    if ( ! is_admin() && $query->is_main_query() && $query->is_home() ) {
        $query->set( 'posts_per_page', 10 );
    }
}
add_action( 'pre_get_posts', 'suyihang15_set_posts_per_page' );

function suyihang15_render_post_card() {
    get_template_part( 'template-parts/content', 'post' );
}

function suyihang15_load_more_scripts() {
    wp_enqueue_script( 'suyihang15-load-more', get_template_directory_uri() . '/assets/js/load-more.js', array('jquery'), '1.0', true );
    wp_localize_script( 'suyihang15-load-more', 'suyihang15LoadMore', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'suyihang15_load_more' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'suyihang15_load_more_scripts' );

function suyihang15_ajax_load_more_posts() {
    check_ajax_referer( 'suyihang15_load_more', 'security' );
    $paged = isset( $_POST['page'] ) ? max( 1, intval( $_POST['page'] ) ) : 1;
    $args = array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 10,
        'paged'          => $paged,
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        ob_start();
        while ( $query->have_posts() ) {
            $query->the_post();
            suyihang15_render_post_card();
        }
        wp_reset_postdata();
        $html = ob_get_clean();
        wp_send_json_success( array(
            'html'      => $html,
            'next_page' => $paged + 1,
            'max_pages' => $query->max_num_pages,
        ) );
    }
    wp_send_json_error( array( 'message' => '没有更多文章了' ) );
}
add_action( 'wp_ajax_nopriv_suyihang15_load_more', 'suyihang15_ajax_load_more_posts' );
add_action( 'wp_ajax_suyihang15_load_more', 'suyihang15_ajax_load_more_posts' );

function suyihang15_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
    ?>
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <footer class="comment-meta">
                <div class="comment-author vcard">
                    <?php echo get_avatar( $comment, 48 ); ?>
                    <?php printf( '<b class="fn">%s</b>', get_comment_author_link() ); ?>
                </div>
                <div class="comment-metadata">
                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                        <time datetime="<?php comment_time( 'c' ); ?>"><?php comment_time( 'Y-m-d H:i' ); ?></time>
                    </a>
                    <span class="comment-ip">IP: <?php echo esc_html( $comment->comment_author_IP ); ?></span>
                </div>
            </footer>
            <?php if ( '0' === $comment->comment_approved ) : ?>
                <p class="comment-awaiting-moderation">您的评论正在审核中。</p>
            <?php endif; ?>
            <div class="comment-content">
                <?php comment_text(); ?>
            </div>
            <div class="reply">
                <?php comment_reply_link( array_merge( $args, array(
                    'add_below' => 'div-comment',
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                ) ) ); ?>
            </div>
        </article>
    </<?php echo $tag; ?>>
    <?php
}

function suyihang15_comment_form_fields( $fields ) {
    if ( isset( $fields['url'] ) ) {
        unset( $fields['url'] );
    }
    return $fields;
}
add_filter( 'comment_form_default_fields', 'suyihang15_comment_form_fields' );
