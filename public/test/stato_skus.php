<?php
require "../../iwesStatic.php";

$statuses = $ninetyNineMonkey->cfg()->fetch('miscellaneous','productStatus');
$shops = [1=>'cartechini',8=>"girardi",9=>"piccolecanaglie",3=>	"dellamartira",4=>"epperò", 5=>"gioielleriacartechini", 6=>"mataloni", 7=>"uomoedonnain"];

$query = "SELECT * FROM ProductSize";
$sizes = $ninetyNineMonkey->dbAdapter->query($query, [])->fetchAll();
$rightSizes = [];
foreach ($sizes as $key => $size) {
    $rightSizes[$size['id']] = $size['name'];
}

if(isset($_GET['shop'])) {
    $query = "SELECT ds.shopId, concat(dp.productId,'-',dp.productVariantId) as blue, ds.productSizeId,  dp.extId , dp.itemno , dp.var , ds.size, ds.status FROM DirtyProduct dp, DirtySku ds, ProductSize ps
              WHERE ds.dirtyProductId = dp.id and dp.shopId = ? limit 100000";
    $products = $ninetyNineMonkey->dbAdapter->query($query, [$_GET['shop']])->fetchAll();
} else {
    $query = "SELECT ds.shopId, concat(dp.productId,'-',dp.productVariantId) as blue, ds.productSizeId,  dp.extId , dp.itemno , dp.var , ds.size, ds.status FROM DirtyProduct dp, DirtySku ds
              WHERE ds.dirtyProductId = dp.id limit 100000";
    $products = $ninetyNineMonkey->dbAdapter->query($query,[])->fetchAll();
}
echo 'dirty';
echo 'tutti '.count($products).'<br>';

$rows = [];

$row = [];
$file = fopen('stato_skus.csv','w');

$row[]= 'shop';
$row[]= 'id blueseal';
$row[]= 'size Id';
$row[]= 'id esterno';
$row[]= 'itemno';
$row[]= 'var';
$row[]= 'size';
$row[]= 'stato';

fwrite($file,implode(';',$row)."\n");
$rows[] = implode(';',$row);
$errors = 0;
$ok = 0;
foreach($products as $product){
    try {
        $row = [];
        $row[] = $shops[$product['shopId']];
        $row[] = empty($product['blue']) ? 'NO MATCH' : $product['blue'];
        $row[] = isset($product['productSizeId']) ? $rightSizes[$product['productSizeId']] : 'NO SIZE';
        $row[] = $product['extId'];
        $row[] = $product['itemno'];
        $row[] = $product['var'];
        $row[] = $product['size'];
        $row[] = $product['status'];

        fwrite($file, implode(';', $row) . "\n");
        $rows[] = implode(';', $row);
        $ok ++;
    }catch(Exception $e){
        $errors++;
    }
}
fflush($file);
fclose($file);

echo 'esportati '.$ok.'<br>';
echo 'error '.$errors.'<br>';
echo '<a href="stato_skus.csv">scarica</a><br>';