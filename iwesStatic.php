<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

require "environment.php";

/* Constants */
define('ApplicationRedisHost','127.0.0.1');
define('DS',DIRECTORY_SEPARATOR);
define('DATE_MYSQL_FORMAT','Y-m-d H:i:s');

require __DIR__."/../core/application/CMonkey.php";

$ninetyNineMonkey = new Monkey('NinetyNineMonkeys','pickyshop',dirname(__DIR__));
$ninetyNineMonkey->setDefaultLanguage('it');
$ninetyNineMonkey->enableDebugging();
if (ENV == 'dev') {
    ini_set('xdebug.var_display_max_depth', -1);
    ini_set('xdebug.var_display_max_children', -1);
    ini_set('xdebug.var_display_max_data', -1);
    $ninetyNineMonkey->enableDebugging();
}


function iwesMail($to,$subject,$message, $headers = "") {
    if(ENV == 'dev') return false;
    /** @var \bamboo\domain\repositories\CEmailRepo $emailRepo */
    $emailRepo = \Monkey::app()->repoFactory->create('Email');
    if(!is_array($to)) {
        $to = [$to];
    }
    return $emailRepo->newMail('Iwes IT Department <it@iwes.it>',$to,[],[],$subject,$message);
}

function logDestructError(\Throwable $e) {

    file_put_contents(__DIR__.'/../rplogs/destructLog.'.php_sapi_name().'.'.(new DateTime())->format('Ymd').'.log',
        (new DateTime())->format(DATE_ATOM).' - '.$e->getMessage()."\n".$e->getTraceAsString()."\n",FILE_APPEND);
}

/**
 * Translate a given string in the current language
 * @param string $string
 * @param int|null $lang
 * @return string
 */
function t(string $string,int $lang = null)
{
    return \Monkey::app()->repoFactory->create('Translation')->translate($string,$lang);
}

/**
 * Translate a string and fill it with via printf
 * @param $string
 * @param array $args
 * @return int
 */
function tp($string, $args = [])
{
    try{
        if(is_array($args)) return sprintf(t($string), ...$args);
        else return sprintf(t($string), $args);
    } catch (Throwable $e) {
        return $string;
    }
}

/**
 * Translate a string and echo it
 * @param $string
 * @param array $args
 */
function tpe($string, $args = [])
{
    if(is_object($string) && $string instanceof \bamboo\core\db\pandaorm\entities\ILocalizedEntity)
        echo $string->getLocalizedName();
    else echo tp($string,$args);
}

function is_json($str){
    return is_string($str) && json_decode($str) != null;
}

