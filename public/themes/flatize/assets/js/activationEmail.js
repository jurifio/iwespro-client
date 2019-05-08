(function($) {

    $("#resend").on("click", function(e) {
        e.preventDefault();
        var btn = $(this);
        btn.prop("disabled",true);

        var buttonIcon = btn.find('i');
        buttonIcon.removeClass('fa-envelope').addClass('fa-spinner fa-spin');

        $.ajax({
            type: "GET",
            async: true,
            url: "/it/twostep",
            data: null
        }).done(function() {
            btn.prop("disabled",false);
            buttonIcon.removeClass('fa-spinner fa-spin').addClass('fa-check');
            btn.addClass('btn-success');
            setTimeout(function() {
                btn.removeClass('btn-success');
                buttonIcon.removeClass('fa-check').addClass('fa-envelope');
            },3500)
        });
    });

})(jQuery);