<?php

use bamboo\core\exceptions\BambooException;

require '../../iwesStatic.php';


try {
    $ds=\Monkey::app()->repoFactory->create('DirtySku')->findBy(['shopId'=>61]);
    foreach($ds as $sku){
        if(is_null($sku->checksum)){
        $dirtySku = [];
        $dirtySku['dirtyProductId'] = $sku->dirtyProductId;
        $dirtySku['shopId'] = $sku->shopId;
        $dirtySku['size'] = $sku->size;
        $dirtySku['extSkuId'] = $sku->extSkuId;
        $dirtySku['qty'] = $sku->qty;
        $dirtySku['price'] = $sku->price;
        $dirtySku['value'] = $sku->value;
        $dirtySku['barcode']=$sku->barcode;
        $dirtySku['storeHouseId']=$sku->storeHouseId;
        $checksum=md5(json_encode($dirtySku));
        $sku->checksum=$checksum;
        $sku->update();
        echo 'eseguito linea ' .$sku->id. ' '.$sku->size.' ' .$sku->dirtyProductId;
        } else{
            continue;
        }
    }


} catch (\Throwable $e) {
     echo $e->getMessage();
}


