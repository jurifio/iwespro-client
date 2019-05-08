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
$categorie['abbigliamento'] = $abbigliamento_bambina = $cm->categories()->add('abbigliamento', 'Abbigliamento', $categorie['$bambina']);

echo '------------abiti-------------------------<br>';
$categorie['abiti'][] = $abiti = $cm->categories()->add('abiti', 'Abiti', $abbigliamento_bambina);
$categorie['abiti'][] = $cm->categories()->add('maniche-corte', 'Maniche Corte', $abiti);
$categorie['abiti'][] = $cm->categories()->add('maniche-lunghe', 'Maniche Lunghe', $abiti);
$categorie['abiti'][] = $cm->categories()->add('senza-maniche', 'Senza Maniche', $abiti);

echo '------------abiti battesimo-------------------------<br>';
$categorie['abitibatt'][] = $abiti = $cm->categories()->add('abiti-da-battesimo', 'Abiti da Battesimo', $abbigliamento_bambina);

echo '------------beachwear-------------------------<br>';
$categorie['beachwear'][] = $abiti = $cm->categories()->add('beachwear', 'Beachwear', $abbigliamento_bambina);
$categorie['beachwear'][] = $cm->categories()->add('slip', 'Slip', $abiti);
$categorie['beachwear'][] = $cm->categories()->add('boxer', 'Boxer', $abiti);
$categorie['beachwear'][] = $cm->categories()->add('interi', 'Interi', $abiti);
$categorie['beachwear'][] = $cm->categories()->add('copricostume', 'Copricostume', $abiti);
$categorie['beachwear'][] = $cm->categories()->add('teli-da-mare', 'Teli da Mare', $abiti);

echo '------------Camicie-------------------------<br>';
$categorie['camicie'][] = $Camicie = $cm->categories()->add('camicie', 'Camicie', $abbigliamento_bambina);
$categorie['camicie'][] = $cm->categories()->add('maniche-corte', 'Maniche Corte', $Camicie);
$categorie['camicie'][] = $cm->categories()->add('maniche-lunghe', 'Maniche Lunghe', $Camicie);
$categorie['camicie'][] = $cm->categories()->add('senza-maniche', 'Senza Maniche', $Camicie);

echo '------------Felpe-------------------------<br>';
$categorie['felpe'][] = $felpe = $cm->categories()->add('felpe', 'Felpe', $abbigliamento_bambina);

echo '------------Giacche-------------------------<br>';
$categorie['giacche'][] = $giacche = $cm->categories()->add('giacche', 'Giacche', $abbigliamento_bambina);

echo '------------Gilet-------------------------<br>';
$categorie['gilet'][] = $gilet = $cm->categories()->add('gilet', 'Gilet', $abbigliamento_bambina);

echo '------------Giubbini-------------------------<br>';
$categorie['giubbini'][] = $gilet = $cm->categories()->add('giubbini', 'Giubbini', $abbigliamento_bambina);

echo '------------Giubbini in Pelle-------------------------<br>';
$categorie['giubbinipelle'][] = $gilet = $cm->categories()->add('giubbini-in-pelle', 'Giubbini in pelle', $abbigliamento_bambina);

echo '------------Gonne-------------------------<br>';
$categorie['gonne'][] = $gilet = $cm->categories()->add('gonne', 'Gonne', $abbigliamento_bambina);

echo '------------jeans-------------------------<br>';
$categorie['jeans'][] = $Camicie = $cm->categories()->add('jeans', 'Jeans', $abbigliamento_bambina);
$categorie['jeans'][] = $cm->categories()->add('giacche', 'Giacche', $Camicie);
$categorie['jeans'][] = $cm->categories()->add('camicie', 'Camicie', $Camicie);
$categorie['jeans'][] = $cm->categories()->add('pantaloni', 'Pantaloni', $Camicie);

echo '------------Maglieria-------------------------<br>';
$categorie['Maglieria'][] = $Maglieria= $cm->categories()->add('maglieria', 'Maglieria', $abbigliamento_bambina);
$categorie['Maglieria'][] = $cm->categories()->add('cardigan', 'Cardigan', $Maglieria);
$categorie['Maglieria'][] = $cm->categories()->add('maglie', 'Maglie', $Maglieria);
$categorie['Maglieria'][] = $cm->categories()->add('canotte', 'Canotte', $Maglieria);

echo '------------Magliette-------------------------<br>';
$categorie['Magliette'][] = $Maglieria= $cm->categories()->add('magliette', 'Magliette', $abbigliamento_bambina);

echo '------------Pantaloni-------------------------<br>';
$categorie['Pantaloni'][] = $Pantaloni= $cm->categories()->add('pantaloni', 'Pantaloni', $abbigliamento_bambina);

echo '------------piumini-------------------------<br>';
$categorie['piumini'][] = $Pantaloni= $cm->categories()->add('piumini', 'Piumini', $abbigliamento_bambina);

echo '------------Polo-------------------------<br>';
$categorie['Polo'][] = $Pantaloni= $cm->categories()->add('polo', 'Polo', $abbigliamento_bambina);
$categorie['Polo'][] = $cm->categories()->add('maniche-corte', 'Maniche Corte', $Pantaloni);
$categorie['Polo'][] = $cm->categories()->add('maniche-lunghe', 'Maniche Lunghe', $Pantaloni);


echo '------------Shorts-------------------------<br>';
$categorie['Shorts'][] = $Pantaloni= $cm->categories()->add('shorts', 'Shorts', $abbigliamento_bambina);

echo '------------T-shirt-------------------------<br>';
$categorie['tshirt'][] = $tshirt = $cm->categories()->add('t-shirt', 'T-Shirt', $abbigliamento_bambina);
$categorie['tshirt'][] = $cm->categories()->add('maniche-corte', 'Maniche Corte', $tshirt);
$categorie['tshirt'][] = $cm->categories()->add('maniche-lunghe', 'Maniche Lunghe', $tshirt);

echo '------------Tute-------------------------<br>';
$categorie['tute'][] = $tshirt = $cm->categories()->add('tute', 'Tute', $abbigliamento_bambina);

echo '------------Tuteine-------------------------<br>';
$categorie['Tuteine'][] = $tshirt = $cm->categories()->add('tuteine', 'Tuteine', $abbigliamento_bambina);

echo '------------Leggings-------------------------<br>';
$categorie['Leggings'][] = $cm->categories()->add('leggings', 'Leggings', $abbigliamento_bambina);

echo '------------Leggings-------------------------<br>';
$categorie['Leggings'][] = $cm->categories()->add('leggings', 'Leggings', $abbigliamento_bambina);

echo '------------Snowear-------------------------<br>';
$categorie['Snowear'][] = $Snowear = $cm->categories()->add('snowear', 'Snowear', $abbigliamento_bambina);
$categorie['Snowear'][] = $cm->categories()->add('salopette', 'Salopette', $Snowear);


/************/

var_dump($categorie);


$var = $cm->categories()->nestedSet()->getDescendantsByNodeId(1);
var_dump($var);

