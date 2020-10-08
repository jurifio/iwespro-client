<?php

use bamboo\domain\repositories\CProductHasShootingRepo;

require '../../iwesStatic.php';

if($_GET['productId']){
    $productId=$_GET['productId'];
}
if($_GET['productVariantId']){
    $productVariantId=$_GET['productVariantId'];
}
if($_GET['shootingId']){
    $shootingId=$_GET['shootingId'];
}
$productsInformation[]=[$productId.'-'.$productVariantId,'noSize'.'-'.$productId.'-'.$productVariantId,'noQty'.'-'.$productId.'-'.$productVariantId];

$data='1';
$i=0;
$string=$productId.'-'.$productVariantId;
$productsIds=[$productId.'-'.$productVariantId];
/** @var CProductHasShootingRepo $pHsRepo */
$pHsRepo = \Monkey::app()->repoFactory->create('ProductHasShooting');

$association = $pHsRepo->associateNewProductsToShooting($productsIds, $shootingId, $productsInformation);


echo json_encode($data);


