(function($) {

    $('#confirmUnsuscribe').on("click", function(){
        var widget = $('#confirmUnsuscribe').data("address");
        var url = $('#confirmUnsuscribe').data("action");
        var email =$('#emailUnsuscriber').val();
        var unsuscribe =$('#newsletterUnsuscribe').val();

        $.ajax({
            type: "put",
            url: url,
            data: {
                widgetAddress: widget,
                email:email,
                unsuscribe:unsuscribe,

            }
        }).done(function (res) {
        var message = "Cancellazione avvenuta con successo";
        $('#responseUnsuscribe').text(message);

        }).fail(function (res) {
            var message = "Email non presente nella lista";
            $('#responseUnsuscribe').text(message);
        }).always(function (res) {

        });
    });

})(jQuery);