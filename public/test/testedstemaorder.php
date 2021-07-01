<?php
require '../../iwesStatic.php';
$orderLine=\Monkey::app()->repoFactory->create('OrderLine')->findOneBy(['id'=>1,'orderId'=>494113]);
$shop=\Monkey::app()->repoFactory->create('Shop')->findOneBy(['id'=>1]);
$dirtyProduct=\Monkey::app()->repoFactory->create('DirtyProduct')->findOneBy(['productId'=>$orderLine->productId,'productVariantId'=>$orderLine->productVariantId]);
$dirtySku=\Monkey::app()->repoFactory->create('DirtySku')->findOneBy(['dirtyProductId'=>$dirtyProduct->id,'productSizeId'=>$orderLine->productSizeId]);
$codiceNegozio='0'.$dirtySku->storeHouseId;
$lenCodiceNegozio=strlen($codiceNegozio);
$defCodiceNegozio=$codiceNegozio.str_repeat(' ',2-$lenCodiceNegozio);
$codiceArticolo=trim($dirtyProduct->extId);
$lenCodiceArticolo=strlen($codiceArticolo);
$defCodiceArticolo=$codiceArticolo.str_repeat(' ',10-$lenCodiceArticolo);
$variante=trim($dirtyProduct->var);
$lenVariante=strlen(trim($variante));
$defVariante=$variante.str_repeat(' ',9-$lenVariante);
$defAnno=str_repeat(' ',2);
$defCosto=str_repeat(' ',9);
$defStagione=str_repeat(' ',1);
$taglia=trim($dirtySku->size);
$lenTaglia=strlen($taglia);
$defTaglia=$taglia.str_repeat(' ',4-$lenTaglia);
$defBarcode='000000000000';
$defCausale='VE';
$defData=(new DateTime())->format('ymd');
$defDataNew=(new DateTime())->format('ymd_his');
$defBolla=str_repeat(' ',12);
$defneg=str_repeat(' ',2);
$realizzo=$orderLine->activePrice*1000;
$lenRealizzo=strlen($realizzo);
$defRealizzo=$realizzo.str_repeat(' ',9 - $lenRealizzo);
$defCommesso=str_repeat(' ',6);
$defPrefisso='CLI';
$defCliente=str_repeat(' ',6);
$listino=$orderLine->fullPrice * 1000;
$lenListino=strlen($listino);
$defListino=$listino.str_repeat(' ',9-$lenListino);
$defIva='22';
$defSegno='+';
$defQuantita='0001';
$defFiller=str_repeat(' ',25);
$flag='0';
$orderLineString=$defCodiceNegozio.$defCodiceArticolo.$defVariante.$defAnno.$defStagione.$defCosto.$defTaglia.$defBarcode.$defCausale.$defData.$defBolla.$defRealizzo.$defneg.$defCommesso.$defPrefisso.$defCliente.$defListino.$defIva.$defSegno.$defQuantita.$defFiller.$flag;
$name=$shop->name;
if(ENV=='prod') {
    $directory='/home/iwespro/public_html/client/public/media/productsync/'.$name.'/export/';

}else{
    $directory='/media/sf_sites/iwespro/client/public/media/productync/'.$name.'/export/';
}
$fp = fopen($directory.$orderLine->orderId.'-'.$defDataNew.'.csv','w');
fwrite($fp, $orderLineString);
fclose($fp);