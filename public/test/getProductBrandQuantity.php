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
$findProduct=\Monkey::app()->repoFactory->create('Product')->findOneBy(['id'=>$productId,'productVariantId'=>$productVariantId]);
$productBrand=\Monkey::app()->repoFactory->create('ProductBrand')->findOneBy(['id'=>$findProduct->productBrandId]);
$productBrandId=$productBrand->id;

$user = $userRepo->findOneBy(['email' => $email]);
$resShop = \Monkey::app()->dbAdapter->query('select shopId as shopId from UserHasShop where userId=' . $user->id,[])->fetchAll();
foreach ($resShop as $shopResult) {
    $shopId = $shopResult['shopId'];
}


$sql = "SELECT dp.id as dirtyProductId, 
               dp.productId as productId, 
               dp.productVariantId as productVariantId, 
               dp.extId as extId, 
               dpe.generalColor as color,
               dp.shopId as shopId, 
               ps.name as productSizeId, 
               `st`.`name` as storeHouse,
              concat(`dp`.`itemno`, ' # ', `pv`.`name`)             AS `cpf`,
               dst.qty as qty,
              concat( ifnull(dp.extId, ''), '-', ifnull(ds.extSkuId, '')) AS externalId
               from DirtyProduct dp 
              left join Product p on dp.productId = p.id and dp.productVariantId=p.productVariantId
                   join ProductVariant pv on dp.productVariantId=pv.id
               join DirtyProductExtend dpe on dp.id =dpe.dirtyProductId
               join DirtySku  ds on dp.id = ds.dirtyProductId 
                join DirtySkuHasStoreHouse dst on dp.id=dst.dirtyProductId AND dst.shopId=".$shopId."
                join Storehouse st on dst.storeHouseId=st.id  
                join ProductSize ps on dst.productSizeId=ps.id where dst.shopId=".$shopId." AND dp.productId!=".$productId."  and dp.productVariantId!=".$productVariantId."
                and p.productBrandId=".$productBrandId."  
             
                 group BY dst.shopId,dp.productId,dp.productVariantId Order BY concat(dp.productId,'-',dp.productVariantId,st.name) asc    limit 20 
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






    $datone[] = ['store' => $res['storeHouse'],
        'productSite' => $res['productId'] . '-' . $res['productVariantId'],
        'extId' => $res['extId'],
        'cpf' => preg_replace("/[\/\&%#\$]/","_",$res['cpf']),
        'color' => $res['color'],
        'size' => $res['productSizeId'],
        'qty' => $res['qty'],
        'imagePhoto' => $imagePhoto];
    $i++;
}






echo  json_encode($datone);

