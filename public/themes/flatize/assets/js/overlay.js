/**
 * Created by Fabrizio Marconi on 10/11/2015.
 */
$(document).ready(function () {
    var PAGES_FOR_NEWSLETTER_VIEW = 2;
    var newsletterModalShown = readCookie("newsletterModalShown");
    if (newsletterModalShown === "true") return;
    else if (newsletterModalShown === null) {
        createCookie("newsletterModalShown", false, 365);
        createCookie("newsletterPagesToGo", PAGES_FOR_NEWSLETTER_VIEW - 1, 365);
        return;
    } else {
        var newsletterPagesToGo = readCookie("newsletterPagesToGo");
        if (newsletterPagesToGo > 0) {
            createCookie("newsletterPagesToGo", --newsletterPagesToGo, 365);
        } else {
            createCookie("newsletterModalShown", true, 365);
            eraseCookie("newsletterPagesToGo");
            setTimeout(function () {
                "use strict";
                var m = new Modal('#bsNewsletterModal');
                m.show();
            }, 1000);
        }
    }
});