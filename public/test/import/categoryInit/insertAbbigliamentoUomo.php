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
$categorie['abbigliamento'] = $abiti_uomo = $cm->categories()->add('abbigliamento', 'Abbigliamento', $categorie['$uomo']);

echo '------------abiti-------------------------<br>';
$categorie['abiti'][] = $abiti = $cm->categories()->add('abiti', 'Abiti', $abiti_uomo);
$categorie['abiti'][] = $cm->categories()->add('classici', 'Classici', $abiti);
$categorie['abiti'][] = $cm->categories()->add('da-sera-e-smoking', 'Da Sera e Smoking', $abiti);
$categorie['abiti'][] = $cm->categories()->add('doppiopetto', 'Doppiopetto', $abiti);
$categorie['abiti'][] = $cm->categories()->add('monopetto', 'Monopetto', $abiti);

echo '------------Camicie-------------------------<br>';
$categorie['camicie'][] = $Camicie = $cm->categories()->add('camicie', 'Camicie', $abiti_uomo);
$categorie['camicie'][] = $cm->categories()->add('casual', 'Casual', $Camicie);
$categorie['camicie'][] = $cm->categories()->add('classic', 'Classic', $Camicie);
$categorie['camicie'][] = $cm->categories()->add('da-sera', 'Da Sera', $Camicie);
$categorie['camicie'][] = $cm->categories()->add('in-denim', 'In Denim', $Camicie);
$categorie['camicie'][] = $cm->categories()->add('maniche-corte', 'Maniche Corte', $Camicie);
$categorie['camicie'][] = $cm->categories()->add('stampate', 'Stampate', $Camicie);
$categorie['camicie'][] = $cm->categories()->add('tinta-unita', 'Tinta Unita', $Camicie);

echo '------------Capispalla-------------------------<br>';
$categorie['capispalla'][] = $Camicie = $cm->categories()->add('capispalla', 'Capispalla', $abiti_uomo);
$categorie['capispalla'][] = $cm->categories()->add('cappotti', 'Cappotti', $Camicie);
$categorie['capispalla'][] = $cm->categories()->add('giacconi', 'Giacconi', $Camicie);
$categorie['capispalla'][] = $cm->categories()->add('giubbotti', 'Giubbotti', $Camicie);
$categorie['capispalla'][] = $cm->categories()->add('trench', 'Trench', $Camicie);
$categorie['capispalla'][] = $cm->categories()->add('mantelle', 'Mantelle', $Camicie);
$categorie['capispalla'][] = $cm->categories()->add('soprabiti', 'Soprabiti', $Camicie);

echo '------------Costumi da bagno-------------------------<br>';
$categorie['costumi'][] = $costumi = $cm->categories()->add('costumi-da-bagno', 'Costumi da bagno', $abiti_uomo);
$categorie['costumi'][] = $cm->categories()->add('boxer', 'Boxer', $costumi);
$categorie['costumi'][] = $cm->categories()->add('slip', 'Slip', $costumi);
$categorie['costumi'][] = $cm->categories()->add('teli-da-mare', 'Teli Da Mare', $costumi);

echo '------------Felpe-------------------------<br>';
$categorie['felpe'][] = $felpe = $cm->categories()->add('felpe', 'Felpe', $abiti_uomo);
$categorie['felpe'][] = $cm->categories()->add('con-cappuccio', 'Con Cappuccio', $felpe);
$categorie['felpe'][] = $cm->categories()->add('con-zip', 'Con Zip', $felpe);
$categorie['felpe'][] = $cm->categories()->add('girocollo', 'Girocollo', $felpe);

echo '------------Giacche-------------------------<br>';
$categorie['giacche'][] = $giacche = $cm->categories()->add('giacche', 'Giacche', $abiti_uomo);
$categorie['giacche'][] = $cm->categories()->add('casual', 'Casual', $giacche);
$categorie['giacche'][] = $cm->categories()->add('classic', 'Classic', $giacche);
$categorie['giacche'][] = $cm->categories()->add('da-sera', 'Da Sera', $giacche);
$categorie['giacche'][] = $cm->categories()->add('doppiopetto', 'Doppiopetto', $giacche);
$categorie['giacche'][] = $cm->categories()->add('monopetto', 'Monopetto', $giacche);
$categorie['giacche'][] = $cm->categories()->add('in-pelle', 'In Pelle', $giacche);

echo '------------Gilet-------------------------<br>';
$categorie['gilet'][] = $gilet = $cm->categories()->add('gilet', 'Gilet', $abiti_uomo);

echo '------------Gonne-------------------------<br>';
$categorie['gonne'][] = $gilet = $cm->categories()->add('gonne', 'Gonne', $abiti_uomo);

echo '------------Intimo-------------------------<br>';
$categorie['intimo'][] = $giacche = $cm->categories()->add('intimo', 'Intimo', $abiti_uomo);
$categorie['intimo'][] = $cm->categories()->add('body', 'Body', $giacche);
$categorie['intimo'][] = $cm->categories()->add('boxer', 'Boxer', $giacche);
$categorie['intimo'][] = $cm->categories()->add('canotte', 'Canotte', $giacche);
$categorie['intimo'][] = $cm->categories()->add('maglie-intime', 'Maglie Intime', $giacche);
$categorie['intimo'][] = $cm->categories()->add('pigiami', 'Pigiami', $giacche);
$categorie['intimo'][] = $cm->categories()->add('slip', 'Slip', $giacche);
$categorie['intimo'][] = $cm->categories()->add('t-shirt-intime', 'T-Shirt Intime', $giacche);

