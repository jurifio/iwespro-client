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



$user = $userRepo->findOneBy(['email' => $email]);
$resShop = \Monkey::app()->dbAdapter->query('select shopId as shopId from UserHasShop where userId=' . $user->id,[])->fetchAll();
foreach ($resShop as $shopResult) {
    $shopId = $shopResult['shopId'];
}



$sql=" SELECT  concat(`st`.`name`,'-',`st`.`id`) as storehouse 
               
               from Storehouse st 
                 where  `st`.`shopId`=".$shopId."   Order BY st.id asc";



$resultProduct = \Monkey::app()->dbAdapter->query($sql,[])->fetchAll();
$datone = [];
$dateTwo=[];
$i = 0;
$success=0;
foreach ($resultProduct as $res) {
    $datone[] = ['storeHouse' => $res['storehouse']];
    $success=1;
    $i++;
}
$dateTwo[]=['success'=>$success,'Name'=>$datone];




//echo "{\"success\":1,\"Name\":[{\"storeHouse\":\"Cartechini 1-1\"},{\"storeHouse\":\"Cartechini 2-3\"},{\"storeHouse\":\"Subage-4\"}]}";

echo '{"success":'.$success.',"Name":'. json_encode($datone).'}';

