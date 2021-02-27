<?php

use bamboo\core\exceptions\BambooException;

ini_set("memory_limit","2000M");
ini_set('max_execution_time',0);
$ttime = microtime(true);
$time = microtime(true);
require '../../iwesStatic.php';
var_dump('Applicazione  \t\t\t\t' . (microtime(true) - $time));
echo 'prova';
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
$sql='SELECT productId,productVariantId,shopId,dateStart,startQuantity,dateEnd,EndQuantity,priceActive,SUM(soldQuantity)AS soldQuantity, SUM(netTotal) AS netTotal
FROM ProductSizeSoldDay  where dateStart <\'2021-02-16 00:00:00\' GROUP BY `day`,`month`,`year`,productId,productVariantId,shopId Order BY dateStart asc';
$res=\Monkey::app()->dbAdapter->query($sql,[])->fetchAll();
$productSoldDayRepo=\Monkey::app()->repoFactory->create('ProductSoldDay');
foreach($res as $result){
    $productSoldDay=$productSoldDayRepo->findOneBy(['productId'=>$result['productId'],'productVariantId'=>$result['productVariantId'],'shopId'=>$result['shopId'],'year'=>$result['year'],'month'=>$result['month'],'day'=>$result['day']]);
    if($productSoldDay){
        continue;
    }else{
        $productSoldDayInsert=$productSoldDayRepo->getEmptyEntity();
        $productSoldDayInsert->productId=$result['productId'];
        $productSoldDayInsert->productVariantId=$result['productVariantId'];
        $productSoldDayInsert->shopId=$result['shopId'];
        $productSoldDayInsert->year=$result['year'];
        $productSoldDayInsert->month=$result['month'];
        $productSoldDayInsert->day=$result['day'];
        $productSoldDayInsert->dateStart=$result['dateStart'];
        $productSoldDayInsert->dateEnd=$result['dateEnd'];
        $productSoldDayInsert->startQuantity=$result['startQuantity'];
        $productSoldDayInsert->endQuantity=$result['endQuantity'];
        $productSoldDayInsert->soldQuantity=$result['soldQuantity'];
        $productSoldDayInsert->priceActive=$result['priceActive'];
        $productSoldDayInsert->netTotal=$result['netTotal'];
        $productSolDayInsert->insert();
    }
}











