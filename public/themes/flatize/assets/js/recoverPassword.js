(function($) {

    $('[data-toggle="tooltip"]').tooltip();

    $.loadFormData = function() {
        var messages;
        var errors = JSON.parse($('#errors').val());
        var presets = JSON.parse($('#presets').val());

        $.getJSON('/themes/flatize/theme.messages.json',function(json) {

            messages = eval('json.'+window.location.pathname.split('/')[1]);

        }).done(function () {

            var haserrors = false;

            $.each(presets, function (k, v) {
                var key = k.split('.');
                var fld = $('#' + key[1]);
                fld.val(v);
                if (fld.attr('type') == 'radio') {
                    $('#' + key[1] + '[value='+v+']').prop('checked',true);
                }
            });

            $.each(errors, function(k,v) {
                haserrors = true;
                var tooltip = '<i class="fa fa-exclamation-triangle"></i>';
                $('#'+k).css('border-color','#fa334f').siblings('a').css('color','#fa334f').data('original-title',eval('messages.error'+v)).html(tooltip);
            });

            if (haserrors) {
                return false;
            }

        });
    };

    $('#recover-password-form').on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            async: true,
            url: "/xhr/it/Form",
            data: $(this).serialize()
        }).always(function (content) {
            //$('#recover-password-form').replaceWith(content);
            $.loadFormData();
        });
    });

    $.loadFormData();

})(jQuery);