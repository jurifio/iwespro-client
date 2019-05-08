/**
 * Created by Fabrizio Marconi on 23/04/2015.
 */

(function($){

    "";"use strict";

    $("#calculateShipping").click(function () {
        //rotellina
        $.ajax({
            type: "GET",
            async: true,
            url: $(this).data('action'),
            data: {
                widgetAddress: 'cart.default',
                shipping: $("#country").val()
            }
        }).done(function (content) {
            $('#cartsidesummary').replaceWith(content);
        }).fail(function (content) {
            //togli rotellina
            //mostra X
        }).always(function (content) {
            //aggiorna widgetCarrello
        });

    });

})(jQuery);