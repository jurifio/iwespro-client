/**
 * Created by Fabrizio Marconi on 08/10/2015.
 */
var logger = function()
{
    var oldConsoleLog = null;
    var oldConsoleDir = null;
    var pub = {};

    pub.enableLogger =  function enableLogger()
    {
        if(oldConsoleLog == null && oldConsoleDir == null)
            return;

        window['console']['log'] = oldConsoleLog;
        window['console']['dir'] = oldConsoleDir;
    };

    pub.disableLogger = function disableLogger()
    {
        oldConsoleLog = console.log;
        oldConsoleDir = console.dir;
        window['console']['log'] = function() {};
        window['console']['dir'] = function() {};
    };

    return pub;
}();

(function(){
    console.log('Welcome to Pickyshop!');
    if($('meta[name=mode]').attr("content") != 'debug'){
        logger.disableLogger();
    }
})(jQuery);
window.cookieconsent_options = {
	"message": "This website uses cookies to ensure you get the best experience",
	"dismiss": "Got it!",
	"learnMore": "More info",
	"link": "https://www.pickyshop.com/it/page/privacy/4",
	"theme": false,
	markup: ['<div class="cc_banner-wrapper {{containerClasses}}">', '<div class="cc_banner cc_container cc_container--open">', '<a href="#null" data-cc-event="click:dismiss" target="_blank" class="cc_btn cc_btn_accept_all">{{options.dismiss}}</a>', '<p class="cc_message">{{options.message}} <a data-cc-if="options.link" target="{{ options.target }}" class="cc_more_info" href="{{options.link || "#null"}}">{{options.learnMore}}</a></p>', '', "</div>", "</div>"]
};

window.HFCHAT_CONFIG = {
    EMBED_TOKEN: "dcae45b0-ad6c-11e5-b572-19dc3b7d552a",
    ACCESS_TOKEN: "072945cfe4a04fb0b39b2910f7edb859",
    HOST_URL: "https://happyfoxchat.com",
    ASSETS_URL: "https://d1l7z5ofrj6ab8.cloudfront.net/visitor"
};

(function() {
    var scriptTag = document.createElement('script');
    scriptTag.type = 'text/javascript';
    scriptTag.async = true;
    scriptTag.src = window.HFCHAT_CONFIG.ASSETS_URL + '/js/widget-loader.js';

    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(scriptTag, s);
})();(function() {

   $.extend(Core, {
        build: function() {
            $('body').bind('touchstart', function() {});

            // Scroll to Top Button.
            $.scrollToTop();

            // Products Owl Carousel
            this.owlProducts();

            // Text Owl Carousel
            this.owlText();

            // Owl Featured Carousel
            this.owlFeaCarousel();

            this.owlSecondCarousel();

            // Tooltips
            $("a[data-toggle=tooltip]").tooltip();

            // Media Element
            this.mediaElement();

            // Animations
            this.animationonscroll();

            //product thumbnails slide
            this.thumbslide();

            //reload
            this.proSlider();
        }
   });

   Core.initialize();

    //new listing
    var owl = $("#owl-announces");

    owl.owlCarousel({
        navigation : false,
        pagination : false,
        singleItem : true,
        autoPlay : true,
        transitionStyle : "fade"
    });

    //Select Transtion Type
    $("#transitionType").change(function(){
        var newValue = $(this).val();

        //TransitionTypes is owlCarousel inner method.
        owl.data("owlCarousel").transitionTypes(newValue);

        //After change type go to next slide
        owl.trigger("owl.next");
    });

   /**
    * Media query listener
    */
   var handleMatchMediaHome = function(md) {
        if (md.matches) {
            $('.menu-column ul').hide()
            $('.menu-image').hide()
        } else {
            $('.menu-column ul').show()
            $('.menu-image').show()
        }
   };

    var mq = window.matchMedia("(max-width: 992px)");
    handleMatchMediaHome(mq);
    mq.addListener(handleMatchMediaHome);

    $('.menu-header-link').on('click',function(e) {
        $(this).append('&nbsp;<i class="fa fa-spinner fa-spin"></i>');
    });


})();/**
 * Created by Fabrizio Marconi on 23/04/2015.
 */

