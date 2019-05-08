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
$categorie['$donna'] = 2;
$categorie['$uomo'] = 3;
$categorie['$bambino'] = 4;
$categorie['$bambina'] = 97;



echo '------------Calzature-------------------------<br>';
$categorie['Calzature'] = $calzature_bambina = $cm->categories()->add('calzature', 'Calzature', $categorie['$bambina']);

echo '------------babbuccie-------------------------<br>';
$categorie['babbuccie'][] = $abiti = $cm->categories()->add('babbuccie', 'Babbuccie', $calzature_bambina);
echo '------------mocassini-------------------------<br>';
$categorie['mocassini'][] = $abiti = $cm->categories()->add('mocassini', 'Mocassini', $calzature_bambina);

echo '------------pantofole-------------------------<br>';
$categorie['pantofole'][] = $abiti = $cm->categories()->add('pantofole', 'Pantofole', $calzature_bambina);
$categorie['pantofole'][] = $cm->categories()->add('in-pelle', 'In Pelle', $abiti);
$categorie['pantofole'][] = $cm->categories()->add('in-tessuto', 'In Tessuto', $abiti);

echo '------------sandali-------------------------<br>';
$categorie['sandali'][] = $abiti = $cm->categories()->add('sandali', 'Sandali', $calzature_bambina);

echo '------------sneakers alte-------------------------<br>';
$categorie['sneakers-alte'][] = $abiti = $cm->categories()->add('sneakers-alte', 'Sneakers Alte', $calzature_bambina);
$categorie['sneakers-alte'][] = $cm->categories()->add('con-lacci', 'Con Lacci', $abiti);
$categorie['sneakers-alte'][] = $cm->categories()->add('con-velcro', 'Con Velcro', $abiti);
$categorie['sneakers-alte'][] = $cm->categories()->add('con-zip', 'Con Zip', $abiti);

echo '------------sneakers basse-------------------------<br>';
$categorie['sneakers-basse'][] = $abiti = $cm->categories()->add('sneakers-basse', 'Sneakers Basse', $calzature_bambina);
$categorie['sneakers-basse'][] = $cm->categories()->add('con-lacci', 'Con Lacci', $abiti);
$categorie['sneakers-basse'][] = $cm->categories()->add('con-velcro', 'Con Velcro', $abiti);
$categorie['sneakers-basse'][] = $cm->categories()->add('slip-on', 'Slip On', $abiti);


echo '------------stivali-------------------------<br>';
$categorie['stivali'][] = $abiti = $cm->categories()->add('stivali', 'Stivali', $calzature_bambina);

echo '------------stivaletti-------------------------<br>';
$categorie['stivaletti'][] = $abiti = $cm->categories()->add('stivaletti', 'Stivaletti', $calzature_bambina);

echo '------------stringate-------------------------<br>';
$categorie['stringate'][] = $abiti = $cm->categories()->add('stringate', 'Stringate', $calzature_bambina);

/************/

var_dump($categorie);


$var = $cm->categories()->nestedSet()->getDescendantsByNodeId(1);
var_dump($var);

