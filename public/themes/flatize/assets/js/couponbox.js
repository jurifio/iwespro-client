(function ($) {

    var action = $('#couponbox').data('action');

    $('#coupon-form').on("submit", function (e) {
        e.preventDefault();
        $('#cartsidesummary').html('<p style="width:318px;padding-top:110px;padding-bottom:110px;text-align:center;"><img src="/it/assets/loader.gif"></p>');
        $.ajax({
            type: "PUT",
            url: action,
            data: $(this).serialize()
        }).done(function (content) {
            $('#couponbox').replaceWith(content);
        }).fail(function (content) {
            var tooltip = '<i class="fa fa-exclamation-triangle"></i> Errore!';
            if (content.responseText == "100") {
                $('#name').css('border-color', '#fa334f').siblings('a').css('color', '#fa334f').attr('data-original-title', 'Effettua il login per utilizzare il coupon').html(tooltip);
            } else if (content.responseText == "200") {
                $('#name').css('border-color', '#fa334f').siblings('a').css('color', '#fa334f').attr('data-original-title', 'Coupon non valido').html(tooltip);
            } else if (content.responseText == "300") {
                $('#name').css('border-color', '#fa334f').siblings('a').css('color', '#fa334f').attr('data-original-title', 'Il tolale del carrello non è sufficiente per utilizzare questo coupon').html(tooltip);
            } else {
                $('#name').css('border-color', '#fa334f');
            }
        }).always(function (content) {
            var pos = window.location.href.split("/");
            pos = pos[(pos.length - 1)];
            $.ajax({
                type: "GET",
                async: true,
                url: $('#cartsidesummary').data('action'),
                data: {
                    widgetAddress: 'checkout.default',
                    checkoutStep: pos,
                    shipping: $('#countryId').val()
                }
            }).done(function (content) {
                $('#cartsidesummary').replaceWith(content);
            });
        });
    });

    $(document).on('click', '#couponbox #deleteCoupon', function () {
        $.ajax({
            type: 'DELETE',
            url: action,
            data: {
                widgetAddress: "cart.default"
            }
        }).done(function (content) {
            $('#couponbox').replaceWith(content);
        });
    });


})(jQuery);