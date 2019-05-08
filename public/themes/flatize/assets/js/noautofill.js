(function($) {

    "";"use strict";

    $(document).ready(function() {
        if (navigator.userAgent.match(/WebKit/i)) {
            $('input[type=text]').each(function() {
                $(this).val('');
            });

            $('input[type=email]').each(function() {
                $(this).val('');
            });

            $('input[type=password]').val(' ').val('');
        }
    });

})(jQuery);