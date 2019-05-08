(function ($) {

    logger.enableLogger();
    var deferred = $.Deferred();

    var interval = setInterval(
        function() {
            if($('.sidebar-filters').find('aside').length === 6) {
                deferred.resolve();
                clearInterval(interval);
            }
        }, 200
    );


    deferred.done(function () {
        "use strict";
        var sidebarFilters = $('.sidebar-filters');
        var mobiletoolbar = $('#mobiletoolbar');
        var mobnav = mobiletoolbar.find('nav');
        /**
         * Media query listener
         */
        var handleMatchMedia = function (md) {
            if (md.matches) {
                mobiletoolbar.show();
                mobnav.hide();
                sidebarFilters.hide();
                $('.toolbar').hide();
                $('.catalog-content').removeClass('col-md-10').addClass('col-md-12');
            } else {
                mobiletoolbar.hide();
                mobnav.hide();
                $('.toolbar').show();
                if (sidebarFilters.length == 0) {
                    mobiletoolbar.find('.tool.filters').hide();
                } else {
                    $('.catalog-content').removeClass('col-md-12').addClass('col-md-10');
                }
                sidebarFilters.show();
            }
        };
        var mq = window.matchMedia("(max-width: 992px)");
        handleMatchMedia(mq);
        mq.addListener(handleMatchMedia);


        /**
         * Mobile toolbar content filler
         */

        var sidebarContent = $('.sidebar aside');
        var i = 1;

        $.each(sidebarContent, function (k, v) {
            mobnav.append('<div class="col-sm-3 col-xs-6">' + $(v).html() + '</div>');
            if (i % 2 == 0) {
                mobnav.append('<div class="clearfix visible-xs-block"></div>');
            }
            i++;
        });
        mobnav.append('<div class="col-md-12 col-xs-12"><hr class="toolbarsep" /></div>');

        var mobnavfilters = mobnav.find('.list-cat');

        $.each(mobnavfilters, function (k, v) {
            $(v).removeClass('list-cat-long').addClass('list-cat-short');
        });

        /**
         * Mobile toolbar
         */
        mobiletoolbar.find('.filters a').on('click', function (e) {
            e.preventDefault();
            mobnav.slideToggle();
        });
    });
})(jQuery);