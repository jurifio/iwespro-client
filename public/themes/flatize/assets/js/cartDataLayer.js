(function($) {
    var eventFired = false;

    $(document).ready( function () {
        window.dataLayer = window.dataLayer || [];

        window.dataLayer.push({
            'page': {
                'type': 'checkout',	// This value must not change. Required
                'environment': 'production'	// This value must not change. Required
            }
        });

        var products = [];
        $.each($(".cart_table_item"), function (k, v) {
            products.push($(v).data());
        });
        if (products.length > 0) {
            window.cartRows = products;
        }


        var goCheckout = $('#goCheckout');
        if(goCheckout.length > 0) {
            var that = $(this);

            window.dataLayer.push({
                'ecommerce': {
                    'checkout': {
                        'actionField': {
                            'step': that.data('checkoutStep')
                        },
                        'products': products
                    }
                }
            });
        }
    });

    $(document).on('click', "#goPay", function (e) {
        if(!eventFired) {
            eventFired = true;
            e.preventDefault();
            var href = e.target.href;
            try {
                var that = $(this);
                var productsData = [];
                $.each($('.cart_table_item'), function (k, v) {
                    "use strict";
                    productsData.push($(v).data());
                });
                window.dataLayer = window.dataLayer || [];
                window.dataLayer.push({
                    'event': 'checkout',
                    'ecommerce': {
                        'purchase': {
                            'actionField': {
                                'id': that.data('orderId'),                         // Transaction ID. Required for purchases and refunds.
                                'affiliation': 'Online Store',
                                'revenue': that.data('totalAmount'),                     // Total transaction value (incl. tax and shipping)
                                'tax': '0',
                                'shipping': $("#shippingCost").val()
                            },
                            'products': productsData
                        }
                    },
                    'eventCallback': function () {
                        e.target.click();
                    }
                });
            } catch (e) {
                e.target.click();
            }
        }
    });
})(jQuery);