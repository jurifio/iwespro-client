<?php
require '../../iwesStatic.php';
$orderLine=\Monkey::app()->repoFactory->create('OrderLine')->findOneBy(['id'=>1,'orderId'=>494113]);
$shop=\Monkey::app()->repoFactory->create('Shop')->findOneBy(['id'=>1]);
$dirtyProduct=\Monkey::app()->repoFactory->create('DirtyProduct')->findOneBy(['productId'=>$orderLine->productId,'productVariantId'=>$orderLine->productVariantId]);
$dirtySku=\Monkey::app()->repoFactory->create('DirtySku')->findOneBy(['dirtyProductId'=>$dirtyProduct->id,'productSizeId'=>$orderLine->productSizeId]);
$codiceNegozio='0'.$dirtySku->storeHouseId;
$lenCodiceNegozio=strlen($codiceNegozio);
$defCodiceNegozio=str_repeat(' ',2-$lenCodiceNegozio).$codiceNegozio;
$codiceArticolo=trim($dirtyProduct->extId);
$lenCodiceArticolo=strlen($codiceArticolo);
$defCodiceArticolo=str_repeat(' ',10-$lenCodiceArticolo).$codiceArticolo;
$variante=trim($dirtyProduct->var);
$lenVariante=strlen($variante);
$defVariante=str_repeat(' ',9-$lenVariante).$variante;
$defASC=str_repeat(' ',10);
$taglia=trim($dirtySku->size);
$lenTaglia=strlen($taglia);
$defTaglia=str_repeat(' ',4-$lenTaglia).$taglia;
$defBarcode='000000000000';
$defCausale='VE';
$defData=(new DateTime())->format('ymd');
$defDataNew=(new DateTime())->format('ymd_his');
$defBolla=str_repeat(' ',14);
$realizzo=$orderLine->activePrice*1000;
$lenRealizzo=strlen($realizzo);
$defRealizzo=str_repeat(' ',9-$lenRealizzo).$realizzo;
$defCommesso=str_repeat(' ',6);
$defPrefisso='CLI';
$listino=$orderLine->fullPrice*1000;
$lenListino=strlen($listino);
$defListino=str_repeat(' ',9-$lenListino).$listino;
$defIva='22';
$defSegno='+';
$defQuantita='0001';
$defFiller=str_repeat(' ',25);
$flag='0';
$orderLineString=$defCodiceNegozio.$defCodiceArticolo.$defVariante.$defASC.$defTaglia.$defBarcode.$defCausale.$defData.$defBolla.$defRealizzo.$defCommesso.$defPrefisso.$defListino.$defIva.$defSegno.$defQuantita.$defFiller.$flag;
$name=$shop->name;
if(ENV=='prod') {
    $directory='/home/iwespro/public_html/client/public/media/productsync/'.$name.'/export/';

}else{
    $directory='/media/sf_sites/iwespro/client/public/media/productync/'.$name.'/export/';
}
$fp = fopen($directory.$orderLine->orderId.'-'.$defDataNew.'.csv','w');
fwrite($fp, $orderLineString);
fclose($fp);