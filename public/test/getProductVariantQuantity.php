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
               dst.qty as qty,
              concat( ifnull(dp.extId, ''), '-', ifnull(ds.extSkuId, '')) AS externalId
               from DirtyProduct dp 
              
               join DirtyProductExtend dpe on dp.id =dpe.dirtyProductId
               join DirtySku  ds on dp.id = ds.dirtyProductId 
                join DirtySkuHasStoreHouse dst on dp.id=dst.dirtyProductId AND dst.shopId=".$shopId."
                join Storehouse st on dst.storeHouseId=st.id  
                join ProductSize ps on dst.productSizeId=ps.id where dst.shopId=".$shopId." AND dp.productId=".$productId."  and dp.productVariantId!=".$productVariantId." 
             
                 group BY dst.shopId,dp.productId,dp.productVariantId Order BY concat(dp.productId,'-',dp.productVariantId,st.name) asc     
  ";
$datone = [];
$i = 0;
$resultProduct = \Monkey::app()->dbAdapter->query($sql,[])->fetchAll();
foreach ($resultProduct as $res) {
    $product = $productRepo->findOneBy(['id' => $res['productId'],'productVariantId' => $res['productVariantId']]);
    $imagePhoto = 'https://cdn.iwes.it/'.$product->productBrand->slug.'/'.$res['productId'].'-'.$res['productVariantId'].'-001-281.jpg';
    $ch = curl_init($imagePhoto);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($code == 200) {
        $imagePhoto = 'https://cdn.iwes.it/'.$product->productBrand->slug.'/'.$res['productId'].'-'.$res['productVariantId'].'-001-281.jpg';
    } else {
        $imagePhoto = 'https://cdn.iwes.it/dummy/bs-dummy-16-9-281.png';
    }
    curl_close($ch);






    $datone[] = ['store' => $res['storeHouse'],'color' => $res['color'],'size' => $res['productSizeId'],'qty' => $res['qty'],'imagePhoto' => $imagePhoto];
    $i++;
}






echo  json_encode($datone);

