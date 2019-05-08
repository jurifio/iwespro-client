(function () {

    var messages;
    var errors = JSON.parse($('#errors').val());
    var presets = JSON.parse($('#presets').val());
    var rand = Math.floor(Math.random() * 9999999999) + 1;

    $.getJSON('/themes/flatize/theme.messages.json?_='+rand,function( json ) {

        messages = eval('json.'+window.location.pathname.split('/')[1]);

    }).done(function (){

        var feedback = $('#formfeedback');

        $.each(presets, function(k, v) {
            var key = k.split('_');
            $('#'+key[1]).val(v);
        });

        $.each(errors, function() {
            var msg = messages.badlogin.split(';');
            feedback.html('<strong><i class="fa fa-warning"></i> '+msg[0]+'</strong> '+msg[1]);
            feedback.removeClass('hidden');
        });

    });

})(jQuery);