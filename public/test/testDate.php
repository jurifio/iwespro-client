<?php

require '/media/sf_sites/vendor/mailgun/vendor/autoload.php';

use Mailgun\Mailgun;

ini_set("memory_limit","2000M");
ini_set('max_execution_time',0);
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
$today = new \DateTime();
$dateStart = $today->format('Y-m-d 00:00:00');
$dateEnd  =  $today->format('Y-m-d 23:59:59');
$invoiceDate='2020-01-03 23:04:19';


        $dateCheck=strtotime($invoiceDate);
        $dateStart=strtotime($dateStart);
        $dateEnd=strtotime($dateEnd);
        if($dateCheck>=$dateStart && $dateCheck<=$dateEnd){
            echo 'si trova nel range';
        }