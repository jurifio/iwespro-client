<?php
ini_set("display_errors",1);
error_reporting(~0);

require "../../BlueSeal.php";

use bamboo\core\theming\nestedCategory\CCategoryManager;
use bamboo\core\utils\slugify\CSlugify;

$ninetyNineMonkey = new BlueSeal('BlueSeal','cartechinishop','/data/www/redpanda');
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
//$categorie['$donna'] = $donna =  $cm->categories()->add('donna','Donna'); // 2
//$categorie['$uomo'] = $uomo = $cm->categories()->add('uomo','Uomo'); // 3
//$categorie['$bambino'] = $bambino =  $cm->categories()->add('bambino','Bambino'); //4
//$categorie['$bambina'] = $bambino =  $cm->categories()->add('bambina','Bambina'); //97

$var = $cm->categories()->nestedSet()->getDescendantsByNodeId(1);
var_dump($var);


/*
echo $cm->categories()->add('uomo','Borse')."<br>";
echo $cm->categories()->add('donna','Borse')."<br>";
echo $cm->categories()->add('bambino','Borse')."<br>";
echo $cm->categories()->add('scarpe','Borse',2)."<br>";
echo $cm->categories()->add('scarpe','Borse',3)."<br>";
echo $cm->categories()->add('scarpe','Borse',4)."<br>";
echo $cm->categories()->add('borse','Borse',2)."<br>";
echo $cm->categories()->add('borse','Borse',3)."<br>";
echo $cm->categories()->add('borse','Borse',4)."<br>";

*/