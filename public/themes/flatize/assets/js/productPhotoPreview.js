/**
 *
 */
$(document).on('bs.lookat.photo',function(){
    if(window.matchMedia("only screen and (min-width: 760px)").matches) {

        $.each($('.flex-viewport ul li figure img'),function(k,v) {
            "use strict";
            $(v).removeData('elevateZoom');
            $(v).removeData('zoomImage');
            $('.zoomContainer').remove();
        });
        var willZoom = $('.flex-active-slide img');
        var w = willZoom.closest('.row').outerWidth() - willZoom.outerWidth();
        var h = $('.flexslider').outerHeight();

        willZoom.elevateZoom({
            zoomWindowWidth: w,
            zoomWindowHeight: h,
            borderSize: 0,
            lensOpacity: 0,
            lensBorder:false,
            responsive: true,
            easing: true,
            cursor: 'zoom-in'
        });
    }
});

$(document).on('click','.flex-control-nav.flex-control-thumbs li, .flexslider .flex-viewport img', function () {
    $(document).trigger('bs.lookat.photo');
});

$(document).on('load','flexslider img',function(){
    $(document).trigger('bs.lookat.photo');
});