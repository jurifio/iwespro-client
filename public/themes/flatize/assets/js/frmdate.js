(function($){

    "";"use strict";

    $(".date-control").on('change',function() {

        $('#'+$(this).data('hf')).val($('.date-year').val()+'-'+$('.date-month').val()+'-'+$('.date-day').val());

    });

})(jQuery);