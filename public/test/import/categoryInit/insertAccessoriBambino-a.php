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



echo '------------Bambino-------------------------<br>';
//$categorie['Accessori'] = $accessori_bambino = $cm->categories()->add('accessori', 'Accessori', $categorie['$bambino']);

//$abiti = $cm->categories()->add('accessori-capelli', 'Accessori Capelli', $accessori_bambino );
$accessori_bambino = 673;
$abiti = $cm->categories()->add('borse', 'Borse', $accessori_bambino );
 $abiti = $cm->categories()->add('calze', 'Calze', $accessori_bambino );
$abiti = $cm->categories()->add('calzini', 'Calzini', $accessori_bambino );
 $abiti = $cm->categories()->add('capelli', 'Cappelli', $accessori_bambino );
 $abiti = $cm->categories()->add('cinture', 'Cinture', $accessori_bambino );
$abiti = $cm->categories()->add('guanti', 'Guanti', $accessori_bambino );
$abiti = $cm->categories()->add('occhiali', 'Occhiali', $accessori_bambino );
 $abiti = $cm->categories()->add('orologi', 'Orologi', $accessori_bambino );
$abiti = $cm->categories()->add('scirpe-foulard', 'Sciarpe e Foulard', $accessori_bambino );
 $abiti = $cm->categories()->add('teli-mare', 'Teli Mare', $accessori_bambino );

echo '------------Bambina-------------------------<br>';
$categorie['Accessori'] = $accessori_bambina = $cm->categories()->add('accessori', 'Accessori', $categorie['$bambina']);

 $abiti = $cm->categories()->add('accessori-capelli', 'Accessori Capelli', $accessori_bambina );
$abiti = $cm->categories()->add('borse', 'Borse', $accessori_bambina );
 $abiti = $cm->categories()->add('calze', 'Calze', $accessori_bambina );
 $abiti = $cm->categories()->add('calzini', 'Calzini', $accessori_bambina );
 $abiti = $cm->categories()->add('capelli', 'Cappelli', $accessori_bambina );
 $abiti = $cm->categories()->add('cinture', 'Cinture', $accessori_bambina );
 $abiti = $cm->categories()->add('guanti', 'Guanti', $accessori_bambina );
 $abiti = $cm->categories()->add('occhiali', 'Occhiali', $accessori_bambina );
 $abiti = $cm->categories()->add('orologi', 'Orologi', $accessori_bambina );
 $abiti = $cm->categories()->add('scirpe-foulard', 'Sciarpe e Foulard', $accessori_bambina );
 $abiti = $cm->categories()->add('teli-mare', 'Teli Mare', $accessori_bambina );


/************/

var_dump($categorie);


$var = $cm->categories()->nestedSet()->getDescendantsByNodeId(1);
var_dump($var);

