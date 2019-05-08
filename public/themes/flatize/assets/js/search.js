(function($) {
    $(document).on('submit','.form-search',function(e) {
        e.preventDefault();
        e.stopPropagation();
        window.location.href=$(this).data('url')+$('#textsearch').val();
    });
})(jQuery);