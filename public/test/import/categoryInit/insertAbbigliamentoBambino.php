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



echo '------------abbigliamento-------------------------<br>';
$categorie['abbigliamento'] = $abbigliamento_bambino = $cm->categories()->add('abbigliamento', 'Abbigliamento', $categorie['$bambino']);

echo '------------abiti-------------------------<br>';
$categorie['abiti'][] = $abiti = $cm->categories()->add('abiti', 'Abiti', $abbigliamento_bambino);
$categorie['abiti'][] = $cm->categories()->add('maniche-corte', 'Maniche Corte', $abiti);
$categorie['abiti'][] = $cm->categories()->add('maniche-lunghe', 'Maniche Lunghe', $abiti);
$categorie['abiti'][] = $cm->categories()->add('senza-maniche', 'Senza Maniche', $abiti);

echo '------------abiti battesimo-------------------------<br>';
$categorie['abitibatt'][] = $abiti = $cm->categories()->add('abiti-da-battesimo', 'Abiti da Battesimo', $abbigliamento_bambino);

echo '------------beachwear-------------------------<br>';
$categorie['beachwear'][] = $abiti = $cm->categories()->add('beachwear', 'Beachwear', $abbigliamento_bambino);
$categorie['beachwear'][] = $cm->categories()->add('slip', 'Slip', $abiti);
$categorie['beachwear'][] = $cm->categories()->add('boxer', 'Boxer', $abiti);

echo '------------Camicie-------------------------<br>';
$categorie['camicie'][] = $Camicie = $cm->categories()->add('camicie', 'Camicie', $abbigliamento_bambino);
$categorie['camicie'][] = $cm->categories()->add('maniche-corte', 'Maniche Corte', $Camicie);
$categorie['camicie'][] = $cm->categories()->add('maniche-lunghe', 'Maniche Lunghe', $Camicie);
$categorie['camicie'][] = $cm->categories()->add('senza-maniche', 'Senza Maniche', $Camicie);

echo '------------Felpe-------------------------<br>';
$categorie['felpe'][] = $felpe = $cm->categories()->add('felpe', 'Felpe', $abbigliamento_bambino);

echo '------------Giacche-------------------------<br>';
$categorie['giacche'][] = $giacche = $cm->categories()->add('giacche', 'Giacche', $abbigliamento_bambino);

echo '------------Gilet-------------------------<br>';
$categorie['gilet'][] = $gilet = $cm->categories()->add('gilet', 'Gilet', $abbigliamento_bambino);

echo '------------jeans-------------------------<br>';
$categorie['jeans'][] = $Camicie = $cm->categories()->add('jeans', 'Jeans', $abbigliamento_bambino);
$categorie['jeans'][] = $cm->categories()->add('giacche', 'Giacche', $Camicie);
$categorie['jeans'][] = $cm->categories()->add('camicie', 'Camicie', $Camicie);
$categorie['jeans'][] = $cm->categories()->add('pantaloni', 'Pantaloni', $Camicie);

echo '------------Maglieria-------------------------<br>';
$categorie['Maglieria'][] = $Maglieria= $cm->categories()->add('maglieria', 'Maglieria', $abbigliamento_bambino);
$categorie['Maglieria'][] = $cm->categories()->add('cardigan', 'Cardigan', $Maglieria);
$categorie['Maglieria'][] = $cm->categories()->add('maglie', 'Maglie', $Maglieria);

echo '------------Magliette-------------------------<br>';
$categorie['Magliette'][] = $Maglieria= $cm->categories()->add('magliette', 'Magliette', $abbigliamento_bambino);

echo '------------Pantaloni-------------------------<br>';
$categorie['Pantaloni'][] = $Pantaloni= $cm->categories()->add('pantaloni', 'Pantaloni', $abbigliamento_bambino);

echo '------------piumini-------------------------<br>';
$categorie['piumini'][] = $Pantaloni= $cm->categories()->add('piumini', 'Piumini', $abbigliamento_bambino);

echo '------------Polo-------------------------<br>';
$categorie['Polo'][] = $Pantaloni= $cm->categories()->add('polo', 'Polo', $abbigliamento_bambino);
$categorie['Polo'][] = $cm->categories()->add('maniche-corte', 'Maniche Corte', $Pantaloni);
$categorie['Polo'][] = $cm->categories()->add('maniche-lunghe', 'Maniche Lunghe', $Pantaloni);


echo '------------Shorts-------------------------<br>';
$categorie['Shorts'][] = $Pantaloni= $cm->categories()->add('shorts', 'Shorts', $abbigliamento_bambino);

echo '------------T-shirt-------------------------<br>';
$categorie['tshirt'][] = $tshirt = $cm->categories()->add('t-shirt', 'T-Shirt', $abbigliamento_bambino);
$categorie['tshirt'][] = $cm->categories()->add('maniche-corte', 'Maniche Corte', $tshirt);
$categorie['tshirt'][] = $cm->categories()->add('maniche-lunghe', 'Maniche Lunghe', $tshirt);

echo '------------Tute-------------------------<br>';
$categorie['tute'][] = $tshirt = $cm->categories()->add('tute', 'Tute', $abbigliamento_bambino);

echo '------------Tuteine-------------------------<br>';
$categorie['Tuteine'][] = $tshirt = $cm->categories()->add('tuteine', 'Tuteine', $abbigliamento_bambino);

echo '------------Leggings-------------------------<br>';
$categorie['Leggings'][] = $cm->categories()->add('leggings', 'Leggings', $abbigliamento_bambino);

echo '------------Leggings-------------------------<br>';
$categorie['Leggings'][] = $cm->categories()->add('leggings', 'Leggings', $abbigliamento_bambino);

echo '------------Snowear-------------------------<br>';
$categorie['Snowear'][] = $Snowear = $cm->categories()->add('snowear', 'Snowear', $abbigliamento_bambino);
$categorie['Snowear'][] = $cm->categories()->add('salopette', 'Salopette', $Snowear);


/************/

var_dump($categorie);


$var = $cm->categories()->nestedSet()->getDescendantsByNodeId(1);
var_dump($var);

