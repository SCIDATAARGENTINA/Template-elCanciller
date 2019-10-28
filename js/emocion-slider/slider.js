jQuery(document).ready(function($) {


    let getSlider = (sliderId) => {
        let URLdomain = 'https://' + window.location.host;

        return $.get(`${URLdomain}/wp-json/wp/v2/posts/${sliderId}`);

    };

    let setCookie = (sliderId, interaccionId, val) => {

        let sliderAccionado = Cookies.get('sliderAccionado');
        let arrIds = [];
        let interaccionObj = {
            interaccionId,
            sliderId,
            val
        }
        var createNew = true;

        if (sliderAccionado) {

            arrIds = JSON.parse(sliderAccionado);

            let findSlider = arrIds.findIndex(obj => obj.sliderId === sliderId);

            if (findSlider > -1){ 

                arrIds.splice(findSlider, 1);

                arrIds.push(interaccionObj);

                createNew = false;

            }else{
                arrIds.push(interaccionObj)
            }

            sliderAccionado = JSON.stringify(arrIds);
            Cookies.set('sliderAccionado', sliderAccionado, { expires: 999 });

        } else {

            arrIds = [interaccionObj];
            sliderAccionado = JSON.stringify(arrIds);
            Cookies.set('sliderAccionado', sliderAccionado, { expires: 999 });

        }

        return setCookieResponse = {
            createNew,
            interaccionId
        };

    };

    let getCookie = () => {

        let sliderAccionado = Cookies.get('sliderAccionado');
        let arrIds = [];
        if(sliderAccionado){
            arrIds = JSON.parse(sliderAccionado);
        }

        return arrIds;

    }

    let createSlideData = (acfData, sliderId, val) => {

        let interaccionId;
        let interaccionVal = val;

        if (acfData.interacciones == null) {
            interaccionId = 1;
        }else{

            let cookieData = getCookie()

            let cookieIndex = cookieData.findIndex(obj => obj.sliderId == sliderId);

            if (cookieIndex > -1){

                interaccionId = cookieData[cookieIndex].interaccionId;

            }else{

                interaccionId = (parseInt(acfData.interacciones[acfData.interacciones.length - 1].id) + 1);

            }

        }

        cookieResponse = setCookie(sliderId, interaccionId, interaccionVal);

        let data = {
            action: 'slider',
            interaccionId,
            interaccionVal,
            sliderId,
            createNew: cookieResponse.createNew
        };

        return data;

    };

    let slideUpdater = (sliderId, val) => {
        
        let url = slider_params.ajaxurl;

        getSlider(sliderId).done(function(data){

            let updateData = createSlideData(data.acf, sliderId, val);

            $.ajax({
                url: url,
                type: 'POST',
                data: updateData,
                success: function (result) {
                    //console.log(result);
                },
                error: function (errorThrown) {
                    console.log(errorThrown);
                }
            })// end ajax

        })// end done

    };// end sliderUpdater

        let setSlide = async (slide, sliderId, connectUi) => {

        let cookieData = getCookie();

        cookieData.map((data) => {


            if(sliderId == data.sliderId){

                slide[0].noUiSlider.set([data.val]);  

            }
            
        })

    }

    let slider = $('.slider');

    slider.each(function() {

        var slide = $(this);

        var sliderId = slide.attr('id').slice(7);

        var connectUi = slide.find('.noUi-connect');

        noUiSlider.create(slide[0], {
            start: [0],
            step: 1,
            behaviour: 'tap-drag',
            connect: 'lower',
            range: {
                'min': 1,
                'max': 5
            }
        });

        setSlide(slide, sliderId, connectUi);

        slide[0].noUiSlider.on('update', function(val, handle) {

            val = parseInt(val);

            let handleUi = slide.find('.noUi-handle');

            handleUi.css('background-image', 'url(https://elcanciller.com/wp-content/uploads/2019/09/emoticon-' + val + '.svg)');

            let connectUi = slide.find('.noUi-connect');

            if (val == 2) {
                connectUi.css('box-shadow', 'rgba(208, 35, 26, 0.61) 11px 0px 5px 5px inset');
            } else if (val == 5) {
                connectUi.css('box-shadow', 'inset 5px 0px 6px 4px rgba(3, 199, 0, 0.9)');
            } else {
                connectUi.css('box-shadow', 'inset 5px 0px 3px 4px rgba(231, 209, 23, 0.6)');
            }

        });

        slide[0].noUiSlider.on('change', function (val) {

            var timeout;

            val = parseInt(val);

            if (timeout) {
                clearTimeout(timeout);
            }

            var timeout = setTimeout(function () { // Updates values after 5 sec

                slideUpdater(sliderId, val);

            }, 2500)

        });

    });
});