jQuery(function ($) {

    $('.hide-category').click(function(){
        
        let button = $(this);
        let url = hidecategory.ajaxurl;

        let categoryId = button.attr('data-categoryid');
        let categoryName = button.attr('data-categoryname');

        if(button.hasClass('-isHidden')){
                new Noty({
                    theme: 'mint',
                    text: 'La categoría <strong>' + categoryName + '</strong> esta oculta, para mostrarla nuevamente dirigirse al panel de usuarios en la pestaña "Temas Ocultos"',
                    timeout: '4000'
                }).show();

                return;
            }

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                'action': 'hidecategory',
                categoryId
            },
            beforeSend: function () {
                button.addClass('-loading');
            },
            success: function (result) {
                button.removeClass('-loading');
                button.addClass('-isHidden');
                new Noty({
                    theme: 'mint',
                    text: 'Has ocultado la categoría <strong>' + categoryName + '</strong>, recarga la página para ver los cambios.',
                    timeout: '3000'
                }).show();
            },
            error: function (errorThrown) {
                console.log('error: ',errorThrown);
            }
        });


    });

    $('.unhide-category').click(function () {

        let button = $(this);
        let url = hidecategory.ajaxurl;

        let categoryId = button.attr('data-categoryid');
        let categoryName = button.attr('data-categoryname');

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                'action': 'unhidecategory',
                categoryId
            },
            beforeSend: function () {
                button.addClass('-loading');
            },
            success: function (result) {
                button.parent().fadeOut();
            },
            error: function (errorThrown) {
                console.log('error: ', errorThrown);
            }
        });


    });

});