$(document).ready(function () {
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({
        'page': {
            'type': 'category',	// This value must not change. Required
            'environment': 'production'	// This value must not change. Required
        }
    });

    var products = [];

    $.each($(".catalog .product[data-id]"), function (k, v) {
        if ($(v).data('saleTag') == 1) return;
        products.push($(v).data('id'));
    });
    window.productIDList = products;

    var ecProducts = [];
    $.each($(".catalog .product.product-display-box"), function (k, v) {
        ecProducts.push($(v).data());
    });

    window.dataLayer.push({
        'ecommerce': {
            'currencyCode': 'EUR',
            'impressions': ecProducts
        }
    });
});

$(document).on('click', ".catalog .product.product-display-box a", function (e) {
    "use strict";
    e.preventDefault();
    var dest = $(this).prop('href');
    var product = $(this).closest('.product.product-display-box').data();
    window.dataLayer.push({
        'event': 'navigation',
        'ecommerce': {
            'click': {
                'actionField': {'list': product.list},
                'products': [{
                    'id': product.id,
                    'name': product.name,                      // Name or ID is required.
                    'brand': product.brand,
                    'price': product.price,
                    'category': product.category,
                    'variant': product.variant,
                    'position': product.position
                }]
                // Optional list property.
            }
        },
        'eventCallback': function () {
            window.location.href = dest;
        }
    });
});