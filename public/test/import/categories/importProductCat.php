<?php
ini_set("display_errors",1);
error_reporting(~0);

require "/data/www/redpanda/htdocs/cartechinishop/BlueSeal.php";



$ninetyNineMonkey = new BlueSeal('BlueSeal','cartechinishop','/data/www/redpanda');
$ninetyNineMonkey->enableDebugging();

use bamboo\core\db\pandaorm\adapter\CMySQLAdapter;

/**
 * @var $db CMySQLAdapter
 */
$db = $ninetyNineMonkey->dbAdapter;

$categories = $db->query("SELECT * FROM cartechinishop.ProductCategory group by title",array())->fetchAll();

$f  = fopen('mag_product_tipi.csv', 'r');
while ($line = fgetcsv($f)) {
    //Foreign csv got some errors, so we're fixing them. Basically it's not a proper a csv...
    $name = strtolower($line[4]);
    $name = str_replace(" ","_", $name);
    $name = str_replace("/","_",$name);

    foreach($categories as $key=>$val){
        if($name == $val['title']){
            try {
                $query = "insert into ProductHasProductCategory values({$line[0]},{$line[1]},{$val['id']})";
                $db->query($query, array());
                var_dump('fatto');
                var_dump($query);
            }catch (Exception $e){
               var_dump('fail', $query);
               var_dump($e);
            }
        }

    }

}