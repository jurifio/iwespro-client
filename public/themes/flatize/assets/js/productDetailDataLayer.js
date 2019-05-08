$(document).ready(function () {
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({
        'page': {
            'type': 'product',	// This value must not change. Required
            'environment': 'production'	// This value must not change. Required
        }
    });

    var data = $('#productSummary').data();
    if (typeof data !== 'undefined') {
        window.dataLayer.push({
            'ecommerce': {
                'detail': {
                    'actionField': {'list': 'detail'},    // 'detail' actions have an optional list property.
                    'products': [data]
                }
            }
        });
    }
});


$(document).on('click', "#selectSize", function () {
    "use strict";

    var fired = false;
    $.each(dataLayer, function (k, v) {
        if (v.event == 'open_size') {
            fired = true;
        }
    });
    if (!fired) {
        window.dataLayer.push({
            "event": "open_size"
        });
    }
});

$(document).on('click', "#addItemToCart", function () {
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({
        'event': 'navigation',
        'ecommerce': {
            'currencyCode': 'EUR',
            'add': {                                // 'add' actionFieldObject measures.
                'products': [$.extend($('#productSummary').data(), {'quantity': 1})]
            }
        }
    });
});