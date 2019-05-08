/**
 * Created by Fabrizio Marconi on 23/04/2015.
 */

function attachCheckoutShipping() {
    $("#differentShipping").change(function () {
        if($(this).is(':checked')){
            $("#billingSide").attr('class','col-md-12');
            $("#shippingSide").hide();
        } else {
            $("#billingSide").attr('class','col-sm-5');
            $("#shippingSide").show();
        }
    });

    $("#goCheckout").click(function (e) {
        var obj = $('#addresses');
        var parameters  = { widgetAddress: obj.data('address') };
        $.each($("#addresses :input"), function(a,b){
            if($(b).is('button')) {
                return;
            }
            var name = $(b).attr('name');
            parameters[name] = $(b).val();
        });
        $.ajax({
            type: "POST",
            async: false,
            url: obj.data('action'),
            data: parameters
        }).done(function (content) {
            return true;
        }).fail(function (content) {
            e.preventDefault();
            obj.replaceWith(content);
            attachCheckoutShipping();
            return false;
        }).always(function (content) {
        });
    });

}

(function($){

    "";"use strict";
    attachCheckoutShipping();

})(jQuery);