jQuery(function ($) {

    $('.hide-category').click(function(){
        
        let button = $(this);
        let url = hidecategory.ajaxurl;

        let categoryId = button.attr('data-categoryid');
        let categoryName = button.attr('data-categoryname');

        console.log(categoryId, ' ', categoryName);

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                'action': 'hidecategory',
                categoryId
            },
            success: function (result) {
                console.log('ok:', result);
            },
            error: function (errorThrown) {
                console.log('error: ',errorThrown);
            }
        });


    });

});