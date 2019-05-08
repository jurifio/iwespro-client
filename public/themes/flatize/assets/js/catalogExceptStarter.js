var owl = $(".owl-product-slide");
$.each(owl, function (k, v) {
    v = $(v);
    v.owlCarousel({
        navigation: true,
        pagination: false,
        items: 4,
        itemsCustom: false,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [991, 3],
        itemsTablet: [768, 3],
        itemsTabletSmall: [640, 2],
        itemsMobile: [480, 1],
        singleItem: false,
        itemsScaleUp: false,
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    });

    // Custom Navigation Events
    v.find(".next").click(function () {
        v.trigger('owl.next');
    });
    v.find(".prev").click(function () {
        v.trigger('owl.prev');
    });

});

owl.find('img').unveil();