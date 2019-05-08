(function($){

    "";"use strict";

    $("#contextualmenulist").find('a').each(function(){
            var clicked = $(this);
            clicked.click(function(){
                $.ajax({
                    type: "GET",
                    async: true,
                    url: $(this).data('action'),
                    data: {
                        widgetAddress: $(this).data('address')
                    }
                }).done(function (content) {
                    $("#contextualmenulist").find('a').removeClass('active');
                    clicked.addClass('active');
                    $('#useraccountcontent').html(content);
                }).fail(function (content) {
                    console.log('fail');
                });
            });
        }
    );
})(jQuery);
