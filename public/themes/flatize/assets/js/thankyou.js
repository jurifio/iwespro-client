(function() {

    $.extend(Core, {
        build: function() {
            $('body').bind('touchstart', function() {});

            // Scroll to Top Button.
            $.scrollToTop();

            // Products Owl Carousel
            //this.owlProducts();

            // Tooltips
            $("a[data-toggle=tooltip]").tooltip();
        }
    });

    Core.initialize();

})();