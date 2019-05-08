(function ($) {
    var selector = $('#mobiletoolbar');
    var small = selector.find('.trasform-small');
    var large = selector.find('.trasform-large');;
    var isLarge;
    $(document).on('click',selector.selector + ' .trasform-large',function(e) {
        "use strict";
        e.preventDefault();
        if(typeof isLarge === 'undefined' || !isLarge) {
            $('.product-grid-container > div.itemListElement').each(function() {
                $(this).removeClassRegex('^col-').addClass('col-xs-12');
            });
            large.addClass('gold');
            small.removeClass('gold');
            isLarge = true;
        }
    });

    $(document).on('click',selector.selector + ' .trasform-small',function(e) {
        "use strict";
        e.preventDefault();
        if(typeof isLarge === 'undefined' || isLarge) {
            $('.product-grid-container > div.itemListElement').each(function() {
                $(this).removeClassRegex('^col-').addClass('col-xs-6');
            });
            small.addClass('gold');
            large.removeClass('gold');
            isLarge = false;
        }
    });

    $(window).ready(function () {
        if(selector.is(':visible')) {
            small.trigger('click');
        }
    });

})(jQuery);