/**
 * Created by Fabrizio Marconi on 22/05/2015.
 */
(function($){

    "";"use strict";

    $("input[name='radioPay'], label a").click(function (e) {

        var obj = $(this);
        var step = $(this).data('step');

        if ($(this).is('a')) {
            $(this).prev().prop('checked', true);
            obj = $(this).prev();
            step = $(this).prev().data('step');
        } else {
            $(this).next().trigger('click');
        }

        $('#cartsidesummary').html('<p style="width:318px;padding-top:110px;padding-bottom:110px;text-align:center;"><img src="/it/assets/loader.gif"></p>');

        $.ajax({
            type: "POST",
            async: true,
            url: obj.data('action'),
            data: {
                widgetAddress: obj.data('address'),
                value: obj.val()
            }
        }).done(function (content) {
            refreshSummary(step);
        });
    });

    $("input[name='radioPay']:checked").trigger('click');
})(jQuery);