<?php

require '/media/sf_sites/vendor/mailgun/vendor/autoload.php';
use Mailgun\Mailgun;
ini_set("memory_limit", "2000M");
ini_set('max_execution_time', 0);
$ttime = microtime(true);
$time = microtime(true);
require '../../iwesStatic.php';
var_dump('Applicazione  \t\t\t\t' . (microtime(true) - $time));

$monkey = \Monkey::app();
$time = microtime(true);
$monkey->dbAdapter;
var_dump("dbAdapter \t\t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->cacheService;
var_dump("cacheService \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->sessionManager;
var_dump("sessionManager \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->authManager;
var_dump("authManager \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->entityManagerFactory;
var_dump("entityManagerFactory \t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->repoFactory;
var_dump("repoFactory \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->eventManager;
var_dump("eventManager \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$mgClient = new Mailgun('key-1d5fe7e72fab58615be0d245d90e9e56');
$domain = 'iwes.pro';
$queryString = array(
    'begin'        => 'Fri, 23 November 2019 09:00:00 -0000',
    'ascending'    => 'yes',
    'pretty'       => 'yes',
    'recipient'    => 'juri@iwes.it'
);

# Make the call to the client.
$result = $mgClient->get("$domain/events", $queryString);
var_dump($result);

foreach ($result->http_response_body->items as $list ) {
    echo 'oraInvio:'.$list->timestamp.'<br>';
     if (!empty($list->envelope->sender)) {
         echo 'sender:'.$list->envelope->sender . '<br>';
     }
    if (!empty($list->envelope->targets)) {
        echo 'targets:'.$list->envelope->targets . '<br>';
    }
    if (!empty($list->message->headers->to)) {
        echo 'to:'.$list->message->headers->to . '<br>';
    }
    if (!empty($list->message->headers->from)) {
        echo 'from:'.$list->message->headers->from . '<br>';
    }
    if (!empty($list->message->headers->subject)) {
        echo 'oggetto:'.$list->message->headers->subject . '<br>';
    }

}




