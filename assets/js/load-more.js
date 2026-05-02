jQuery(document).ready(function ($) {
    var loadMoreBtn = $('#load-more');
    if (!loadMoreBtn.length) {
        return;
    }

    loadMoreBtn.on('click', function () {
        var button = $(this);
        var nextPage = parseInt(button.data('page'), 10);
        var maxPages = parseInt(button.data('max-pages'), 10);

        if (!nextPage || nextPage > maxPages) {
            button.text('没有更多文章了');
            button.prop('disabled', true);
            return;
        }

        button.text('加载中...');
        button.prop('disabled', true);

        $.ajax({
            url: suyihang15LoadMore.ajax_url,
            type: 'POST',
            data: {
                action: 'suyihang15_load_more',
                page: nextPage,
                security: suyihang15LoadMore.nonce
            },
            success: function (response) {
                if (response.success && response.data.html) {
                    $('#post-list').append(response.data.html);
                    button.data('page', response.data.next_page);
                    button.data('max-pages', response.data.max_pages);
                    if (response.data.next_page > response.data.max_pages) {
                        button.remove();
                    } else {
                        button.text('加载更多文章');
                        button.prop('disabled', false);
                    }
                    return;
                }
                button.text('没有更多文章了');
                button.prop('disabled', true);
            },
            error: function () {
                button.text('加载失败，请重试');
                button.prop('disabled', false);
            }
        });
    });
});