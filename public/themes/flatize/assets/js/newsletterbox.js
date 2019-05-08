(function($) {

    $(document).on("submit","form[name='newsletterbox']", function(e){
	    e.preventDefault();
	    let modalType = $('#modalType');
        let typeModal = modalType.attr('data-typemodal');
        let couponEventId = $('#couponEvent').attr('data-couponeventid');
        let fixedPageId = modalType.attr('data-fixedpageid');
        var _that = $(this);
	    var form = $(e.target);
		var action = form.data('action');
	    console.log(form,action);
	    $.ajax({
		    type: "POST",
		    url: action,
		    data: {
			    widgetAddress: 'default.default',
                data: _that.find(":input").eq(0).val(),
                name: _that.find(":input").eq(1).val(),
                surname: _that.find(":input").eq(2).val(),
                sex: $('input[name="newsletter_sex"]:checked').val(),
				typeModal: typeModal,
                couponEventId: couponEventId,
                fixedPageId: fixedPageId
		    }
	    }).done(function (content) {
		    _that.parent().parent().find("#newsletterSubscriptionOk").show();

		    if(typeModal === 'showAll'){
		    	$('#couponEvent').show();
		    	$('#closePopoupNewsletter').show();
		    	$('#popupTitle').hide();
		    	$('#popupSubtitle').hide();
		    	$('#popupText').hide();
			}

	    }).fail(function (content) {
		    _that.parent().parent().find("#newsletterSubscriptionKo").show();
	    }).always(function (content) {
		    _that.parent().parent().find("#requestNewsletterBox").hide();
	    });
    });

})(jQuery);