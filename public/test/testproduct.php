<?php
ini_set("memory_limit", "2000M");
ini_set('max_execution_time', 0);
$time = microtime(true);
use PDO;

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
/*$order=\Monkey::app()->repoFactory->create('Order')->findOneBy(['id'=>2658920]);
$address=json_decode($order->frozenShippingAddress,true);
echo $address['name'];
*/
$shopRepo = \Monkey::app()->repoFactory->create('Shop')->findBy(['hasEcommerce' => 1]);

foreach ($shopRepo as $value) {

    /********marketplace********/
    $db_host = $value->dbHost;
    $db_name = $value->dbName;
    $db_user = $value->dbUsername;
    $db_pass = $value->dbPassword;
    $shop = $value->id;
    $res="";
    try {

        $db_con = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
        $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $res .= " connessione ok <br>";
    } catch (PDOException $e) {
        $res .= $e->getMessage();
    }
    $productPublicSkuRepo = \Monkey::app()->repoFactory->create('ProductPublicSku');
    $stmtProductPublicSku = $db_con->prepare("select * from ProductPublicSku");
    $stmtProductPublicSku->execute();
    $collectRealQty=[];
    while ($rowProductPublicSku = $stmtProductPublicSku->fetch(PDO::FETCH_ASSOC)) {
        $destStockQty = $rowProductPublicSku['stockQty'];
        $productId=$rowProductPublicSku['productId'];
        $productVariantId=$rowProductPublicSku['productVariantId'];
        $productSizeId=$rowProductPublicSku['productSizeId'];
        $pps=$productPublicSkuRepo->findOneBy(['productId'=>$productId,'productVariantId'=>$productVariantId,'productSizeId'=>$productSizeId]);
       if($pps!=null) {
           $origStockQty = $pps->stockQty;
           $stockQty = $origStockQty - $destStockQty;
           if ($stockQty != 0) {
               echo sprintf("Quantità differente del prodotto %s-%s-%s quantità iwes:%s quantita Destinazione:%s<br>", $productId, $productVariantId, $productSizeId, $origStockQty, $destStockQty);
               array_push($collectRealQty, ['productId' => $productId, 'productVariantId' => $productVariantId, 'productSizeId' => $productSizeId, 'stockQty' => $origStockQty]);
           }
       }else{
           continue;
       }


    }


  /*  foreach ($collectRealQty as $row){
        $stmtUpdateProductPublicSku=$db_con->prepare('UPDATE ProductPublicSku 
                                                                      SET stockQty='.$row['stockQty'].'
                                                                      WHERE productId='.$row['productId'].'
                                                                      AND productVariantId='.$row['productVariantId'].'
                                                                      AND productSizeId='.$row['productSizeId']);
        $stmtUpdateProductPublicSku->execute();
        $this->report("Updating StockQty", "Skus updated: " . $row['productId'] .'-'.$row['productVariantId'].'-'.$row['productSizeId']. ' with quantity: ' . $row['stockQty']. 'for shop:'.$value->name);
    }*/

}
