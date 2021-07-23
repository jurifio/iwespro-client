/**
 * Revisioned by Juri Fiorani after Created by Fabrizio Marconi on 23/04/2015.
 */
var preventDefaultNamedFunction = function(e){
    e.preventDefault();
};
function stopForward(){
    $('#goCheckout').bind('click', e, preventDefaultNamedFunction);
}
function resetForward(){
    $('#goCheckout').unbind('click', preventDefaultNamedFunction);
}

function refreshSummary(checkoutStep){

    $.ajax({
        type: "GET",
        async: true,
        url: $('#cartsidesummary').data('action'),
        data: {
            widgetAddress: 'checkout.default',
            checkoutStep: checkoutStep
        }
    }).done(function (content) {
        resetForward();
        $('#cartsidesummary').replaceWith(content);
    }).fail(function (content) {
        stopForward();
    }).always(function (content) {$('#cartsidesummary')
    });
}

$(document).on('change', "[name='productSizeId']", function(event) {
    var changed =  $(event.target);
    var widgetAddress = changed.data('address');
    $.ajax({
        type: "PUT",
        url: changed.data('action'),
        data: {
            widgetAddress: widgetAddress,
            productSizeId: changed.val(),
            id: changed.data('pid'),
            size: true
        }
    }).done(function (content) {
        $('#cartsummary').replaceWith(content);
        $("#ajaxSuccess").fadeIn(800).delay(1000).fadeOut(800);
    }).fail(function (content) {
        console.log('error while updating cart');
        $("#ajaxFail").fadeIn(800).delay(1000).fadeOut(800);
    }).always(function (){
        updateCartWidget(false);
    });
});