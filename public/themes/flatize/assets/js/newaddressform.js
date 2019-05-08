(function($) {

    $('[data-toggle="tooltip"]').tooltip();

    $('#form-newaddress').on('submit',function(e) {

        e.preventDefault();

        var html = $("#addresses .row .col-sm-12");

        $.ajax({

           type: "POST",
           async: false,
           url: $(this).attr('action'),
           data: $(this).serialize()

        }).done(function(content) {

            html.html(content);

            var messages;
            var errors = JSON.parse($('#errors').val());
            var presets = JSON.parse($('#presets').val());

            $.getJSON('/themes/flatize/theme.messages.json',function(json) {

                messages = eval('json.'+window.location.pathname.split('/')[1]);

            }).done(function (){

                var haserrors = false;

                $.each(presets, function(k, v) {
                    var key = k.split('_');
                    $('#'+key[1]).val(v);
                });

                $.each(errors, function(k,v) {
                    haserrors = true;
                    var tooltip = '<i class="fa fa-exclamation-triangle"></i>';
                    $('#'+k).css('border-color','#fa334f').siblings('a').css('color','#fa334f').data('original-title',eval('messages.error'+v)).attr('title',eval('messages.error'+v)).html(tooltip);
                });

                if (haserrors) {
                    return false;
                }

                $('.close-modal-two').trigger('click');

                $('#addresses').find('.row').html('<img src="/it/assets/loader.gif" />');

                $('.addressform').find('.row').html('<div class="col-xs-4">&nbsp;</div><div class="col-xs-4"><img src="/it/assets/loader.gif" /></div>');

                $('#cartsidesummary').html('<p style="width:318px;padding-top:110px;padding-bottom:110px;text-align:center;"><img src="/it/assets/loader.gif"></p>');

                $.ajax({
                    type: "GET",
                    async: true,
                    url: "/xhr/it/AddressForm",
                    data: {
                        widgetAddress: "checkout.default"
                    }
                }).done(function (content) {
                    $('.addressform').html(content);

                    $.ajax({
                        type: "GET",
                        async: true,
                        url: $('#cartsidesummary').data('action'),
                        data: {
                            widgetAddress: 'checkout.default',
                            checkoutStep: 'shipping',
                            shipping: $('#countryId').val()
                        }
                    }).done(function(content) {
                        $('#cartsidesummary').replaceWith(content);
                    });
                });

            });

        });

    });

})(jQuery);