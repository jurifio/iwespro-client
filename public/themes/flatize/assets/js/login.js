(function($) {
    $.extend({

        scrollToTop: function() {

            var _isScrolling = false;

            // Append Button
            $("body").append($("<a />")
                .addClass("scroll-to-top")
                .attr({
                    "href": "#",
                    "id": "scrollToTop"
                })
                .append(
                $("<i />")
                    .addClass("fa fa-angle-up")
            ));

            $("#scrollToTop").click(function(e) {

                e.preventDefault();
                $("body, html").animate({scrollTop : 0}, 500);
                return false;

            });

            // Show/Hide Button on Window Scroll event.
            $(window).scroll(function() {

                if(!_isScrolling) {

                    _isScrolling = true;

                    if($(window).scrollTop() > 150) {

                        $("#scrollToTop").stop(true, true).addClass("visible");
                        _isScrolling = false;

                    } else {

                        $("#scrollToTop").stop(true, true).removeClass("visible");
                        _isScrolling = false;

                    }

                }

            });

        }

    });
})(jQuery);

if(!Modernizr.touch){
    $.stellar();
}

(function() {

    "";"use strict";

    var Core = {

        initialized: false,

        initialize: function() {

            if (this.initialized) return;
            this.initialized = true;

            this.build();

        },

        build: function() {

            $('body').bind('touchstart', function() {});

            // Scroll to Top Button.
            $.scrollToTop();

            // dropdown menu
            this.dropdownhover();

            // Dropdown Menu
            $(document).on("click", ".dropdown .dropdown-menu", function(e) {
                e.stopPropagation()
            });

            // Tooltips
            $('a[data-toggle="tooltip"]').tooltip();

            // Popover
            $('[data-toggle="popover"]').popover({
                trigger: "hover",
                template: '<div class="popover" role="tooltip"><div class="arrow"></div><h5 class="popover-title"></h5><div class="popover-content"></div></div>'
            });

            //Blog mansory
            this.blogMansory();

            //Filter Price
            this.filterPrice();

            // Media Element
            this.mediaElement();

            // Animations
            this.animationonscroll();
        },

        dropdownhover: function(options) {

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

        },

        proSlider: function() {

            $('.quickview-wrapper').on('shown.bs.modal', function (e) {
                e.preventDefault();
                proload.reloadSlider();
            });

            var proload = $('#slider1').bxSlider({
                pagerCustom: '.bx-pager',
                controls: false,
                adaptiveHeight : 'true'
            });

        },

        thumbslide: function (){
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails",
                slideshow: false,
                randomize: false
            });
        },

        owlCarousel: function(options) {

            //new listing
            var owl = $("#owl-main-demo");

            owl.owlCarousel({
                navigation : true,
                pagination: false,
                singleItem : true,
                autoPlay : true,
                transitionStyle : "fadeUp",
                navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
            });

            //Select Transtion Type
            $("#transitionType").change(function(){
                var newValue = $(this).val();

                //TransitionTypes is owlCarousel inner method.
                owl.data("owlCarousel").transitionTypes(newValue);

                //After change type go to next slide
                owl.trigger("owl.next");
            });
        },

        owlSecondCarousel: function(options) {

            //new listing
            var owl = $("#owl-second-demo");

            owl.owlCarousel({
                navigation : true,
                pagination: false,
                singleItem : true,
                autoPlay : true,
                transitionStyle : "backSlide",
                navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
            });

            //Select Transtion Type
            $("#transitionType").change(function(){
                var newValue = $(this).val();

                //TransitionTypes is owlCarousel inner method.
                owl.data("owlCarousel").transitionTypes(newValue);

                //After change type go to next slide
                owl.trigger("owl.next");
            });


        },

        owlThirdCarousel: function(options) {

            //new listing
            var owl = $("#owl-third-demo");

            owl.owlCarousel({
                navigation : true,
                pagination: false,
                singleItem : true,
                autoPlay : true,
                transitionStyle : "goDown",
                navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
            });

            //Select Transtion Type
            $("#transitionType").change(function(){
                var newValue = $(this).val();

                //TransitionTypes is owlCarousel inner method.
                owl.data("owlCarousel").transitionTypes(newValue);

                //After change type go to next slide
                owl.trigger("owl.next");
            });


        },

        owlFeaCarousel: function(options) {

            //owl-featured-slide
            var owl = $("#owl-featured-slide");

            owl.owlCarousel({
                navigation : true,
                pagination: false,
                singleItem : true,
                autoPlay : true,
                transitionStyle : "fade",
                navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
            });

            //Select Transtion Type
            $("#transitionType").change(function(){
                var newValue = $(this).val();

                //TransitionTypes is owlCarousel inner method.
                owl.data("owlCarousel").transitionTypes(newValue);

                //After change type go to next slide
                owl.trigger("owl.next");
            });


        },

        owlBlogSlide: function(options) {

            //owl-featured-slide
            var owl = $("#owl-blog-slide");

            owl.owlCarousel({
                navigation : true,
                pagination: false,
                singleItem : true,
                autoPlay : true,
                transitionStyle : "fade",
                navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
            });

            //Select Transtion Type
            $("#transitionType").change(function(){
                var newValue = $(this).val();

                //TransitionTypes is owlCarousel inner method.
                owl.data("owlCarousel").transitionTypes(newValue);

                //After change type go to next slide
                owl.trigger("owl.next");
            });


        },

        owlProducts: function(options) {

            var owl = $("#owl-product-slide");
            owl.owlCarousel({
                navigation : true,
                pagination: false,
                items : 4,
                itemsCustom : false,
                itemsDesktop : [1199,4],
                itemsDesktopSmall : [991,3],
                itemsTablet: [768,3],
                itemsTabletSmall: [640,2],
                itemsMobile : [480,1],
                singleItem : false,
                itemsScaleUp : false,
                navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]

            });

            // Custom Navigation Events
            $("#owl-product-slide .next").click(function(){
                owl.trigger('owl.next');
            })

            $("#owl-product-slide .prev").click(function(){
                owl.trigger('owl.prev');
            })


        },

        owlText: function(options) {

            //new listing
            var owl = $("#owl-text-slide");

            owl.owlCarousel({
                navigation : false,
                pagination : false,
                singleItem : true,
                autoPlay : true,
                transitionStyle : "fade"
            });

            //Select Transtion Type
            $("#transitionType").change(function(){
                var newValue = $(this).val();

                //TransitionTypes is owlCarousel inner method.
                owl.data("owlCarousel").transitionTypes(newValue);

                //After change type go to next slide
                owl.trigger("owl.next");
            });


        },

        showLogin: function(options) {

            $('.navbar-main .login > a').click(function() {
                var wrapper = $('.login-wrapper');

                if (wrapper.hasClass('open')) {
                    wrapper.removeClass('open');
                }
                else {
                    wrapper.addClass('open');
                }
            });

        },

        blogMansory: function() {

            if($(window).width() < 480) return;

            var $container = $('.blog-masonry');
            // initialize
            $container.masonry({
                itemSelector: '.post-mansory-item'
            });
            $container.imagesLoaded( function() {
                $container.masonry();
            });

        },

        filterPrice: function() {

            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 500,
                values: [ 0, 500 ],
                slide: function( event, ui ) {
                    event = event;
                    $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                }
            });
            $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
            " - $" + $( "#slider-range" ).slider( "values", 1 ) );

        },

        animationonscroll: function() {

            if($(window).width() > 991) {
                var waypointClass = '.main .animation';
                var animationClass = 'fadeInUp';
                var delayTime;

                $(waypointClass).waypoint(function() {
                        delayTime += 100;
                        $(this).delay(delayTime).queue(function(next){
                            $(this).toggleClass('animated');
                            $(this).toggleClass(animationClass);
                            delayTime = 0;
                            next();
                        });
                    },
                    {
                        offset: '90%',
                        triggerOnce: true
                    });
            } else return;
        },

        mediaElement: function(options) {

            if(typeof(mejs) == "undefined") {
                return false;
            }

            $("video:not(.manual)").each(function() {

                var el = $(this);

                var defaults = {
                    defaultVideoWidth: 480,
                    defaultVideoHeight: 270,
                    videoWidth: -1,
                    videoHeight: -1,
                    audioWidth: 400,
                    audioHeight: 30,
                    startVolume: 0.8,
                    loop: false,
                    enableAutosize: true,
                    features: ['playpause','progress','current','duration','tracks','volume','fullscreen'],
                    alwaysShowControls: false,
                    iPadUseNativeControls: false,
                    iPhoneUseNativeControls: false,
                    AndroidUseNativeControls: false,
                    alwaysShowHours: false,
                    showTimecodeFrameCount: false,
                    framesPerSecond: 25,
                    enableKeyboard: true,
                    pauseOtherPlayers: true,
                    keyActions: []
                };

                var config = $.extend({}, defaults, options, el.data("plugin-options"));

                el.mediaelementplayer(config);

            });

        }

    };

    Core.initialize();

})();