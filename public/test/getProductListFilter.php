<?php
require '../../iwesStatic.php';
$shootingBookingRepo=\Monkey::app()->repoFactory->create('ShootingBooking');
$shootingRepo=\Monkey::app()->repoFactory->create('Shooting');
$shootingDocumentRepo=\Monkey::app()->repoFactory->create('Document');
$userRepo=\Monkey::app()->repoFactory->create('User');
$productSkuRepo=\Monkey::app()->repoFactory->create('ProductSku');
$productSizeRepo=\Monkey::app()->repoFactory->create('ProductSize');
if($_GET['email']){
    $email=$_GET['email'];
}
$sqlCodeProduct='';
$sqlCpf="";
$sqlBrand="";
$sqlSeason="";

if($_GET['codeProduct']!="0"){
    $sqlCodeProduct=" and concat(p.id,'-',p.productVariantId) like '%".$_GET['codeProduct']."%' ";

}
if($_GET['brand']!="0"){
    $sqlBrand=" and pb.name like '%".$_GET['brand']."%' ";

}
if($_GET['cpf']!="0"){
    $sqlCpf=" and  `p`.`itemno`  like '%".$_GET['cpf']."%' ";

}
if($_GET['season']!="0"){
    $sqlSeason=" and  `PS`.`name` like '%".$_GET['season']."%' ";

}

$user=$userRepo->findOneBy(['email'=>$email]);
$resShop=\Monkey::app()->dbAdapter->query('select shopId as shopId from UserHasShop where userId='.$user->id,[])->fetchAll();
foreach($resShop as $shopResult) {
    $shopId=$shopResult['shopId'];
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
    `p`.qty as qty  
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
    ON p.productVariantId = phs.productVariantId AND p.id = phs.productId where 1=1 and s.id=".$shopId."  ".$sqlCodeProduct.$sqlBrand.$sqlCpf.$sqlSeason."  GROUP BY p.id,p.productVariantId,p.externalId
ORDER BY `p`.`creationDate` 
               ";
$data=[];
$i=0;
$resultProduct=\Monkey::app()->dbAdapter->query($sql,[])->fetchAll();
foreach($resultProduct as $res) {
   $data[$i]=['productId'=>$res['id'],'productVariantId'=>$res['productVariantId'],'cpf'=>preg_replace("/[\/\&%#\$]/","_",$res['cpf']),'brand'=>$res['brand'],'season'=>$res['season']];
   $i++;
}
echo json_encode($data);


