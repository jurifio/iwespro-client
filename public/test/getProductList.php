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
$sqlEan='';

$user=$userRepo->findOneBy(['email'=>$email]);
$resShop=\Monkey::app()->dbAdapter->query('select shopId as shopId from UserHasShop where userId='.$user->id,[])->fetchAll();
foreach($resShop as $shopResult) {
    $shopId=$shopResult['shopId'];
}
if ($shopId == 1) {
    if ($_GET['ean'] != "0") {
        $sqlEan = " and ds.barcode= '" . substr($_GET['ean'],0,-1) . "'";
    }
} elseif ($shopId == 58) {
    if ($_GET['ean'] != "0") {
        $sqlEan = " and ds.barcode like '%" . substr($_GET['ean'],0,7) . "%'";
    }
} else {
    if ($_GET['ean'] != "0") {
        $sqlEan = " and ds.barcode= '" . $_GET['ean'] . "'";
    }

}



$sql = "SELECT
  `p`.`id`                                             AS `id`,
  `p`.`productVariantId`                               AS `productVariantId`,
  concat(`p`.`id`, '-', `p`.`productVariantId`)        AS `code`,
  `pb`.`name`                                          AS `brand`,
  concat(`p`.`itemno`, ' # ', `pv`.`name`)             AS `cpf`,
  `s`.`id`                                             AS `shopId`,
  `s`.`title`                                          AS `shop`,

  `p`.`creationDate`                                   AS `creationDate`,
  concat(ifnull(p.externalId, ''), '-', ifnull(dp.extId, ''), '-', ifnull(ds.extSkuId, '')) AS externalId,
  `pss`.`name`                                         AS `status`,
   `PS`.`name` as season,
    `p`.id as qty  
FROM `Product` `p`

     JOIN `ProductSeason` `PS` on p.productSeasonId = `PS`.`id`
 left join DirtyProduct dp ON p.id=dp.productId AND p.productVariantId=dp.productVariantId
    JOIN DirtySku ds ON dp.id = ds.dirtyProductId
  JOIN `ProductStatus` `pss` ON `pss`.`id` = `p`.`productStatusId`
 
  JOIN `ProductVariant` `pv` ON `p`.`productVariantId` = `pv`.`id`
  JOIN `ProductBrand` `pb` ON `p`.`productBrandId` = `pb`.`id`
  JOIN `Shop` `s` ON `s`.`id` = `dp`.`shopId` where 1=1 and s.id=".$shopId."  ".$sqlEan."  GROUP BY p.id,p.productVariantId,p.externalId
ORDER BY `p`.`creationDate` DESC 

               ";
$data=[];
$i=0;
$resultProduct=\Monkey::app()->dbAdapter->query($sql,[])->fetchAll();
foreach($resultProduct as $res) {
   $data[$i]=['productId'=>$res['id'],'productVariantId'=>$res['productVariantId'],'cpf'=>preg_replace("/[\/\&%#\$]/","_",$res['cpf']),'brand'=>$res['brand'],'season'=>$res['season']];
   $i++;
}
echo json_encode($data);


