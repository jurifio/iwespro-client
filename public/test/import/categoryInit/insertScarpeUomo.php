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
    var_dump($ninetyNineMonkey->categoryManager->categories()->nestedSet()->getDescendantsByNodeId(1));
}catch (\Throwable $e){
    var_dump($e);
}

$sly = new CSlugify();
$categorie=[];
echo '------------------------------------------<br>';
$categorie['$donna'] = 2;
$categorie['$uomo'] = 3;
$categorie['$bambino'] = 4;

echo '------------Uomo-------------------------<br>';
$categorie['$scarpe_uomo'] = $scarpe_uomo =  $cm->categories()->add('calzature','Calzature',$categorie['$uomo']);

echo '------------Espadrillas-------------------------<br>';
$categorie['$Espadrillas'] = $Espadrillas = $cm->categories()->add('espadrillas','Espadrillas',$scarpe_uomo);

echo '------------Infradito-------------------------<br>';
$categorie['$infradito'] = $infradito = $cm->categories()->add('infradito','Infradito',$scarpe_uomo);

echo '------------Mocassini-------------------------<br>';
$categorie['$mocassini'] = $mocassini = $cm->categories()->add('mocassini','Mocassini',$scarpe_uomo);

echo '------------Pantofole-------------------------<br>';
$categorie['$pantofole'] = $pantofole = $cm->categories()->add('pantofole','Pantofole',$scarpe_uomo);
$categorie['$pantofole_basso'] = $pantofole_basso = $cm->categories()->add('senza-fibbia','Senza Fibbia',$pantofole);
$categorie['$pantofole_medio'] = $pantofole_medio = $cm->categories()->add('con-fibbia','Con Fibbia',$pantofole);

echo '------------Sandali-------------------------<br>';
$categorie['$sandali'] = $sandali = $cm->categories()->add('sandali','Sandali',$scarpe_uomo);

echo '------------Sneakers-------------------------<br>';
$categorie['$sneakers'] = $sneakers = $cm->categories()->add('sneakers','Sneakers',$scarpe_uomo);
$categorie['$sneakers_basso'] = $sneakers_basso = $cm->categories()->add('basse','Basse',$sneakers);
$categorie['$sneakers_medio'] = $sneakers_medio = $cm->categories()->add('alte','Alte',$sneakers);
$categorie['$sneakers_slip'] = $sneakers_slip = $cm->categories()->add('slip-on','Slip on',$sneakers);
$categorie['$sneakers_running'] = $sneakers_running = $cm->categories()->add('running','Running',$sneakers);

echo '------------Stivaletti-------------------------<br>';
$categorie['$stivaletti'] = $stivaletti = $cm->categories()->add('stivaletti','Stivaletti',$scarpe_uomo);

echo '------------Stivali-------------------------<br>';
$categorie['$stivali_zeppe'] = $stivali = $cm->categories()->add('stivali','Stivali',$scarpe_uomo);

echo '------------Stringate-------------------------<br>';
$categorie['$stringate'] = $stringate = $cm->categories()->add('stringate','Stringate',$scarpe_uomo);

var_dump($categorie);


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