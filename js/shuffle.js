jQuery(function ($) { 
    $(document).on('click', '.trending-post .shuffle', function () {
        var trendingPost = $('.trending-post');
        var button = $(this),
            data = {
                'action': 'shuffle',
            };


        $.ajax({ 
            url: shuffle_params.ajaxurl,
            data: data,
            type: 'POST',
            beforeSend: function (xhr) {
                trendingPost.css('opacity', '0').css('transform','translateX(20px)');
            },
            success: function (data) {
                if(data === ''){
                    trendingPost.css('opacity', '1').css('transform', 'translateX(0px)');
                    return;
                }else{
                    trendingPost.html(data);
                    trendingPost.css('opacity', '1').css('transform', 'translateX(0px)');
                }
            },
            error: function (error) {
                trendingPost.css('opacity', '1').css('transform', 'translateX(0px)');
            }
        });
    });
});