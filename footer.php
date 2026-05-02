    <footer class="site-footer">
        <?php
        $donation_wechat_qr = get_theme_mod( 'donation_wechat_qr' );
        $donation_alipay_qr = get_theme_mod( 'donation_alipay_qr' );
        $donation_wechat = get_theme_mod( 'donation_wechat' );
        $donation_alipay = get_theme_mod( 'donation_alipay' );
        $donation_description = get_theme_mod( 'donation_description', __( '感谢你的支持！可以通过以下方式打赏作者：', 'suyihang15' ) );
        $has_donation = $donation_wechat_qr || $donation_alipay_qr || $donation_wechat || $donation_alipay;
        if ( $has_donation ) : ?>
        <div class="footer-actions">
            <details class="donate-details">
                <summary>打赏支持</summary>
                <div class="donate-box">
                    <p><?php echo esc_html( $donation_description ); ?></p>
                    <?php if ( $donation_wechat_qr ) : ?>
                        <p><strong>微信收款二维码：</strong></p>
                        <img class="donation-qr" src="<?php echo esc_url( $donation_wechat_qr ); ?>" alt="<?php esc_attr_e( '微信打赏二维码', 'suyihang15' ); ?>" />
                    <?php endif; ?>
                    <?php if ( $donation_alipay_qr ) : ?>
                        <p><strong>支付宝收款二维码：</strong></p>
                        <img class="donation-qr" src="<?php echo esc_url( $donation_alipay_qr ); ?>" alt="<?php esc_attr_e( '支付宝打赏二维码', 'suyihang15' ); ?>" />
                    <?php endif; ?>
                </div>
            </details>
        </div>
        <?php endif; ?>
        <p>© <?php echo date('Y'); ?> <a href="https://suyihang15.com/" rel="author">suyihang15</a> | MIT License</p>
        <?php
        $icp_record_number = get_theme_mod( 'icp_record_number', __( 'ICP备案号', 'suyihang15' ) );
        $icp_record_url = get_theme_mod( 'icp_record_url' );
        $psb_record_number = get_theme_mod( 'psb_record_number', __( '公安备案号', 'suyihang15' ) );//这个给我当时调整了好久
        $psb_record_url = get_theme_mod( 'psb_record_url' );
        ?>
        <p>
            <?php if ( $icp_record_url ) : ?>
                <a href="<?php echo esc_url( $icp_record_url ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $icp_record_number ); ?></a>
            <?php else : ?>
                <?php echo esc_html( $icp_record_number ); ?>
            <?php endif; ?>
            | 
            <?php if ( $psb_record_url ) : ?>
                <a href="<?php echo esc_url( $psb_record_url ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $psb_record_number ); ?></a>
            <?php else : ?>
                <?php echo esc_html( $psb_record_number ); ?>
            <?php endif; ?>
            | <a href="<?php echo esc_url( get_bloginfo('rss2_url') ); ?>">RSS订阅</a>
        </p>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
