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



echo '------------Donna-------------------------<br>';
$categorie['bijoux'] = $bij_donna = $cm->categories()->add('bijoux', 'Bijoux', $categorie['$donna']);

echo '------------Anelli-------------------------<br>';
$categorie['Anelli'][] = $Gonne= $cm->categories()->add('anelli', 'Anelli', $bij_donna);
echo '------------Anelli-------------------------<br>';
$categorie['Bracciali'][] = $Gonne= $cm->categories()->add('bracciali', 'Bracciali', $bij_donna);
echo '------------Catene-------------------------<br>';
$categorie['Catene'][] = $Gonne= $cm->categories()->add('catene', 'Catene', $bij_donna);
echo '------------Collane-------------------------<br>';
$categorie['Collane'][] = $Gonne= $cm->categories()->add('collane', 'Collane', $bij_donna);
echo '------------Gemelli-------------------------<br>';
$categorie['Gemelli'][] = $Gonne= $cm->categories()->add('gemelli', 'Gemelli', $bij_donna);
echo '------------Orecchini-------------------------<br>';
$categorie['Orecchini'][] = $Gonne= $cm->categories()->add('orecchini', 'Orecchini', $bij_donna);
echo '------------Orologi-------------------------<br>';
$categorie['Orologi'][] = $Gonne= $cm->categories()->add('orologi', 'Orologi', $bij_donna);
echo '------------Spille-------------------------<br>';
$categorie['Spille'][] = $Gonne= $cm->categories()->add('spille', 'Spille', $bij_donna);


var_dump($categorie);


$var = $cm->categories()->nestedSet()->getDescendantsByNodeId(1);
var_dump($var);

