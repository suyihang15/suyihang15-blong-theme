<?php
if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php printf( _nx( '1 条评论', '%1$s 条评论', get_comments_number(), 'comments title', 'suyihang15' ), number_format_i18n( get_comments_number() ) ); ?>
        </h2>
        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size'=> 48,
                'callback'   => 'suyihang15_comment',
            ) );
            ?>
        </ol>
        <?php the_comments_navigation(); ?>
    <?php endif; ?>
    <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments">评论已关闭。</p>
    <?php endif; ?>
    <?php
    comment_form( array(
        'title_reply'        => '发表评论',
        'label_submit'       => '提交评论',
        'comment_notes_after' => '',
        'fields'             => array(
            'author' => '<p class="comment-form-author"><label for="author">名称 <span class="required">*</span></label><input id="author" name="author" type="text" value="" size="30" required /></p>',
            'email'  => '<p class="comment-form-email"><label for="email">邮箱 <span class="required">*</span></label><input id="email" name="email" type="email" value="" size="30" required /></p>',
        ),
        'comment_field'      => '<p class="comment-form-comment"><label for="comment">评论</label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></p>',
    ) );
    ?>
</div>
