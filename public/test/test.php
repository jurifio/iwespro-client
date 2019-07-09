<?php

$ttime = microtime(true);
$time = microtime(true);
require "../../iwesStatic.php";
var_dump("Applicazione  \t\t\t\t" . (microtime(true) - $time));

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
$monkey->mailService;

$time = microtime(true);
/*
var_dump("ttime:  \t\t\t\t\t" . ($time - $ttime));
$file="1557394027.json";

$rawData = json_decode(file_get_contents($file),true);
foreach ($rawData as $one) {
    $image=[];
 foreach($one['img'] as $value){
     echo $value."<br>";
    }
}*/
$idProducts='14-9';
$idProduct= explode("-", $idProducts);
$id=$idProduct[0];
$marketPlaceId=$idProduct[1];
echo $id;
echo $marketPlaceId;







