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
$categorie['$bambina'] = 97;



echo '------------Borse-------------------------<br>';
$categorie['borse'] = $borse_donna = $cm->categories()->add('borse', 'Borse', $categorie['$donna']);

echo '------------Beauty Case-------------------------<br>';
$categorie['beauty'][] = $tute= $cm->categories()->add('beauty-case', 'Beauty Case', $borse_donna);

echo '------------Borse a Mano-------------------------<br>';
$categorie['borseamano'][] = $borse_a_mano= $cm->categories()->add('borse-a-mano', 'Borse a Mano', $borse_donna);
$categorie['borseamano'][] = $cm->categories()->add('icon', 'Icon', $borse_a_mano);
$categorie['borseamano'][] = $cm->categories()->add('cartella', 'Cartella', $borse_a_mano);
echo '------------Borse a spalla-------------------------<br>';
$categorie['borseaspalla'][] = $borse_a_spalla = $cm->categories()->add('borse-a-spalla', 'Borse a Spalla', $borse_donna);
$categorie['borseaspalla'][] = $cm->categories()->add('da-sera', 'Da Sera', $borse_a_spalla);
$categorie['borseaspalla'][] = $cm->categories()->add('tracolla', 'Tracolla', $borse_a_spalla);

echo '------------Borse shopping-------------------------<br>';
$categorie['borseshopping'][]  = $cm->categories()->add('borse-shopping', 'Borse Shopping', $borse_donna);

echo '------------Pochette-------------------------<br>';
$categorie['pochette'][] = $pochette = $cm->categories()->add('pochette', 'Pochette', $borse_donna);
$categorie['pochette'][] = $cm->categories()->add('buste', 'Buste', $pochette);
$categorie['pochette'][] = $cm->categories()->add('da-sera', 'Da Sera', $pochette);
$categorie['pochette'][] = $cm->categories()->add('rigide', 'Rigide', $pochette);

echo '------------Valigie-------------------------<br>';
$categorie['valigie'][]  = $cm->categories()->add('valigie', 'Valigie', $borse_donna);
echo '------------Zaini-------------------------<br>';
$categorie['zaini'][]  = $cm->categories()->add('zaini', 'Zaini', $borse_donna);


var_dump($categorie);


$var = $cm->categories()->nestedSet()->getDescendantsByNodeId(1);
var_dump($var);

