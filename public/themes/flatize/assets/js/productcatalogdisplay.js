/**
 * Created by Fabrizio Marconi on 23/04/2015.
 */

(function($){
    "";"use strict";




    $(document).on('click',"#addItemToWishList", function () {

        var icon = $(this).find($(".fa"));
        var button = $(this);
        var outcome = $('.outcome');

        icon.removeClass('fa-heart').addClass('fa-spinner fa-spin');

        var product = $(this).data('product');
        var variant = $(this).data('variant');
        var selectSize = $("#selectSize");
        var size = selectSize.val();
        $.ajax({
            type: "POST",
            async: true,
            url: '/blueseal/xhr/ProductAddToWishListAjaxController',
            data: {
                widgetAddress: 'detail.default',
                product: product,
                productVariant: variant,


            }
        }).done(function(response) {
            icon.removeClass('fa-spinner fa-spin').addClass('fa-check');
            button.addClass('btn-success');

            setTimeout(function() {
                button.removeClass('btn-success');
                icon.removeClass('fa-check').addClass('fa-heart');
            },3500)
        }).fail(function(response) {
            icon.removeClass('fa-spinner fa-spin').addClass('fa-times');
            button.addClass('btn-fail');
            outcome.addClass("alert-warning");
            if (response.responseText == '500') {
                outcome.text('Seleziona una taglia');
            } else if (response.responseText == '501') {
                outcome.text('Errore generale, ritenta fra qualche minuto');
            } else if (response.responseText == '502') {
                outcome.text('Taglia non disponibile');
                alert(response);
            }

        }).always(function (response) {
            alert(response);
        });
    });



})(jQuery);