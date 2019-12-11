jQuery(function ($) {

    $('.hide-category').click(function(){
        
        let button = $(this);
        let url = hidecategory.ajaxurl;

        let categoryId = button.attr('data-categoryid');
        let categoryName = button.attr('data-categoryname');

        console.log(categoryId, ' ', categoryName);

        if(button.hasClass('-isHidden')){
                new Noty({
                    theme: 'mint',
                    text: 'La categoría ' + categoryName + ' esta oculta, para mostrarla nuevamente dirigirse al panel de usuarios en la pestaña "Temas Ocultos"',
                    timeout: '3000'
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
                    text: 'Has ocultado la categoría ' + categoryName + ', recarga la página para ver los cambios.',
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

        console.log(categoryId, ' ', categoryName);

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
                console.log('ok:', result);
                button.parent().fadeOut();
            },
            error: function (errorThrown) {
                console.log('error: ', errorThrown);
            }
        });


    });

});