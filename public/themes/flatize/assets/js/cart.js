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

    $("#addItemToCart").click(function () {
        //rotellina
        $.ajax({
            type: "POST",
            async: true,
            url: $(this).data('action'),
            data: {
                address: 'data.default',
                product: $(this).data('product'),
                productVariant: $(this).data('productVariant'),
                shop: $(this).data('shop'),
                size: $('#size').val(),
                qty: $('qty').val()
            }
        }).done(function (content) {
            console.log(content);
        });

    });

})(jQuery);