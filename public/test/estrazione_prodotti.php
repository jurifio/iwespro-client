<?php
require "../../iwesStatic.php";;

use bamboo\core\base\CFTPClient;
use bamboo\core\base\CLogger;
use bamboo\core\base\CObjectCollection;

$statuses = $ninetyNineMonkey->cfg()->fetch('miscellaneous','productStatus');
$productRepo = $ninetyNineMonkey->repoFactory->create('Product');

$query = "SELECT distinct id, productVariantId FROM Product limit 20000";
$products = $ninetyNineMonkey->dbAdapter->query($query, [])->fetchAll();
echo 'tutti '.count($products).'<br>';
$rows = [];

$row = [];
$file = fopen('prodotti_con_schede_prodotto.csv','w');

$row[]= 'codice Interno';
$row[]= 'brand';
$row[]= 'cpf';
$row[]= 'variante';
$row[]= 'shops';
$row[]= 'Id esterno';
$row[]= 'status';
$row[]= 'gruppo taglia';
$row[]= 'gruppo colore';
$row[]= 'scheda prodotto';
$row[]= 'nome prodotto';
//$row[]= 'descrizione prodotto';

fwrite($file,implode(';',$row)."\n");
$rows[] = implode(';',$row);
$errors = 0;
$ok = 0;
foreach($products as $product){
    try {
        set_time_limit(5);
        $row = [];
        $product = $productRepo->findOne($product);

        $row[] = $product->id . '-' . $product->productVariantId;
        $row[] = $product->productBrand->name;
        $row[] = $product->itemno;
        $row[] = $product->productVariant->name;
        $shopName = "";
        foreach ($product->shop as $shop) {
            $shopName .= $shop->name . ',';
        }
        $row[] = $shopName;
        $row[] = $product->externalId;
        $row[] = $statuses[$product->status];
        $row[] = !empty($product->productSizeGroup) ? $product->productSizeGroup->name . ' - ' . $product->productSizeGroup->productSizeMacroGroup->name . ' - ' . $product->productSizeGroup->locale : "";
        $row[] = $product->productColorGroup instanceof CObjectCollection && !$product->productColorGroup->isEmpty() ? $product->productColorGroup->getFirst()->name : "";
        $row[] = isset($product->sheetName) ? $product->sheetName : "";
        $row[] = $product->productNameTranslation->getFirst()->name;
        //$row[] = $product->productDescription->getFirst()->description;

        fwrite($file, implode(';', $row) . "\n");
        $rows[] = implode(';', $row);
        $ok ++;
    }catch(Exception $e){
        $errors++;
    }
}
fflush($file);
fclose($file);
/*
$size = filesize(pathinfo($file));
while($size != filesize($file)){
    //do nothing
    $size = filesize($file);
    sleep(2);
}
*/
echo 'esportati '.$ok.'<br>';
echo 'error '.$errors.'<br>';
echo '<a href="prodotti_con_schede_prodotto.csv">scarica</a><br>';
//echo implode('<br>',$rows);