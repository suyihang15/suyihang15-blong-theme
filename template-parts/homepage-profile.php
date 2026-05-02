<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$cover_image = get_theme_mod( 'homepage_cover_image' );
$profile_title = get_theme_mod( 'profile_title' );
$profile_tagline = get_theme_mod( 'profile_tagline' );
$profile_intro = get_theme_mod( 'profile_intro' );
$profile_location = get_theme_mod( 'profile_location' );
$profile_experience = get_theme_mod( 'profile_experience' );
$profile_stack = get_theme_mod( 'profile_stack' );

if ( $cover_image || $profile_title || $profile_intro ) : ?>
    <section class="homepage-profile">
        <?php if ( $cover_image ) : ?>
            <div class="profile-cover">
                <img src="<?php echo esc_url( $cover_image ); ?>" alt="<?php esc_attr_e( '首页封面', 'suyihang15' ); ?>">
            </div>
        <?php endif; ?>
        <div class="profile-info">
            <?php if ( $profile_title ) : ?>
                <h1 class="profile-title"><?php echo esc_html( $profile_title ); ?></h1>
            <?php endif; ?>
            <?php if ( $profile_tagline ) : ?>
                <p class="profile-tagline"><?php echo esc_html( $profile_tagline ); ?></p>
            <?php endif; ?>
            <?php if ( $profile_intro ) : ?>
                <p class="profile-intro"><?php echo esc_html( $profile_intro ); ?></p>
            <?php endif; ?>
            <div class="profile-details">
                <?php if ( $profile_location ) : ?>
                    <span class="profile-location"><?php echo esc_html( $profile_location ); ?></span>
                <?php endif; ?>
                <?php if ( $profile_experience ) : ?>
                    <span class="profile-experience"><?php echo esc_html( $profile_experience ); ?></span>
                <?php endif; ?>
                <?php if ( $profile_stack ) : ?>
                    <span class="profile-stack"><?php echo esc_html( $profile_stack ); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif;