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
})();