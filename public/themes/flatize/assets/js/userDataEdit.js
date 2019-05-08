(function($) {

    var messages;

    $.loadFormData = function() {

        $('[data-toggle="tooltip"]').tooltip();

        var errors = JSON.parse($('#errors').val());
        var presets = JSON.parse($('#presets').val());
        var outcome = JSON.parse($('#outcome').val());

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

    $('#form-user-data').on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            type: "PUT",
            async: true,
            url: "/xhr/it/Form",
            data: $(this).serialize()
        }).done(function (content) {
            $('.formcontainer').html(content);

            var haserrors = false;
            var errors = JSON.parse($('#errors').val());
            var outcome = JSON.parse($('#outcome').val());

            $.each(errors, function() {
                haserrors = true;
            });

            if (haserrors) {
                $.loadFormData();
                return false;
            } else {
                $("#formfeedback").removeClass("alert-warning hidden").addClass("alert-success").html("<p>"+messages.editok+"</p>");
                if (outcome.mailchanged == 1) {
                    $(".outcome").html("<div class=\"alert alert-info\"> <strong>"+messages.emailChangeTitle+"</strong> "+messages.emailChangeText+"</div>");
                    $.get("/it/twostep");
                }
            }

            $.loadFormData();
        });
    });

    $.loadFormData();

})(jQuery);