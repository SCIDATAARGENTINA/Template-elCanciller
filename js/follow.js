jQuery(document).ready(function ($) {


    let updateUserFollow = (itemId, itemType, url, button) => {

        if(button.hasClass('-isFollowed')){
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    'action': 'unfollow_author_category',
                    itemId,
                    itemType
                },
                beforeSend: function () {
                    button.addClass('-loading');
                },
                success: function (result) {
                    button.text('Seguir');
                    button.removeClass('-loading');
                    button.removeClass('-isFollowed');
                },
                error: function (errorThrown) {
                    console.log(errorThrown);
                }
            });
            return;
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                'action': 'follow_author_category',
                itemId,
                itemType
            },
            beforeSend: function () {
                button.addClass('-loading');
            },
            success: function (result) {
                button.text('Dejar de seguir');
                button.removeClass('-loading');
                button.addClass('-isFollowed');
            },
            error: function (errorThrown) {
                console.log(errorThrown);
            }
        });

    }

    $('.follow').click(function () {
        updateUserFollow($(this).attr('data-id'), $(this).attr('data-type'), follow.ajaxurl, $(this));
    });


});