$(document).ready(function(){
    window.dataLayer.push({
        'page': {
            'type': 'confirmation',	// This value must not change. Required
            'environment': 'production'	// This value must not change. Required
        }
    });

	window.orderId = $('#order-data-layer').data('orderId');
	window.orderProductsData = [];
	var total = 0;
	$.each($("li.order-line"),function(k,v){
		total+=$(v).data('product-price');
		window.orderProductsData.push({
			'id': $(v).data('orderProductId'),
			'price': $(v).data('product-price'),
			'quantity':'1'
		});
	});
	/* todo finish this
    window.dataLayer.push({
        'ecommerce': {
            'purchase': {
                'actionField': {
                    'id': orderId,	// Required
                    'affiliation': 'Online Store',
                    'revenue': '35.42',	// Required
                    'tax': '4.90',
                    'shipping': '5.99',
                    'coupon': 'SUMMER_SALE'
                },
                'products': [{
                    'name': 'Widget A',	// Required
                    'id': '1234',	// Required
                    'price': '9.99',
                    'brand': 'Acme',
                    'category': 'Widgets',
                    'variant': 'W001',
                    'quantity': 1,
                    'coupon': '10_OFF'
                }]
            }
        }
    });
    */
});