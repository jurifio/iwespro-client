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



echo '------------Borse-------------------------<br>';
$categorie['borse'] = $borse_uomo = $cm->categories()->add('borse', 'Borse', $categorie['$uomo']);

echo '------------Borse a Mano-------------------------<br>';
$categorie['borseamano'][] = $borse_a_mano= $cm->categories()->add('borse-a-mano', 'Borse a Mano', $borse_uomo);
echo '------------Borse a spalla-------------------------<br>';
$categorie['borseaspalla'][] = $borse_a_spalla = $cm->categories()->add('borse-a-spalla', 'Borse a Spalla', $borse_uomo);
echo '------------Borse a tracolla-------------------------<br>';
$categorie['borsetacolla'][] = $borse_a_spalla = $cm->categories()->add('borse-a-tracolla', 'Borse a Tracolla', $borse_uomo);

echo '------------Borse da Lavoro-------------------------<br>';
$categorie['borselavoro'][] = $pochette = $cm->categories()->add('borse-da-lavoro', 'Borse da Lavoro', $borse_uomo);
$categorie['borselavoro'][] = $cm->categories()->add('ventiquattrore', 'Ventiquattrore', $pochette);
$categorie['borselavoro'][] = $cm->categories()->add('quarantottore', 'Quarantottore', $pochette);

echo '------------Marsupi-------------------------<br>';
$categorie['Marsupi'][]  = $cm->categories()->add('marsupi', 'Marsupi', $borse_uomo);

echo '------------Valigie-------------------------<br>';
$categorie['valigie'][]  = $valigie = $cm->categories()->add('valigie', 'Valigie', $borse_uomo);
$categorie['valigie'][] = $cm->categories()->add('borsoni', 'Borsoni', $valigie);
$categorie['valigie'][] = $cm->categories()->add('trolley', 'Trolley', $valigie);
$categorie['valigie'][] = $cm->categories()->add('valigie', 'Valigie', $valigie);


var_dump($categorie);


$var = $cm->categories()->nestedSet()->getDescendantsByNodeId(1);
var_dump($var);

