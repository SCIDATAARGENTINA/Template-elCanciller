jQuery(function ($) { 
    $(document).on('click', '.popup-video', function () {
        var id = $(this).attr('data-id');
        var popupVideo = $(this);
        var data = {
                'action': 'video-popup',
                'id': id
            };

        $.ajax({ 
            url: video_params.ajaxurl,
            data: data,
            type: 'POST',
            beforeSend: function (xhr) {

            },
            success: function (data) {
                console.log(data);
                var popupContent = data;
                $.magnificPopup.open({
                    type: 'inline',
                    items: {
                        src: popupContent
                    },
                    // Delay in milliseconds before popup is removed
                    removalDelay: 300,

                    // Class that is added to popup wrapper and background
                    // make it unique to apply your CSS animations just to this exact popup
                    mainClass: 'mfp-fade',
                    closeBtnInside: true,
                    showCloseBtn: true
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});