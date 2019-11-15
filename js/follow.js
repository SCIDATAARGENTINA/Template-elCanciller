jQuery(document).ready(function ($) {


    let updateUserFollow = (itemId, itemType, url) => {

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                'action': 'follow_author_category',
                itemId,
                itemType
            },
            success: function (result) {
                console.log(result);
            },
            error: function (errorThrown) {
                console.log(errorThrown);
            }
        });

    }

    $('.follow').click(function () {
        updateUserFollow($(this).attr('data-id'), $(this).attr('data-type'), follow.ajaxurl);
    });


});