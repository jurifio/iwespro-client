<?php

require '../../iwesStatic.php';
$shootingBookingRepo = \Monkey::app()->repoFactory->create('ShootingBooking');
$shootingRepo = \Monkey::app()->repoFactory->create('Shooting');
$shootingDocumentRepo = \Monkey::app()->repoFactory->create('Document');
$userRepo = \Monkey::app()->repoFactory->create('User');
$productSkuRepo = \Monkey::app()->repoFactory->create('ProductSku');
$productSizeRepo = \Monkey::app()->repoFactory->create('ProductSize');
$productRepo = \Monkey::app()->repoFactory->create('Product');
$productBrandRepo=\Monkey::app()->repoFactory->create('ProductBrand');
if ($_GET['email']) {
    $email = $_GET['email'];
}
if ($_GET['productId']) {
    $productId = $_GET['productId'];
}
if ($_GET['productVariantId']) {
    $productVariantId = $_GET['productVariantId'];
}


$user = $userRepo->findOneBy(['email' => $email]);
$resShop = \Monkey::app()->dbAdapter->query('select shopId as shopId from UserHasShop where userId=' . $user->id,[])->fetchAll();
foreach ($resShop as $shopResult) {
    $shopId = $shopResult['shopId'];
}


$sql = "SELECT dp.id as dirtyProductId, 
               dp.productId as productId, 
               dp.productVariantId as productVariantId, 
               dpe.generalColor as color,
               dp.shopId as shopId, 
               ps.name as productSizeId, 
               `st`.`name` as storeHouse,
               dst.qty as qty
               from DirtyProduct dp 
              
               join DirtyProductExtend dpe on dp.id =dpe.dirtyProductId
               join DirtySku  ds on dp.id = ds.dirtyProductId 
                join DirtySkuHasStoreHouse dst on dp.id=dst.dirtyProductId
                join Storehouse st on dst.storeHouseId=st.id  
                join ProductSize ps on dst.productSizeId=ps.id where dp.shopId=1
                and dp.productId=".$productId." and dp.productVariantId=".$productVariantId." 
                 group BY dst.shopId,dst.qty        
  ";
$datone = [];
$i = 0;
$resultProduct = \Monkey::app()->dbAdapter->query($sql,[])->fetchAll();
foreach ($resultProduct as $res) {



    array_push($datone , ['store' => $res['storeHouse'],'color' => $res['color'],'size' => $res['productSizeId'],'qty' => $res['qty']]);
    $i++;
}






echo  json_encode($datone);

