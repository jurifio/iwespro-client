/**
 * Created by Fabrizio Marconi on 23/04/2015.
 */
var updateCartWidget;
(function($) {
    "use strict";
    updateCartWidget = function(selfopen)
    {
        var div = $('#wcartwidget');
        $.ajax({
            type: "GET",
            async: true,
            url: div.data('action'),
            data: {
                widgetAddress: div.data('address')
            }
        }).done(function (content) {
            $('#wcartwidget').replaceWith(content);
            if (selfopen !== false) {
                $('#wcartwidget').find('a').trigger('click');
            }
        }).fail(function (content) {
            console.log('error while updating cart');
        });
    }
})(jQuery);
