var URLdomain = 'https://elcanciller.com';

jQuery(document).ready(function($) {

    const Url = 'https://api.darksky.net/forecast/bbe0dc31a288906f1d963a4351449023/-34.6036844,-58.3815591?lang=es&units=si';
    $.ajax({
            url: Url,
            headers: { 'Access-Control-Allow-Origin': '*' },
            type: "GET",
            crossDomain: true,
            dataType: 'jsonp',
            success: function(result) {
                if ($(window).width() < 980) {
                    var skycons = new Skycons({ "color": "#b29f93" });
                    skycons.add("icon2", result.currently.icon);
                    skycons.play();
                }
                else {
                    var skycons = new Skycons({ "color": "#b29f93" });
                    skycons.add("icon1", result.currently.icon);
                    skycons.play();
                }


                $('.info-tiempo').append('<span class="temp">' + Math.round(result.currently.temperature) + '°</span>');

            },
            error: function(error) {
                console.log(`Error ${error}`);
            }
        }) // end ajax

    /* SLICK CARROUSEL CANCILELR AM*/
    if($(window).width() >= 768) {

        $(".cancilleram.desktop .carrousel").slick({
            dots: true,
            infinite: true,
            arrows: true,
            adaptiveHeight: true,
            prevArrow: '<div class="prev-arrow desktop"></div>',
            nextArrow: '<div class="next-arrow desktop"></div>',
            appendArrows: '.carr-nav.desktop',
            appendDots: '.prev-arrow.desktop'
        });

        $('.cancilleram.desktop .prev-arrow').prepend('<img class="am-logo" src=\"' + URLdomain + '/wp-content/uploads/2019/06/cancilleramlogo.svg">');

        var dotsWidth = 16;

        var dotsWidthTotal = 0;

        $('.cancilleram.desktop .carrousel').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            var maxDots = 4;
            if (nextSlide > currentSlide && nextSlide <= slick.slideCount - (maxDots - 2)) {
                if (nextSlide >= maxDots - 1) {
                    dotsWidthTotal = dotsWidthTotal + dotsWidth;
                    $('.cancilleram.desktop .slick-dots li').css('transform', 'translateX(-' + dotsWidthTotal + 'px)');
                }
            }
            if (nextSlide < currentSlide) {
                if (nextSlide >= maxDots - 1) {
                    dotsWidthTotal = dotsWidthTotal - dotsWidth;
                    $('.cancilleram.desktop .slick-dots li').css('transform', 'translateX(-' + dotsWidthTotal + 'px)');
                } else {
                    $('.cancilleram.desktop .slick-dots li').css('transform', 'translateX(0px)');
                    dotsWidthTotal = 0;
                }
            }
            if (nextSlide == 0) {
                $('.cancilleram.desktop .slick-dots li').css('transform', 'translateX(0px)');
                dotsWidthTotal = 0;
            }
            if (nextSlide == 9) {
                dotsWidthTotal = dotsWidth * (slick.slideCount - maxDots);
                $('.cancilleram.desktop .slick-dots li').css('transform', 'translateX(-' + dotsWidthTotal + 'px)');
            }
        });

    }else{

        $(".cancilleram.mobile .carrousel").slick({
            dots: true,
            infinite: true,
            arrows: true,
            adaptiveHeight: true,
            prevArrow: '<div class="prev-arrow mobile"></div>',
            nextArrow: '<div class="next-arrow mobile"></div>',
            appendArrows: '.carr-nav.mobile',
            appendDots: '.prev-arrow.mobile'
        });

        $('.cancilleram.mobile .prev-arrow').prepend('<img class="am-logo" src=\"' + URLdomain + '/wp-content/uploads/2019/06/cancilleramlogo.svg">');

        var dotsWidth = 16;

        var dotsWidthTotal = 0;

        $('.cancilleram.mobile .carrousel').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            var maxDots = 4;
            if (nextSlide > currentSlide && nextSlide <= slick.slideCount - (maxDots - 2)) {
                if (nextSlide >= maxDots - 1) {
                    dotsWidthTotal = dotsWidthTotal + dotsWidth;
                    $('.cancilleram.mobile .slick-dots li').css('transform', 'translateX(-' + dotsWidthTotal + 'px)');
                }
            }
            if (nextSlide < currentSlide) {
                if (nextSlide >= maxDots - 1) {
                    dotsWidthTotal = dotsWidthTotal - dotsWidth;
                    $('.cancilleram.mobile .slick-dots li').css('transform', 'translateX(-' + dotsWidthTotal + 'px)');
                } else {
                    $('.cancilleram.mobile .slick-dots li').css('transform', 'translateX(0px)');
                    dotsWidthTotal = 0;
                }
            }
            if (nextSlide == 0) {
                $('.cancilleram.mobile .slick-dots li').css('transform', 'translateX(0px)');
                dotsWidthTotal = 0;
            }
            if (nextSlide == 9) {
                dotsWidthTotal = dotsWidth * (slick.slideCount - maxDots);
                $('.cancilleram.mobile .slick-dots li').css('transform', 'translateX(-' + dotsWidthTotal + 'px)');
            }
        });

    }
    
    
    /* SLICK CARROUSEL CANCILELR AM END*/

    /*MAGINIFIC POPUP VIDEOS

    $('.popup-video').each(function() {
        var id = $(this).attr('data-id');
        var popupContent = $('#video-popup-' + id + '').html();
        $(this).magnificPopup({
            items: {
                src: popupContent,
                type: 'inline'
            },
            // Delay in milliseconds before popup is removed
            removalDelay: 300,

            // Class that is added to popup wrapper and background
            // make it unique to apply your CSS animations just to this exact popup
            mainClass: 'mfp-fade',
            closeBtnInside: true,
            showCloseBtn: true
        });
    });*/

    /*MAGINIFIC POPUP VIDEOS END*/

    /* SLIDER PLACAS*/
    function prevSlideHandler(currentSlide) {

        var prevSlide = currentSlide - 1;
        var lastSlide = $('.slider-placa-titulo h3').length;

        if (currentSlide == 1) {
            prevSlide = lastSlide;
        }

        $('.slider-placa-titulo h3[data-slide="' + currentSlide + '"]').removeClass('active');
        $('.placa-like i[data-slide="' + currentSlide + '"]').removeClass('active');
        $('.slider-placa-imagen img[data-slide="' + currentSlide + '"]').removeClass('active');

        $('.slider-placa-titulo h3[data-slide="' + prevSlide + '"]').addClass('active');
        $('.placa-like i[data-slide="' + prevSlide + '"]').addClass('active');
        $('.slider-placa-imagen img[data-slide="' + prevSlide + '"]').addClass('active');

        return prevSlide;
    }

    function nextSlideHandler(currentSlide) {

        var nextSlide = currentSlide + 1;
        var lastSlide = $('.slider-placa-titulo h3').length;

        if (currentSlide == lastSlide) {
            nextSlide = 1;
        }

        $('.slider-placa-titulo h3[data-slide="' + currentSlide + '"]').removeClass('active');
        $('.placa-like i[data-slide="' + currentSlide + '"]').removeClass('active');
        $('.slider-placa-imagen img[data-slide="' + currentSlide + '"]').removeClass('active');

        $('.slider-placa-titulo h3[data-slide="' + nextSlide + '"]').addClass('active');
        $('.placa-like i[data-slide="' + nextSlide + '"]').addClass('active');
        $('.slider-placa-imagen img[data-slide="' + nextSlide + '"]').addClass('active');

        return nextSlide;
    }

    var currentSlide = 1;

    $('.placa-next').click(function() {
        currentSlide = nextSlideHandler(currentSlide);
    });
    $('.placa-prev').click(function () {
        currentSlide = prevSlideHandler(currentSlide);
    });

    jQuery('#floatBtn').on('click',function(){window.location.href = URLdomain;});




    // DASHBOARD STICKY MENU

    $(window).scroll(function () {
        var top_of_element = $(".site-footer").offset().top - 200;
        var bottom_of_element = $(".site-footer").offset().top + $(".site-footer").outerHeight();
        var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
        var top_of_screen = $(window).scrollTop();
        if(top_of_element < 800){
            return;
        }else{
            if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)) {

                $('.sidebar__content').addClass('-hidden');

            } else {

                $('.sidebar__content').removeClass('-hidden');

            }
        }
    });

});