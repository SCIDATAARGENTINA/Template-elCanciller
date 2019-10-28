jQuery(function ($) { // use jQuery code inside this to avoid "$ is not defined" error
    $(document).on('click', '.stories', function () {
        var historiasContainer = '<div class="historias-container slide-in-blurred-tl"><div class="historias"></div></div>';

        var data = {
                'action': 'historia',
            };


        $.ajax({ // you can also use $.post here
            url: historias_params.ajaxurl, // AJAX handler
            data: data,
            type: 'POST',
            beforeSend: function (xhr) {
                $('body').append(historiasContainer);
            },
            success: function (data) {
                console.log(data);
                $('.historias').append(data);
                $('.historias').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 6000,
                    speed: 200,
                    fade: true,
                    dots: true,
                    cssEase: 'linear',
                    prevArrow: '<button class="slick-prev slick-arrow" type="button" style="display: block;"></button>',
                    nextArrow: '<button class="slick-next slick-arrow" type="button" style="display: block;"></button>'
                });
                $('body').css('overflow-y', 'hidden');

                $('.historia, .slick-arrow, .slick-dots').click(function(e){
                    e.stopPropagation();
                });

                $('.historias-container').click( function(){
                    $('.historias').slick('unslick')
                    $('.historias-container').remove();
                    $('body').css('overflow-y', 'visible');
                });
            },
            error: function (error) {
                console.log(`Error ${error}`);
            }
        });
    });
});