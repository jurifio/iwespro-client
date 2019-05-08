(function($) {

    "";"use strict";

    $(".tab-handle").click(function() {

        var fullAddress = $(this).data('address');
        var url = $(this).data('xhr');

        $(this).parentsUntil('.nav-tabs').parent().children().each(function(){
            $(this).removeClass('active');
        });

        $(this).parent().addClass('active');

        $.ajax({
            "method": "GET",
            "url": url+"/TabContent",
            "data": { widgetAddress: fullAddress }
        }).done(function(html) {
            $("#tab-content").html(html);
            $("img").unveil(50,function() {
                $(this).load(function() {
                    $(this).hide().fadeIn(500);
                    $(this).parentsUntil('figure').parent().removeClass('img-holder');
                    $(this).removeClass('xhttp-loading-icon');
                });
            });
        });
    });

    $('.tab-default').trigger('click');

})(jQuery);