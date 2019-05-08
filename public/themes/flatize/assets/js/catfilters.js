(function($) {

    $(document).ready(function() {

        var cat = $('.currentCategory');

        if (cat.hasClass('hasChildren')) {
            cat.find('.depth2').hide();
        } else {
	        if (cat.find('.hasChildren') && $('.hasChildren').is('visible')) {
		        var parent = cat.parentsUntil('.hasChildren');
		        parent.show();
	        }
        }
    });

})(jQuery);