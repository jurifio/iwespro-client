(function($) {

    $('[data-toggle="tooltip"]').tooltip();

    var messages;
    var errorFld = $('#errors');
    var presetsFld = $('#presets');
    var presets = [];
    var errors = [];

    if (errorFld.val() != "") {
        errors = JSON.parse(errorFld.val());
    }

    if (presetsFld.val() != "") {
        presets = JSON.parse(presetsFld.val());
    }

    var rand = Math.floor(Math.random() * 9999999999) + 1;

    $.getJSON('/themes/flatize/theme.messages.json?_='+rand,function( json ) {

        messages = eval('json.'+window.location.pathname.split('/')[1]);

    }).done(function() {

        var feedback = $('#formfeedback');
        var msg;

        $.each(presets, function(k, v) {
            var key = k.split('_');
            $('#'+key[1]).val(v);
        });

        $.each(errors, function(k,v) {
            if (k != 'database') {
                var tooltip = '<i class="fa fa-exclamation-triangle"></i>';
                $('#'+k).css('border-color','#fa334f').siblings('a').css('color','#fa334f').attr('data-original-title',eval('messages.error'+v)).html(tooltip);
            }
        });

        $.each(errors, function(k,v) {
            if (k == 'database') {
                msg = messages.dbreg.split(';');
                feedback.removeClass('alert-warning').addClass('alert-danger');
                feedback.html('<strong><i class="fa fa-warning"></i> '+msg[0]+'</strong> '+eval('messages.error'+v));
                feedback.removeClass('hidden');
                return false;
            }
            msg = messages.badregistration.split(';');
            feedback.removeClass('alert-danger').addClass('alert-warning');
            feedback.html('<strong><i class="fa fa-warning"></i> '+msg[0]+'</strong> '+msg[1]);
            feedback.removeClass('hidden');
            return false;
        });

    });

})(jQuery);

(function($) {

    $('#regbtn').on('click',function() {

    });

})(jQuery);