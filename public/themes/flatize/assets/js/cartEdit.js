/**
 * Created by Fabrizio Marconi on 23/04/2015.
 */

$(document).on('click', ".cart_table_item .remove", function () {
    var widgetAddress = $("#cartsummary").data('address');
    $("#loadingAjax").show();
    $.ajax({
        type: "DELETE",
        async: true,
        url: $(this).data('action'),
        data: {
            widgetAddress: widgetAddress,
            id: $(this).data('pid')
        }
    }).done(function (content) {
        $('#cartsummary').replaceWith(content);
        $("#ajaxSuccess").fadeIn(800).delay(1000).fadeOut(800);
    }).fail(function (content) {
        console.log('error while updating cart');
        $("#ajaxFail").fadeIn(800).delay(1000).fadeOut(800);
    }).always(function () {
        updateCartWidget(false);
        //refreshSummary();
    });
});

$(document).on('click', ".cart_table_item .plus", function (e) {
    var widgetAddress = $("#cartsummary").data('address');
    e.preventDefault();
    //rotellina
    $("#loadingAjax").show();
    $.ajax({
        type: "PUT",
        async: true,
        url: $(this).data('action'),
        data: {
            widgetAddress: widgetAddress,
            value: +1,
            id: $(this).data('pid')
        }
    }).done(function (content) {
        $('#cartsummary').replaceWith(content);
        $("#ajaxSuccess").fadeIn(800).delay(1000).fadeOut(800);
    }).fail(function (content) {
        $("#ajaxFail").fadeIn(800).delay(1000).fadeOut(800);
    }).always(function () {
        updateCartWidget(false);
        //refreshSummary();
    });

});

$(document).on('click', ".cart_table_item .minus", function (e) {
    var widgetAddress = $("#cartsummary").data('address');
    e.preventDefault();
    //rotellina
    $("#loadingAjax").show();
    $.ajax({
        type: "PUT",
        async: true,
        url: $(this).data('action'),
        data: {
            widgetAddress: widgetAddress,
            value: '-1',
            id: $(this).data('pid')
        }
    }).done(function (content) {
        $('#cartsummary').replaceWith(content);
        $("#ajaxSuccess").fadeIn(800).delay(1000).fadeOut(800);
    }).fail(function (content) {
        console.log('error while updating cart');
        $("#ajaxFail").fadeIn(800).delay(1000).fadeOut(800);
    }).always(function () {
        updateCartWidget(false);
        //refreshSummary();
    });
});




