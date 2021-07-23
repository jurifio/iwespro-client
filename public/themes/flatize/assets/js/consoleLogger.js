/**
 * Revisioned by Juri Fiorani after Created by Fabrizio Marconi on 08/10/2015.
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
