
(function($){
    "";"use strict";
    $(document).on('click',"#addItemToCart", function () {

        var icon = $(this).find($(".fa"));
        var button = $(this);
        var outcome = $('.outcome');

        icon.removeClass('fa-cart-plus').addClass('fa-spinner fa-spin');

        var product = $(this).data('product');
        var variant = $(this).data('variant');
        var line =$(this).data('line');
        var sizeTd ="#sizeTd"+line;
        $(sizeTd).removeClass('hidden');
        var selectSize="#selectSize"+line;
        var size = "";
        var wishlistid= $(this).data('wishlistid');
        var action='/xhr/it/AddToCartBox';
        $(selectSize).change(function () {
            var size = $(selectSize).val();

        $.ajax({
            type: "POST",
            async: true,
            url:action,
            data: {
                widgetAddress: 'detail.default',
                product: product,
                productVariant: variant,
               // shop: selectSize.find(':selected').data('shop'),
                size: size,
                qty: 1
            }
        }).done(function(response) {
            icon.removeClass('fa-spinner fa-spin').addClass('fa-check');
            button.addClass('btn-success');

            setTimeout(function() {
                button.removeClass('btn-success');
                icon.removeClass('fa-check').addClass('fa-cart-plus');
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
            }
            setTimeout(function() {
                outcome.removeClass("alert-warning");
                outcome.html('Contattaci: <a href="mailto:support@pickyshop.com"><i class="fa fa-envelope"></i></a> - Ordine telefonico: <i class="fa fa-phone"></i> +39 02 55 90 989');
                button.removeClass('btn-fail');
                icon.removeClass('fa-times').addClass('fa-cart-plus');
            },3500)
        }).always(function (response) {
            updateCartWidget();
            $(sizeTd).addClass('hidden');
            deleteProductToWishList(wishlistid);
        });
        });
    });
function deleteProductToWishList(item){
    let product = item;
    $.ajax({
        type: "POST",
        async: true,
        url: '/blueseal/xhr/ProductDeleteToWishListAjaxController',
        data: {
            widgetAddress: 'detail.default',
            product: product,
            status:"2"

        }
    }).done(function(response) {

    }).fail(function(response) {

    }).always(function (response) {
        location.reload();
    });
}
    $(document).on('click',"#deleteItemToWishList", function () {

        var icon = $(this).find($(".fa"));
        var button = $(this);
        var outcome = $('.outcome');

        icon.removeClass('fa-heart').addClass('fa-spinner fa-spin');

        var product = $(this).data('product-id');
        $.ajax({
            type: "POST",
            async: true,
            url: '/blueseal/xhr/ProductDeleteToWishListAjaxController',
            data: {
                widgetAddress: 'detail.default',
                product: product,
                status: "3"

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
            setTimeout(function() {
                outcome.removeClass("alert-warning");
                outcome.html('Contattaci: <a href="mailto:support@pickyshop.com"><i class="fa fa-envelope"></i></a> - Ordine telefonico: <i class="fa fa-phone"></i> +39 02 55 90 989');
                button.removeClass('btn-fail');
                icon.removeClass('fa-times').addClass('fa-heart');
            },3500)
        }).always(function (response) {
           alert(response);
           location.reload();
        });
    });


})(jQuery);