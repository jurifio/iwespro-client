<?php

use bamboo\core\exceptions\BambooException;

require '../../iwesStatic.php';


try {
    $dsRepo=\Monkey::app()->repoFactory->create('DirtySku');
    $sql='SELECT id,dirtyProductId,shopId,size,extSkuId,qty,price,`value`,barcode,storeHouseId from DirtySku where `checksum` is null and shopId=61';
    $res=\Monkey::app()->dbAdapter->query($sql,[])->fetchAll();
    $cheksumUpdate=[];
    foreach($res as $rawDirtySku) {
        $dirtySku = [];
        $dirtySku['dirtyProductId'] = $rawDirtySku['dirtyProductId'];
        $dirtySku['shopId'] = $rawDirtySku['shopId'];
        $dirtySku['size'] = $rawDirtySku['size'];
        $dirtySku['extSkuId'] = $rawDirtySku['extSkuId'];
        $dirtySku['qty'] = $rawDirtySku['qty'];
        $dirtySku['price'] = $rawDirtySku['price'];
        $dirtySku['value'] = $rawDirtySku['value'];
        $dirtySku['barcode']=$rawDirtySku['barcode'];
        $dirtySku['storeHouseId']=1;
        $checksum=md5(json_encode($dirtySku));
        $checksumUpdate[]=['id'=>$rawDirtySku['id'],'checksum'=>$checksum];

    }
    foreach ($checksumUpdate as $check){
        $ds=$dsRepo->findOneBy(['id'=>$check['id']]);
        $ds->checksum=$check['checksum'];
        $ds->update();
    }

} catch (\Throwable $e) {
     echo $e->getMessage();
}


