(function() {

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

})(jQuery);