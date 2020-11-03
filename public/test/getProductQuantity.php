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



$sql=" SELECT  dst.dirtyProductId as dirtyProductId,
               dst.productId as productId, 
               dst.productVariantId as productVariantId, 
               dpe.generalColor as color,
               dst.shopId as shopId, 
               dst.size as productSizeId,
               `st`.`name` AS `storeHouse`,
               dst.qty as qty,
                `s`.`name` as shopName
               from 
                 DirtySkuHasStoreHouse dst 
                 join  DirtyProductExtend dpe on dst.dirtyProductId=dpe.dirtyProductId  
                 join Storehouse st on dst.storeHouseId=st.id  
               left join Shop s on dst.shopId=s.id
                join ProductSize ps on dst.productSizeId=ps.id where  dst.shopId=".$shopId." and   dst.productId='.$productId.' and dst.productVariantId='.$productVariantId.'
                 group BY dst.storeHouseId,dst.qty,dst.size   Order BY ps.name,st.name asc";


$datone = [];
$i = 0;
$resultProduct = \Monkey::app()->dbAdapter->query($sql,[])->fetchAll();
foreach ($resultProduct as $res) {



    $datone[] = ['store' => $res['storeHouse'],'color' => $res['color'],'size' => $res['productSizeId'],'qty' => $res['qty']];
    $i++;
}






echo  json_encode($datone);

