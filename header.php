<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS 2.0" href="<?php echo esc_url( get_bloginfo('rss2_url') ); ?>">
    <link rel="alternate" type="text/xml" title="<?php bloginfo('name'); ?> RSS .92" href="<?php echo esc_url( get_bloginfo('rss_url') ); ?>">
    <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom 1.0" href="<?php echo esc_url( get_bloginfo('atom_url') ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div class="site-wrapper">
    <header class="site-header">
        <div class="site-branding">
            <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php endif; ?>
            <p class="site-title"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo('name'); ?></a></p>
            <p class="site-description"><?php bloginfo('description'); ?></p>
        </div>
        <div class="site-tools">
            <?php get_search_form(); ?>
            <nav class="site-nav" aria-label="<?php esc_attr_e( '主要导航', 'suyihang15' ); ?>">
                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                    <?php wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'menu-items',
                    ) ); ?>
                <?php else : ?>
                    <?php suyihang15_default_menu(); ?>
                <?php endif; ?>
            </nav>
        </div>
        <?php
        $social_qq = get_theme_mod( 'social_qq' );
        $social_wechat = get_theme_mod( 'social_wechat' );
        $social_wechat_url = get_theme_mod( 'social_wechat_url' );
        $social_bilibili_url = get_theme_mod( 'social_bilibili_url' );
        $social_github_url = get_theme_mod( 'social_github_url' );
        $has_social = $social_qq || $social_wechat || $social_wechat_url || $social_bilibili_url || $social_github_url;
        if ( $has_social ) : ?>
        <div class="site-social">
            <?php if ( $social_qq ) : ?>
                <a class="social-item social-qq" href="https://wpa.qq.com/msgrd?v=3&uin=<?php echo esc_attr( $social_qq ); ?>&site=qq&menu=yes" target="_blank" rel="noopener">QQ</a>
            <?php endif; ?>
            <?php if ( $social_wechat_url ) : ?>
                <a class="social-item social-wechat" href="<?php echo esc_url( $social_wechat_url ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $social_wechat ? '微信: ' . $social_wechat : '微信' ); ?></a>
            <?php elseif ( $social_wechat ) : ?>
                <span class="social-item social-wechat"><?php echo esc_html( '微信: ' . $social_wechat ); ?></span>
            <?php endif; ?>
            <?php if ( $social_bilibili_url ) : ?>
                <a class="social-item social-bilibili" href="<?php echo esc_url( $social_bilibili_url ); ?>" target="_blank" rel="noopener">B站</a>
            <?php endif; ?>
            <?php if ( $social_github_url ) : ?>
                <a class="social-item social-github" href="<?php echo esc_url( $social_github_url ); ?>" target="_blank" rel="noopener">GitHub</a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </header>
    <div class="site-banner">
        <p><?php echo wp_kses_post( get_theme_mod( 'homepage_banner_text', '欢迎访问由 <strong>suyihang15</strong> 制作的主题，已支持评论区、RSS订阅、ICP备案与公安备案。' ) ); ?></p>
    </div>
    <?php
    $theme_uri = get_template_directory_uri();
    $cover_image = get_theme_mod( 'homepage_cover_image' );
    $cover_url = $cover_image ? esc_url( $cover_image ) : $theme_uri . '/assets/home.jpg';
    $profile_title = get_theme_mod( 'profile_title', __( '面向面试的个人博客展示，', 'suyihang15' ) );
    $profile_tagline = get_theme_mod( 'profile_tagline', __( '主要是用于简历作品展示。', 'suyihang15' ) );
    $profile_intro = get_theme_mod( 'profile_intro', __( '一个热爱前端的开发者，擅长将简洁设计与实际项目需求结合，形成可展示的面试作品页面。', 'suyihang15' ) );
    $profile_location = get_theme_mod( 'profile_location', __( '贵州', 'suyihang15' ) );
    $profile_experience = get_theme_mod( 'profile_experience', __( '纯爱好者', 'suyihang15' ) );
    $profile_stack = get_theme_mod( 'profile_stack', __( 'HTML/CSS/JS/PHP/React', 'suyihang15' ) );
    ?>
    <section class="home-hero">
        <div class="hero-cover" style="background-image: url('<?php echo esc_url( $cover_url ); ?>');">
            <div class="hero-cover-overlay"></div>
            <div class="hero-cover-body">
                <span class="hero-label"><?php esc_html_e( '个人作品展示', 'suyihang15' ); ?></span>
                <h2><?php bloginfo( 'name' ); ?> · <?php echo esc_html( $profile_title ); ?></h2>
                <p><?php echo esc_html( $profile_tagline ); ?></p>
                <div class="hero-highlights">
                    <div class="hero-highlight-item">
                        <strong><?php esc_html_e( '面试作品', 'suyihang15' ); ?></strong>
                        <span><?php esc_html_e( '简历展示、项目简介、技术栈', 'suyihang15' ); ?></span>
                    </div>
                    <div class="hero-highlight-item">
                        <strong><?php esc_html_e( '风格', 'suyihang15' ); ?></strong>
                        <span><?php esc_html_e( '现代、简约', 'suyihang15' ); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <aside class="hero-profile-card">
            <div class="profile-avatar" style="background-image: url('<?php echo esc_url( $cover_url ); ?>');"></div>
            <div class="profile-card-content">
                <p class="profile-name"><?php bloginfo( 'name' ); ?></p>
                <p class="profile-role"><?php echo esc_html( $profile_tagline ); ?></p>
                <p class="profile-intro"><?php echo esc_html( $profile_intro ); ?></p>
                <ul class="profile-meta">
                    <li><strong><?php esc_html_e( '所在地', 'suyihang15' ); ?></strong><span><?php echo esc_html( $profile_location ); ?></span></li>
                    <li><strong><?php esc_html_e( '经验', 'suyihang15' ); ?></strong><span><?php echo esc_html( $profile_experience ); ?></span></li>
                    <li><strong><?php esc_html_e( '技术栈', 'suyihang15' ); ?></strong><span><?php echo esc_html( $profile_stack ); ?></span></li>
                </ul>
            </div>
        </aside>
    </section>
