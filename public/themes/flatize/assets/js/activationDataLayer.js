(function($) {
    $(document).ready( function () {
        var timedCycle = setInterval(function() {
            "use strict";
            if($('#wcartwidget').length > 0) {
                clearInterval(timedCycle);
                window.dataLayer = window.dataLayer || [];
                if($('.wcart_table_item').length > 0) {
                    window.dataLayer.push({
                        'event': 'checkout',
                        'ecommerce': {
                            'checkout': {
                                'actionField': {
                                    'step': 1
                                }
                            }
                        }
                    });
                }
            }
        });
    });
})(jQuery);