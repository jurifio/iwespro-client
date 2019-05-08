(function() {
    "use strict";
   $.extend(Core, {
        build: function() {
            $('body').bind('touchstart', function() {});

            // Scroll to Top Button.
            $.scrollToTop();

            // Products Owl Carousel
            //this.owlProducts();

            // Text Owl Carousel
            this.owlText();

            // Owl Featured Carousel
            this.owlFeaCarousel();

            this.owlSecondCarousel();

            // Tooltips
            $("a[data-toggle=tooltip]").tooltip();

            // Media Element
            this.mediaElement();

            // Animations
            this.animationonscroll();

            //product thumbnails slide
            this.thumbslide();

            //reload
            this.proSlider();
        }
   });

   Core.initialize();

    //new listing
    var owl = $("#owl-announces");

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

   /**
    * Media query listener
    */
   var handleMatchMediaHome = function(md) {
        if (md.matches) {
            $('.menu-column ul').hide();
            $('.menu-image').hide();
        } else {
            $('.menu-column ul').show();
            $('.menu-image').show();
        }
   };

    var mq = window.matchMedia("(max-width: 992px)");
    handleMatchMediaHome(mq);
    mq.addListener(handleMatchMediaHome);

    $('.menu-header-link').on('click',function(e) {
        $(this).append('&nbsp;<i class="fa fa-spinner fa-spin"></i>');
    });


})();