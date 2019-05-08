(function($){

    "";"use strict";

    $(".userAccountMenuLink").click(function (e) {
        e.preventDefault();
        $.ajax({
            "method": "GET",
            "url": $(this).data('action'),
            "data": { widgetAddress: $(this).data('address') }
        }).done(function(content){
            $('#useraccountbody').replaceWith(content);
            console.log(content);
        });
    });
})(jQuery);