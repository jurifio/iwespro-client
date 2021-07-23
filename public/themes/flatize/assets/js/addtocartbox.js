/**
 * Revisioned by Juri Fiorani after Created by Fabrizio Marconi on 23/04/2015.
 */

function updateQty(){
    var val = $('#selectSize').find(":selected").attr('data-qt');
    var inp = $('#qty');
    inp.attr('max', val);
    if(Number(inp.val()) > Number(val) ){
        inp.val(Number(val));
    }
}

function changeQty(val) {
    var inp = $('#qty');
    var max = Number(inp.attr('max'));
    var min = Number(inp.attr('min'));
    var oval = Number(inp.val());
    if(max >= (oval + Number(val)) && min <= (oval + Number(val))){
        inp.val(oval + Number(val));
    }
}

function enableAddToCart() {
    $("#addToCart").removeAttr('disabled');
}

(function($){
    "";"use strict";

	updateQty();
    var selectSize = $('#selectSize');
	selectSize.on('change',function() {
		updateQty();
		var priceBox = $("#priceBox");
		var selected = $("#"+$(this).prop('id')+" option:selected");
		if(selected == 'undefined') return;
		if(selected.data('isonsale')){
			priceBox.html('' +
				'<span style="display: inline;" class="fullprice oldprice">'+selected.data("fullprice")+' &euro;</span>&ensp;'+
				'<span style="display: inline;" class="screenprice actualprice saleprice">'+selected.data("saleprice")+' &euro;</span>');
		} else {
			priceBox.html('<span class="fullprice actualprice price">'+selected.data("price")+' &euro;</span>');
		}
	});

    if(selectSize.find('option:enabled').length == 1) {
        selectSize.find('option:enabled').attr('selected','selected');
        selectSize.trigger('change');
    }

    $(document).on('click',"#addItemToCart", function () {

        var icon = $(this).find($(".fa"));
        var button = $(this);
        var outcome = $('.outcome');

        icon.removeClass('fa-cart-plus').addClass('fa-spinner fa-spin');

        var product = $(this).data('product');
        var variant = $(this).data('variant');
        var selectSize = $("#selectSize");
        var size = selectSize.val();
        if(typeof size == 'undefined' || size == null || size.length == 0) {
            icon.removeClass('fa-spinner fa-spin').addClass('fa-times');
            button.addClass('btn-fail');
            outcome.addClass("alert-warning");
            outcome.text('Seleziona una taglia');
            setTimeout(function() {
                outcome.removeClass("alert-warning");
                outcome.html('Contattaci: <a href="mailto:support@pickyshop.com"><i class="fa fa-envelope"></i></a> - Ordine telefonico: <i class="fa fa-phone"></i> +39 02 55 90 989');
                button.removeClass('btn-fail');
                icon.removeClass('fa-times').addClass('fa-cart-plus');
            },3500);
            return;
        }
        $.ajax({
            type: "POST",
            async: true,
            url: $(this).data('action'),
            data: {
                widgetAddress: 'detail.default',
                product: product,
                productVariant: variant,
                shop: selectSize.find(':selected').data('shop'),
                size: size,
                qty: $("#cartQuantity").val()
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
            updateCartWidget()
        });
    });
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
            setTimeout(function() {
                outcome.removeClass("alert-warning");
                outcome.html('Contattaci: <a href="mailto:support@pickyshop.com"><i class="fa fa-envelope"></i></a> - Ordine telefonico: <i class="fa fa-phone"></i> +39 02 55 90 989');
                button.removeClass('btn-fail');
                icon.removeClass('fa-times').addClass('fa-heart');
            },3500)
        }).always(function (response) {
           alert(response);
        });
    });

    $(document).on('change','#selectVariant',function () {
        window.location.href = $(this).find(':selected').data('url');
    })

})(jQuery);