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
$sqlEan = '';
if ($_GET['ean'] != "0") {
    $sqlEan = " and ds.barcode= '" . substr($_GET['ean'],0,-1) . "'";
}
$user = $userRepo->findOneBy(['email' => $email]);
$resShop = \Monkey::app()->dbAdapter->query('select shopId as shopId from UserHasShop where userId=' . $user->id,[])->fetchAll();
foreach ($resShop as $shopResult) {
    $shopId = $shopResult['shopId'];
}


$sql = "SELECT
  `p`.`id`                                             AS `id`,
  `p`.`productVariantId`                               AS `productVariantId`,
  concat(`p`.`id`, '-', `p`.`productVariantId`)        AS `code`,
  `pb`.`name`                                          AS `brand`,
  concat(`p`.`itemno`, ' # ', `pv`.`name`)             AS `cpf`,
  `s`.`id`                                             AS `shopId`,
  `s`.`title`                                          AS `shop`,
   dp.extId                                            as extId,    
   (select group_concat(barcode) FROM ProductSku sku2 WHERE sku2.productId=p.id AND sku2.productVariantId=p.productVariantId  )                           as barcode,  
  concat(phs.shootingId)                               AS shooting,
  concat(doc.number)                                   AS doc_number,
  `p`.`creationDate`                                   AS `creationDate`,
  concat(ifnull(p.externalId, ''), '-', ifnull(dp.extId, ''), '-', ifnull(ds.extSkuId, '')) AS externalId,
  `pss`.`name`                                         AS `status`,
   `PS`.`name` as season,
    `p`.id as qty  
FROM `Product` `p`
    join ProductSku sku ON (`p`.`id`, `p`.`productVariantId`) = (`sku`.`productId`, `sku`.`productVariantId`)
  JOIN `ShopHasProduct` `shp` ON (`p`.`id`, `p`.`productVariantId`) = (`shp`.`productId`, `shp`.`productVariantId`)
     JOIN `ProductSeason` `PS` on p.productSeasonId = `PS`.`id`
  LEFT JOIN (DirtyProduct dp
    JOIN DirtySku ds ON dp.id = ds.dirtyProductId)
    ON (shp.productId,shp.productVariantId,shp.shopId) = (dp.productId,dp.productVariantId,dp.shopId)
  JOIN `ProductStatus` `pss` ON `pss`.`id` = `p`.`productStatusId`
 
  JOIN `ProductVariant` `pv` ON `p`.`productVariantId` = `pv`.`id`
  JOIN `ProductBrand` `pb` ON `p`.`productBrandId` = `pb`.`id`
  JOIN `Shop` `s` ON `s`.`id` = `shp`.`shopId`
  LEFT JOIN (
      ProductHasShooting phs
      JOIN Shooting shoot ON phs.shootingId = shoot.id
      LEFT JOIN Document doc ON shoot.friendDdt = doc.id)
    ON p.productVariantId = phs.productVariantId AND p.id = phs.productId where 1=1 and s.id=".$shopId . $sqlEan . "  GROUP BY p.id, p.productVariantId, p.externalId
    ORDER BY `p`.`creationDate` DESC  ";
$data = [];
$i = 0;
$resultProduct = \Monkey::app()->dbAdapter->query($sql,[])->fetchAll();
foreach ($resultProduct as $res) {
    $product = $productRepo->findOneBy(['id' => $res['id'],'productVariantId' => $res['productVariantId']]);
    $ch = curl_init($imagePhoto);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($code == 200) {
        $imagePhoto = 'https://cdn.iwes.it/'.$product->productBrand->slug.'/'.$res['id'].'-'.$res['productVariantId'].'-001-281.jpg';
    } else {
        $imagePhoto = 'https://cdn.iwes.it/dummy/bs-dummy-16-9-281.png';
    }
    curl_close($ch);

    $data[$i] = ['productId' => $res['id'],'productVariantId' => $res['productVariantId'], 'extId'=>$res['extId'],'cpf' => $res['cpf'],'brand' => $res['brand'],'season' => $res['season'],'imagePhoto' => $imagePhoto];
    $i++;
}






echo json_encode($data);

