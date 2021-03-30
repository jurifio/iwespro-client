<?php

require '../../iwesStatic.php';
$date= (New \DateTime())->format('Y-m-d-His');
if (ENV == 'dev') {
$fp = fopen('/media/sf_sites/iwespro/aws-token/product_'.$date.'.csv','w');
$nameFile='/media/sf_sites/iwespro/aws-token/product_'.$date.'.csv';
//file_put_contents('/media/sf_sites/iwespro/aws-token/aws-token',json_encode($arraySalt));
}else{
    $fp = fopen('/home/iwespro/public_html/aws-token/product_'.$date.'.txt','w');
    $nameFile='/home/iwespro/public_html/aws-token/product_'.$date.'.txt';
  //  file_put_contents('/home/iwespro/public_html/aws-token/aws-token',json_encode($arraySalt));
}
fputcsv($category_csv, array('sku', 'titolo', 'descrizione', 'colore', 'taglia', 'stagione', 'active', 'date_add', 'date_upd', 'position', 'is_root_category'), ';');
fclose($fp);



