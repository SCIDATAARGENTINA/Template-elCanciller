jQuery(document).ready(function($) {
    var URLdomain = 'https://'+ window.location.host;
    
    var idEncuesta,
        totVotos,
        opcVotos,
        nOpcion;

    var url = encuestas_params.ajaxurl;

    let getEncuesta = (encuestaId) => {

        return $.get(`${URLdomain}/wp-json/wp/v2/encuestas/${encuestaId}`);

    };

    let createOpcData = (idEncuesta, totVotos, opcVotos, nOpcion) => {

        let percentVotos = (opcVotos * 100) / totVotos;

        if (isNaN(percentVotos)) {
            percentVotos = "100";
        }

        let data = {
            action: 'encuestas',
            idEncuesta,
            totVotos,
            opcVotos,
            nOpcion,
            percentVotos
        };

        return data;

    };

    let setCookie = (id) => {

        let encuestasVotadas = Cookies.get('encuestasVotadas');
        let arrIds = [];

        if (encuestasVotadas) {

            arrIds = JSON.parse(encuestasVotadas);
            arrIds.push(id);
            encuestasVotadas = JSON.stringify(arrIds);
            Cookies.set('encuestasVotadas', encuestasVotadas, { expires: 999 });

        } else {

            arrIds = [id];
            encuestasVotadas = JSON.stringify(arrIds);
            Cookies.set('encuestasVotadas', encuestasVotadas, { expires: 999 });

        }

    };

    let validateIfVoted = (id) => {

        if (Cookies.get('encuestasVotadas')) {
            let encuestasVotadas = Cookies.get('encuestasVotadas');
            let arrIds = JSON.parse(encuestasVotadas);

            return arrIds.includes(id);
        } else {
            return false;
        }

    };

    let votoRealizado = (idEncuesta) => {
        let encuestaEl = $('#encuesta-' + idEncuesta);

        encuestaEl.find('.opcion').each(function() {

            let el = $(this);
            let nOpcion = $(this).attr('data-row_index');

            let encuesta = getEncuesta(idEncuesta);

            encuesta.done(function(data) {

                totVotos = data.acf.total_votos;
                opcVotos = data.acf.opciones[nOpcion].opcion.votos;

                let percentVotos = (opcVotos * 100) / totVotos;

                if (isNaN(percentVotos)) {
                    percentVotos = "100";
                }

                if (encuestaEl.hasClass('card')){

                    let barraTotal = '<div class="barraTotal"></div>';

                    el.find('.total .result').text(Math.round(percentVotos) + '%');
                    el.append(barraTotal);
                    el.find('.barraTotal').animate({ width: percentVotos + "%" }, 300);
                    el.addClass('voted');
                    return;
                }

                el.find('.image-container').append('<div class="resultados">' + Math.round(percentVotos) + '%</div>');

                el.find('.resultados').animate({ height: percentVotos + "%" }, 300);

            });

        });


    };

    $('.encuesta').each(function() {
        idEncuesta = $(this).find('.opcion').attr('data-id');
        if (validateIfVoted(idEncuesta)) {
            votoRealizado(idEncuesta);
        }
    });

    $('.opcion').click(function() {
        idEncuesta = $(this).attr('data-id');
        nOpcion = $(this).attr('data-row_index');

        let encuesta = getEncuesta(idEncuesta);



        if (validateIfVoted(idEncuesta)) {
            new Noty({
                theme: 'mint',
                text: 'Ya votaste esta encuesta.',
                timeout: '1000'
            }).show();
            return;
        }
        setCookie(idEncuesta);
        encuesta.done(function(data) {

            totVotos = data.acf.total_votos;
            opcVotos = data.acf.opciones[nOpcion].opcion.votos;

            let updateData = createOpcData(idEncuesta, totVotos, opcVotos, nOpcion);

            $.ajax({
                url: url,
                type: 'POST',
                data: updateData,
                success: function(result) {
                    votoRealizado(idEncuesta);
                },
                error: function(errorThrown) {

                }
            });

        });


    });



});