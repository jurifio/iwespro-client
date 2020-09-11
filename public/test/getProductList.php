<?php
require '../../iwesStatic.php';
$shootingBookingRepo=\Monkey::app()->repoFactory->create('ShootingBooking');
$shootingRepo=\Monkey::app()->repoFactory->create('Shooting');
$shootingDocumentRepo=\Monkey::app()->repoFactory->create('Document');
$userRepo=\Monkey::app()->repoFactory->create('User');
if($_GET['shopId']){
    $shopId=$_GET['shopId'];
}



$sql = "SELECT
  `p`.`id`                                             AS `id`,
  `p`.`productVariantId`                               AS `productVariantId`,
  concat(`p`.`id`, '-', `p`.`productVariantId`)        AS `code`,
  `pb`.`name`                                          AS `brand`,
  concat(`p`.`itemno`, ' # ', `pv`.`name`)             AS `cpf`,
  `s`.`id`                                             AS `shopId`,
  `s`.`title`                                          AS `shop`,
  concat(phs.shootingId)                               AS shooting,
  concat(doc.number)                                   AS doc_number,
  `p`.`creationDate`                                   AS `creationDate`,
  concat(ifnull(p.externalId, ''), '-', ifnull(dp.extId, ''), '-', ifnull(ds.extSkuId, '')) AS externalId,
  `pss`.`name`                                         AS `status`,
   `PS`.`name` as season,
    `p`.id as qty  
FROM `Product` `p`
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
    ON p.productVariantId = phs.productVariantId AND p.id = phs.productId where 1=1 and s.id=".$shopId." and `p`.`productSeasonId` in (32,33,34)
ORDER BY `p`.`creationDate` DESC LIMIT 10
               ";
$data=[];
$i=0;
$resultProduct=\Monkey::app()->dbAdapter->query($sql,[])->fetchAll();
foreach($resultProduct as $res) {
   $data[$i]=['productId'=>$res['id'],'productVariantId'=>$res['productVariantId'],'cpf'=>$res['cpf'],'brand'=>$res['brand'],'season'=>$res['season']];
   $i++;
}
echo json_encode($data);


