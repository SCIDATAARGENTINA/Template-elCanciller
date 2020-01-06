jQuery(function ($) {

    $('.add-later').click(function(){
        
        let button = $(this);
        let url = watchlater.ajaxurl;

        let postId = button.attr('data-postid');
        let postName = button.attr('data-postname');

        if(button.hasClass('-isAdded')){

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        'action': 'removelater',
                        postId
                    },
                    beforeSend: function () {
                        button.addClass('-loading');
                    },
                    success: function (result) {
                        button.removeClass('-loading');
                        button.removeClass('-isAdded');
                        if ($('.listItems').length){
                            button.closest('.post-rendered').fadeOut();
                        }
                        new Noty({
                            theme: 'mint',
                            text: 'Se elimino <strong>' + postName + '</strong> de tu listado de notas para ver más tarde.',
                            timeout: '4000'
                        }).show();
                    },
                    error: function (errorThrown) {
                        console.log('error: ', errorThrown);
                    }
                });

                return;
            }

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                'action': 'addlater',
                postId
            },
            beforeSend: function () {
                button.addClass('-loading');
            },
            success: function (result) {
                button.removeClass('-loading');
                button.addClass('-isAdded');
                new Noty({
                    theme: 'mint',
                    text: 'Se agrego <strong>' + postName + '</strong> a tu listado para ver más tarde.',
                    timeout: '3000'
                }).show();
            },
            error: function (errorThrown) {
                console.log('error: ',errorThrown);
            }
        });


    });

});