function updateCartWidget(selfopen)
{
    var div = $('#wcartwidget');

    $.ajax({
        type: "GET",
        async: true,
        url: div.data('action'),
        data: {
            widgetAddress: div.data('address')
        }
    }).done(function (content) {
        $('#wcartwidget').replaceWith(content);
        if (selfopen !== false) {
            $('#wcartwidget').find('a').trigger('click');
        }
    }).fail(function (content) {
        console.log('error while updating cart');
    });
}(function($) {
    $('.form-search').on('submit',function(e) {
        e.preventDefault();
        window.location.href=$(this).data('url')+$('#textsearch').val();
    });
})(jQuery);(function() {

    /** Extra script for smoother navigation effect **/
    if ($(window).width() > 992) {
        $('.navbar-main-slide .navbar-nav > .dropdown').hover(function () {
            "";"use strict";
            $(this).addClass('open').find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
        }, function () {
            "";"use strict";
            var na = $(this);
            na.find('.dropdown-menu').first().stop(true, true).delay(100).slideUp('fast', function () {
                na.removeClass('open');
            });
        });
    }

    $(document).on("click", ".dropdown .dropdown-menu", function(e) {
        e.stopPropagation()
    });

})(jQuery);(function($) {

    $(document).on("submit","form[name='newsletterbox']", function(e){
	    e.preventDefault();
	    var _that = $(this);
	    var form = $(e.target);
		var action = form.data('action');
	    console.log(form,action);
	    $.ajax({
		    type: "POST",
		    url: action,
		    data: {
			    widgetAddress: 'default.default',
			    data: _that.find(":input").eq(0).val()
		    }
	    }).done(function (content) {
		    _that.parent().parent().find("#newsletterSubscriptionOk").show();
	    }).fail(function (content) {
		    _that.parent().parent().find("#newsletterSubscriptionKo").show();
	    }).always(function (content) {
		    _that.parent().parent().find("#requestNewsletterBox").hide();
	    });
    });

})(jQuery);/**
 * Created by Fabrizio Marconi on 10/11/2015.
 */
/**
 * @returns {Modal}
 * @constructor
 */
var Modal = function() {

	if (!this instanceof Modal) {
		return new Modal()
	}

	this.modal = $('#bsModal');
	this.header = $('#bsModal .modal-header h4');
	this.body = $('#bsModal .modal-body');
	this.cancelButton = $('#bsModal .modal-footer .btn-default');
	this.okButton = $('#bsModal .modal-footer .btn-success');
};

/**
 * @param title
 */
Modal.prototype.setTitle = function(title) {
	this.header.html(title);
};

/**
 * @param text
 */
Modal.prototype.setOkButton = function(text) {
	this.okButton.html(text);
};

/**
 * @param text
 */
Modal.prototype.setCancelButton = function(text) {
	this.cancelButton.html(text);
};

/**
 * @param content
 */
Modal.prototype.setContent = function(content) {
	this.body.html(content);
};

Modal.prototype.appendContent = function(content) {
	this.body.append(content);
};

Modal.prototype.prependContent = function(content) {
	this.body.prepend(content);
};

Modal.prototype.hide = function() {
	this.modal.modal('hide');
};

Modal.prototype.show = function() {
	this.modal.modal('show');
};

/**
 * @param dzConf
 * @returns {Modal}
 */
Modal.prototype.addDropZone = function(dzConf) {

	this.setContent('' +
		'<form id="dropzoneModal" class="dropzone" enctype="multipart/form-data" name="dropzonePhoto" action="POST">'+
		'<div class="fallback">'+
		'<input name="file" type="file" multiple />' +
		'</div>' +
		'</form>');

	this.dz = new Dropzone('#dropzoneModal', dzConf);

	return this;
};

Modal.prototype.attachDropZoneEvent = function(event, callback) {
	this.dz.on(event,callback);
};

Modal.prototype.detachDropZoneEvent = function(event) {
	this.dz.off(event);
};
/**
 * Created by Fabrizio Marconi on 10/11/2015.
 */
$(document).on('ready',function(){
	var m = new Modal();
	m.show();
});