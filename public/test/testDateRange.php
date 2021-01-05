<?php
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
$now=strtotime(date("Y-m-d"));
$currentYear=(new \DateTime());
$dateStartPeriod1=strtotime('2021-12-01 00:00:00');
$dateEndPeriod1 = strtotime('2021-12-30 23:59:00');
$dateStartPeriod2=strtotime('2021-04-01 00:00:00.000000');
$dateEndPeriod2=strtotime('2021-04-30 23:59:00.000000');
$dateStartPeriod3=strtotime('2021-06-01 00:00:00.000000');
$dateEndPeriod3=strtotime('2021-06-30 23:59:00.000000');
$dateStartPeriod4=strtotime('2021-10-01 00:00:00.000000');
$dateEndPeriod4=strtotime('2021-10-30 23:59:00.000000');
$isOnSale=0;
switch(true){
    case ($now>=$dateStartPeriod1 && $now<=$dateEndPeriod1):
        $isOnSale=1;
        break;
    case ($now>=$dateStartPeriod2 && $now<=$dateEndPeriod2):
        $isOnSale=1;
        break;
    case ($now>=$dateStartPeriod3 && $now<=$dateEndPeriod3):
        $isOnSale=1;
        break;
    case ($now>=$dateStartPeriod4 && $now<=$dateEndPeriod4):
        $isOnSale=1;
        break;
    default:
        echo 'prova';

}