echo '------------Jeans-------------------------<br>';
$categorie['Jeans'][] = $Pantaloni= $cm->categories()->add('jeans', 'Jeans', $abiti_uomo);
$categorie['Jeans'][] = $cm->categories()->add('a-sigaretta', 'A Sigaretta', $Pantaloni);
$categorie['Jeans'][] = $cm->categories()->add('a-zampa', 'A Zampa', $Pantaloni);
$categorie['Jeans'][] = $cm->categories()->add('corti', 'Corti', $Pantaloni);
$categorie['Jeans'][] = $cm->categories()->add('skinny', 'Skinny', $Pantaloni);
$categorie['Jeans'][] = $cm->categories()->add('boyfriend', 'Boyfriend', $Pantaloni);

echo '------------Maglieria-------------------------<br>';
$categorie['Maglieria'][] = $Maglieria= $cm->categories()->add('maglieria', 'Maglieria', $abiti_uomo);
$categorie['Maglieria'][] = $cm->categories()->add('cardigan', 'Cardigan', $Maglieria);
$categorie['Maglieria'][] = $cm->categories()->add('collo-alto', 'Collo Alto', $Maglieria);
$categorie['Maglieria'][] = $cm->categories()->add('giacche', 'Giacche', $Maglieria);
$categorie['Maglieria'][] = $cm->categories()->add('girocollo', 'Girocollo', $Maglieria);
$categorie['Maglieria'][] = $cm->categories()->add('scollo-a-v', 'Scollo a V', $Maglieria);
$categorie['Maglieria'][] = $cm->categories()->add('gilet', 'Gilet', $Maglieria);

echo '------------Pantaloni-------------------------<br>';
$categorie['Pantaloni'][] = $Pantaloni= $cm->categories()->add('pantaloni', 'Pantaloni', $abiti_uomo);
$categorie['Pantaloni'][] = $cm->categories()->add('activewear', 'Activewear', $Pantaloni);
$categorie['Pantaloni'][] = $cm->categories()->add('classic', 'Classic', $Pantaloni);
$categorie['Pantaloni'][] = $cm->categories()->add('calsual', 'Casual', $Pantaloni);
$categorie['Pantaloni'][] = $cm->categories()->add('in-pelle', 'In Pelle', $Pantaloni);
$categorie['Pantaloni'][] = $cm->categories()->add('jogging', 'Jogging', $Pantaloni);
$categorie['Pantaloni'][] = $cm->categories()->add('leggings', 'Leggings', $Pantaloni);

echo '------------Pelliccie e Shearling-------------------------<br>';
$categorie['pelliccie'][] = $Pantaloni= $cm->categories()->add('pelliccie-e-shearling', 'Pelliccie e Shearling', $abiti_uomo);

echo '------------piumini-------------------------<br>';
$categorie['piumini'][] = $Pantaloni= $cm->categories()->add('piumini', 'Piumini', $abiti_uomo);

echo '------------Polo-------------------------<br>';
$categorie['Polo'][] = $Pantaloni= $cm->categories()->add('polo', 'Polo', $abiti_uomo);

echo '------------salopette-------------------------<br>';
$categorie['salopette'][] = $Pantaloni= $cm->categories()->add('salopette', 'Salopette', $abiti_uomo);

echo '------------Shorts-------------------------<br>';
$categorie['Shorts'][] = $Pantaloni= $cm->categories()->add('shorts', 'Shorts', $abiti_uomo);
$categorie['Shorts'][] = $cm->categories()->add('activewear', 'ActiveWear', $Pantaloni);
$categorie['Shorts'][] = $cm->categories()->add('bermuda', 'Bermuda', $Pantaloni);
$categorie['Shorts'][] = $cm->categories()->add('casual', 'Casual', $Pantaloni);
$categorie['Shorts'][] = $cm->categories()->add('classic', 'Classic', $Pantaloni);
$categorie['Shorts'][] = $cm->categories()->add('in-denim', 'In Denim', $Pantaloni);
$categorie['Shorts'][] = $cm->categories()->add('in-pelle', 'In Pelle', $Pantaloni);

echo '------------T-shirt-------------------------<br>';
$categorie['tshirt'][] = $tshirt = $cm->categories()->add('t-shirt', 'T-Shirt', $abiti_uomo);
$categorie['tshirt'][] = $cm->categories()->add('activewear', 'Activewear', $tshirt);
$categorie['tshirt'][] = $cm->categories()->add('maniche-corte', 'Maniche Corte', $tshirt);
$categorie['tshirt'][] = $cm->categories()->add('maniche-lunghe', 'Maniche Lunghe', $tshirt);
$categorie['tshirt'][] = $cm->categories()->add('senza-maniche', 'Senza Maniche', $tshirt);

echo '------------Tank Top-------------------------<br>';
$categorie['tank-top'][] = $tshirt = $cm->categories()->add('tank-top', 'Tank Top', $abiti_uomo);
echo '------------Tute-------------------------<br>';
$categorie['tute'][] = $tshirt = $cm->categories()->add('tute', 'Tute', $abiti_uomo);


var_dump($categorie);


$var = $cm->categories()->nestedSet()->getDescendantsByNodeId(1);
var_dump($var);

