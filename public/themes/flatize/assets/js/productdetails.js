(function($) {

    $('#selectSize').change(function() {

        var newprice,
            oldprice,
            saleprice;

        if ($(this).find('option:selected').data('isonsale')) {
            console.log('isonsale');

            oldprice = parseInt($(this).find('option:selected').data('price'));
            saleprice = parseInt($(this).find('option:selected').data('saleprice'));
            $('.oldprice').html(oldprice.toFixed(2) + ' &euro;');
            $('.saleprice').html(saleprice.toFixed(2) + ' &euro;');

        } else {
            console.log('notonsale');
            newprice = parseInt($(this).find('option:selected').data('price'));
            $('.fullprice').html(newprice.toFixed(2) + ' &euro;');
        }
    });

    $.extend(Core, {
        build: function() {
            $('body').bind('touchstart', function() {});

            // Scroll to Top Button.
            $.scrollToTop();

            // Product thumbnails slide
            this.thumbslide();

            // Varianti
            this.owlProducts();
        }
    });

    Core.initialize();

})(jQuery);