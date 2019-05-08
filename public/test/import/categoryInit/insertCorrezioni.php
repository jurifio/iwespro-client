<?php
ini_set("display_errors",1);
error_reporting(~0);

require "../../BlueSeal.php";

use bamboo\core\theming\nestedCategory\CCategoryManager;
use bamboo\core\utils\slugify\CSlugify;

$ninetyNineMonkey = new BlueSeal('BlueSeal','pickyshop','/data/www/redpanda');
$ninetyNineMonkey->enableDebugging();
/** @var CCategoryManager $cm */
$cm = $ninetyNineMonkey->categoryManager;
try{
    //var_dump($ninetyNineMonkey->categoryManager->categories()->nestedSet()->getDescendantsByNodeId(1));
}catch (\Throwable $e){
    var_dump($e);
}

$sly = new CSlugify();
$categorie=[];
echo '------------------------------------------<br>';
$categorie['$donna'] = 2;
$categorie['$uomo'] = 3;
$categorie['$bambino'] = 4;
$categorie['$bambina'] = 97;



echo '------------1153-------------------------<br>';
//$categorie['bambina'] = $giletDonna = $cm->categories()->add('cappotti', 'Cappotti', 533);
//$categorie['bambina'] = $giletDonna = $cm->categories()->add('cappotti', 'Cappotti', 533);



var_dump($categorie);


$var = $cm->categories()->nestedSet()->getDescendantsByNodeId(3);
var_dump($var);

