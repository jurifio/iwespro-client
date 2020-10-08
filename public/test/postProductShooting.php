<?php

use bamboo\domain\repositories\CProductHasShootingRepo;

require '../../iwesStatic.php';

if($_POST['productId']){
    $productId=$_POST['productId'];
}
if($_POST['productVariantId']){
    $productVariantId=$_POST['productVariantId'];
}
if($_POST['shootingId']){
    $shootingId=$_POST['shootingId'];
}
$productsInformation[]=[$productId.'-'.$productVariantId,'noSize'.'-'.$productId.'-'.$productVariantId,'noQty'.'-'.$productId.'-'.$productVariantId];

$data='1';
$i=0;
$string=$productId.'-'.$productVariantId;
$productsIds=explode('-',$string);
/** @var CProductHasShootingRepo $pHsRepo */
$pHsRepo = \Monkey::app()->repoFactory->create('ProductHasShooting');

$association = $pHsRepo->associateNewProductsToShooting($productsIds, $shootingId, $productsInformation);


echo json_encode($data);


