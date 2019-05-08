(function() {

    /** Extra script for smoother navigation effect **/
    if ($(window).width() > 992) {
        $('.navbar-main-slide .navbar-nav > .dropdown').hover(function () {
            "";"use strict";
            $(this).addClass('open').find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
        }, function () {
            "";"use strict";
            var na = $(this);
            na.find('.dropdown-menu').first().stop(true, true).delay(100).slideUp('fast', function () {
                na.removeClass('open');
            });
        });
    }

    $(document).on("click", ".dropdown .dropdown-menu", function(e) {
        e.stopPropagation()
    });

})(jQuery);