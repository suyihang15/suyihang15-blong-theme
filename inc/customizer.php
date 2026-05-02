<?php
/**
 * Theme Customizer
 *
 * @package suyihang15
 */

function suyihang15_customize_register( $wp_customize ) {
    // Social Links Section
    $wp_customize->add_section( 'suyihang15_social_section', array(
        'title'       => __( '社交链接设置', 'suyihang15' ),
        'priority'    => 160,
        'description' => __( '设置 QQ、微信、B 站、GitHub 信息。', 'suyihang15' ),
    ) );

    $wp_customize->add_setting( 'social_qq', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'social_qq', array(
        'label'    => __( 'QQ 号码', 'suyihang15' ),
        'section'  => 'suyihang15_social_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'social_wechat', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'social_wechat', array(
        'label'    => __( '微信号', 'suyihang15' ),
        'section'  => 'suyihang15_social_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'social_bilibili_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'social_bilibili_url', array(
        'label'    => __( 'B 站主页链接', 'suyihang15' ),
        'section'  => 'suyihang15_social_section',
        'type'     => 'url',
    ) );

    $wp_customize->add_setting( 'social_github_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'social_github_url', array(
        'label'    => __( 'GitHub 链接', 'suyihang15' ),
        'section'  => 'suyihang15_social_section',
        'type'     => 'url',
    ) );

    $wp_customize->add_setting( 'social_wechat_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'social_wechat_url', array(
        'label'    => __( '微信链接', 'suyihang15' ),
        'section'  => 'suyihang15_social_section',
        'type'     => 'url',
    ) );

    // Record Section
    $wp_customize->add_section( 'suyihang15_record_section', array(
        'title'       => __( '备案设置', 'suyihang15' ),
        'priority'    => 162,
        'description' => __( '设置 ICP 和公安备案号及跳转链接。', 'suyihang15' ),
    ) );

    $wp_customize->add_setting( 'icp_record_number', array(
        'default'           => __( '备案号', 'suyihang15' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'icp_record_number', array(
        'label'    => __( 'ICP备案号', 'suyihang15' ),
        'section'  => 'suyihang15_record_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'icp_record_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'icp_record_url', array(
        'label'    => __( 'ICP备案链接', 'suyihang15' ),
        'section'  => 'suyihang15_record_section',
        'type'     => 'url',
    ) );

    $wp_customize->add_setting( 'psb_record_number', array(
        'default'           => __( '公安备案号', 'suyihang15' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'psb_record_number', array(
        'label'    => __( '公安备案号', 'suyihang15' ),
        'section'  => 'suyihang15_record_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'psb_record_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'psb_record_url', array(
        'label'    => __( '公安备案链接', 'suyihang15' ),
        'section'  => 'suyihang15_record_section',
        'type'     => 'url',
    ) );

    // Banner Section
    $wp_customize->add_section( 'suyihang15_banner_section', array(
        'title'       => __( '首页横幅', 'suyihang15' ),
        'priority'    => 150,
        'description' => __( '设置首页顶部横幅文本。支持简单 HTML。', 'suyihang15' ),
    ) );

    $wp_customize->add_setting( 'homepage_banner_text', array(
        'default'           => __( '欢迎访问由 <strong>suyihang15</strong> 制作的主题，已支持评论区、RSS订阅、ICP备案与公安备案。', 'suyihang15' ),
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'homepage_banner_text', array(
        'label'    => __( '首页横幅文本', 'suyihang15' ),
        'section'  => 'suyihang15_banner_section',
        'type'     => 'textarea',
    ) );

    // Profile Section
    $wp_customize->add_section( 'suyihang15_profile_section', array(
        'title'       => __( '首页个人简介', 'suyihang15' ),
        'priority'    => 155,
        'description' => __( '设置首页封面和右侧个人简介信息。', 'suyihang15' ),
    ) );

    $wp_customize->add_setting( 'homepage_cover_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'homepage_cover_image', array(
        'label'    => __( '首页封面图片', 'suyihang15' ),
        'section'  => 'suyihang15_profile_section',
        'settings' => 'homepage_cover_image',
    ) ) );

    $wp_customize->add_setting( 'background_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'background_image', array(
        'label'    => __( '网站背景图片', 'suyihang15' ),
        'section'  => 'suyihang15_profile_section',
        'settings' => 'background_image',
    ) ) );

    $wp_customize->add_setting( 'profile_title', array(
        'default'           => __( '面向面试的个人博客展示', 'suyihang15' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'profile_title', array(
        'label'    => __( '简介标题', 'suyihang15' ),
        'section'  => 'suyihang15_profile_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'profile_tagline', array(
        'default'           => __( '专注于爱好者', 'suyihang15' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'profile_tagline', array(
        'label'    => __( '角色简介', 'suyihang15' ),
        'section'  => 'suyihang15_profile_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'profile_intro', array(
        'default'           => __( '一个热爱编程的开发者，简约的作品页面。', 'suyihang15' ),
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'profile_intro', array(
        'label'    => __( '个人简介', 'suyihang15' ),
        'section'  => 'suyihang15_profile_section',
        'type'     => 'textarea',
    ) );

    $wp_customize->add_setting( 'profile_location', array(
        'default'           => __( '贵州', 'suyihang15' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'profile_location', array(
        'label'    => __( '所在地', 'suyihang15' ),
        'section'  => 'suyihang15_profile_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'profile_experience', array(
        'default'           => __( '爱好者', 'suyihang15' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'profile_experience', array(
        'label'    => __( '工作经验', 'suyihang15' ),
        'section'  => 'suyihang15_profile_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'profile_stack', array(
        'default'           => __( 'HTML/CSS/JS/PHP/React', 'suyihang15' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'profile_stack', array(
        'label'    => __( '技术栈', 'suyihang15' ),
        'section'  => 'suyihang15_profile_section',
        'type'     => 'text',
    ) );

    // Donation Section
    $wp_customize->add_section( 'suyihang15_donation_section', array(
        'title'       => __( '打赏设置', 'suyihang15' ),
        'priority'    => 170,
        'description' => __( '设置微信、支付宝和 B 站打赏信息。', 'suyihang15' ),
    ) );

    $wp_customize->add_setting( 'donation_wechat_qr', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'donation_wechat_qr', array(
        'label'    => __( '微信打赏二维码', 'suyihang15' ),
        'section'  => 'suyihang15_donation_section',
        'settings' => 'donation_wechat_qr',
    ) ) );

    $wp_customize->add_setting( 'donation_alipay_qr', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'donation_alipay_qr', array(
        'label'    => __( '支付宝打赏二维码', 'suyihang15' ),
        'section'  => 'suyihang15_donation_section',
        'settings' => 'donation_alipay_qr',
    ) ) );

    $wp_customize->add_setting( 'donation_wechat', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'donation_wechat', array(
        'label'    => __( '打赏微信', 'suyihang15' ),
        'section'  => 'suyihang15_donation_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'donation_alipay', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'donation_alipay', array(
        'label'    => __( '打赏支付宝', 'suyihang15' ),
        'section'  => 'suyihang15_donation_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'donation_description', array(
        'default'           => __( '感谢你的支持！可以通过以下方式打赏作者：', 'suyihang15' ),
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'donation_description', array(
        'label'    => __( '打赏说明', 'suyihang15' ),
        'section'  => 'suyihang15_donation_section',
        'type'     => 'textarea',
    ) );

    // Colors Section
    $wp_customize->add_section( 'suyihang15_colors_section', array(
        'title'       => __( '颜色设置', 'suyihang15' ),
        'priority'    => 165,
        'description' => __( '自定义主题颜色。', 'suyihang15' ),
    ) );

    $wp_customize->add_setting( 'primary_color', array(
        'default'           => '#1a73e8',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
        'label'    => __( '主色调', 'suyihang15' ),
        'section'  => 'suyihang15_colors_section',
    ) ) );

    $wp_customize->add_setting( 'background_color', array(
        'default'           => '#f5f5f5',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
        'label'    => __( '背景色', 'suyihang15' ),
        'section'  => 'suyihang15_colors_section',
    ) ) );

    $wp_customize->add_setting( 'text_color', array(
        'default'           => '#222',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
        'label'    => __( '文字颜色', 'suyihang15' ),
        'section'  => 'suyihang15_colors_section',
    ) ) );
}
add_action( 'customize_register', 'suyihang15_customize_register' );