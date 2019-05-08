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
$categorie['abbigliamento'] = $abb_donna = $cm->categories()->add('abbigliamento', 'Abbigliamento', $categorie['$donna']);

echo '------------Abiti-------------------------<br>';
$categorie['abiti'] = $abiti = $cm->categories()->add('abiti', 'Abiti', $abb_donna);
$categorie['abiti_da_giorno'] = $abiti_giorno = $cm->categories()->add('da-giorno', 'Da Giorno', $abiti);
$categorie['abiti_da_sera'] = $abiti_sera = $cm->categories()->add('da-sera', 'Da Sera', $abiti);
$categorie['abiti_midi'] = $abiti_midi = $cm->categories()->add('midi', 'Midi', $abiti);
$categorie['abiti_mini'] = $abiti_mini = $cm->categories()->add('mini', 'Mini', $abiti);

echo '------------Abiti Lunghi-------------------------<br>';
$categorie['abiti_lunghi'] = $abiti_lunghi = $cm->categories()->add('abiti-lunghi', 'Abiti Lunghu', $abb_donna);
$categorie['abl_da_giorno'] = $abiti_lunghi_giorno = $cm->categories()->add('da-giorno', 'Da Giorno', $abiti_lunghi);
$categorie['abl_da_sera'] = $abiti_lunghi_sera = $cm->categories()->add('da-sera', 'Da Sera', $abiti_lunghi);

echo '------------Body-------------------------<br>';
$categorie['body'] = $body = $cm->categories()->add('body', 'Body', $abb_donna);
echo '------------Calze-------------------------<br>';
$categorie['calze'] = $calze = $cm->categories()->add('calze', 'Calze', $abb_donna);

echo '------------Calzini-------------------------<br>';
$categorie['calzini'] = $calzini = $cm->categories()->add('calzini', 'Calzini', $abb_donna);
$categorie['calzini_corti'] = $calzini = $cm->categories()->add('da-giorno', 'Da Giorno', $calzini);
$categorie['calzini_lunghi'] = $ankelBoots_basso = $cm->categories()->add('da-sera', 'Da Sera', $calzini);
$categorie['calzini_sopra_ginocchio'] = $ankelBoots_basso = $cm->categories()->add('da-sera', 'Da Sera', $calzini);

echo '------------Camicie-------------------------<br>';
$categorie['camicie'][] = $camicie = $cm->categories()->add('camicie', 'Camicie', $abb_donna);
$categorie['camicie'][] = $cm->categories()->add('in-cotone', 'In Cotone', $camicie);
$categorie['camicie'][] = $cm->categories()->add('in-denim', 'In Denim', $camicie);
$categorie['camicie'][] = $cm->categories()->add('in-lana', 'In Lana', $camicie);
$categorie['camicie'][] = $cm->categories()->add('in-seta', 'In Seta', $camicie);
$categorie['camicie'][] = $cm->categories()->add('altro', 'Altro', $camicie);

echo '------------Capispalla-------------------------<br>';
$categorie['Capispalla'][] = $Capispalla = $cm->categories()->add('calzini', 'Calzini', $abb_donna);
$categorie['Capispalla'][] = $cm->categories()->add('cappotti', 'Cappotti', $Capispalla);
$categorie['Capispalla'][] = $cm->categories()->add('giacconi', 'Giacconi', $Capispalla);
$categorie['Capispalla'][] = $cm->categories()->add('giubbotti', 'Giubbotti', $Capispalla);
$categorie['Capispalla'][] = $cm->categories()->add('trench', 'Trench', $Capispalla);
$categorie['Capispalla'][] = $cm->categories()->add('mantelle', 'Mantelle', $Capispalla);
$categorie['Capispalla'][] = $cm->categories()->add('soprabiti', 'Soprabiti', $Capispalla);

echo '------------Giacche-------------------------<br>';
$categorie['Giacche'][] = $Capispalla = $cm->categories()->add('giacche', 'Giacche', $abb_donna);
echo '------------Giubbini-------------------------<br>';
$categorie['Giubbini'][] = $giubbini = $cm->categories()->add('giubbini', 'Giubbini', $abb_donna);

echo '------------Costumi da Bagno-------------------------<br>';
$categorie['costumi'][] = $costumi = $cm->categories()->add('costumi-da-bagno', 'Costumi da Bagno', $abb_donna);
$categorie['costumi'][] = $cm->categories()->add('bikini', 'Bikini', $costumi);
$categorie['costumi'][] = $cm->categories()->add('interi', 'Interi', $costumi);
$categorie['costumi'][] = $cm->categories()->add('teli-da-mare', 'Teli da Mare', $costumi);

echo '------------Felpe-------------------------<br>';
$categorie['felpe'][] = $felpe= $cm->categories()->add('felpe', 'Felpe', $abb_donna);
$categorie['felpe'][] = $cm->categories()->add('con-cappuccio', 'Con Cappuccio', $felpe);
$categorie['felpe'][] = $cm->categories()->add('con-zip', 'Con Zip', $felpe);
$categorie['felpe'][] = $cm->categories()->add('girocollo', 'Girocollo', $felpe);

echo '------------Gonne-------------------------<br>';
$categorie['Gonne'][] = $Gonne= $cm->categories()->add('felpe', 'Felpe', $abb_donna);
$categorie['Gonne'][] = $cm->categories()->add('da-giorno', 'Da Giorni', $Gonne);
$categorie['Gonne'][] = $cm->categories()->add('da-notte', 'Da Notte', $Gonne);
$categorie['Gonne'][] = $cm->categories()->add('maxi', 'Maxi', $Gonne);
$categorie['Gonne'][] = $cm->categories()->add('midi', 'Midi', $Gonne);
$categorie['Gonne'][] = $cm->categories()->add('mini', 'Mini', $Gonne);

echo '------------Jeans-------------------------<br>';
$categorie['Jeans'][] = $jeans = $cm->categories()->add('jeans', 'Jeans', $abb_donna);
$categorie['Jeans'][] = $cm->categories()->add('a-sigaretta', 'A Sigaretta', $jeans);
$categorie['Jeans'][] = $cm->categories()->add('a-zampa', 'A Zampa', $jeans);
$categorie['Jeans'][] = $cm->categories()->add('corti', 'Corti', $jeans);
$categorie['Jeans'][] = $cm->categories()->add('skinny', 'Skinny', $jeans);
$categorie['Jeans'][] = $cm->categories()->add('boyfriend', 'Boyfirend', $jeans);
$categorie['Jeans'][] = $cm->categories()->add('loose-fit', 'Loose Fit', $jeans);
$categorie['Jeans'][] = $cm->categories()->add('cropped', 'Cropped', $jeans);



echo '------------Leggings-------------------------<br>';
$categorie['Leggings'][] = $leggings= $cm->categories()->add('leggings', 'Leggings', $abb_donna);
echo '------------Lingerie-------------------------<br>';
$categorie['Lingerie'][] = $lingerie= $cm->categories()->add('lingerie', 'Lingerie', $abb_donna);
$categorie['Lingerie'][] = $cm->categories()->add('body', 'Body', $lingerie);
$categorie['Lingerie'][] = $cm->categories()->add('bustier', 'Bustier', $lingerie);
$categorie['Lingerie'][] = $cm->categories()->add('camicie-da-notte', 'Camicie da Notte', $lingerie);
$categorie['Lingerie'][] = $cm->categories()->add('pigiami', 'Pigiami', $lingerie);
$categorie['Lingerie'][] = $cm->categories()->add('coordinati', 'Coordinati', $lingerie);
$categorie['Lingerie'][] = $cm->categories()->add('culottes', 'Culottes', $lingerie);
$categorie['Lingerie'][] = $cm->categories()->add('guepiere', 'Guepiere', $lingerie);
$categorie['Lingerie'][] = $cm->categories()->add('magie-intime', 'Maglie Intime', $lingerie);
$categorie['Lingerie'][] = $cm->categories()->add('perizoma', 'Perizoma', $lingerie);
$categorie['Lingerie'][] = $cm->categories()->add('loungewear', 'Loungewear', $lingerie);
$categorie['Lingerie'][] = $cm->categories()->add('reggiseni', 'Reggiseni', $lingerie);
$categorie['Lingerie'][] = $cm->categories()->add('set', 'Set', $lingerie);
$categorie['Lingerie'][] = $cm->categories()->add('slip', 'Slip', $lingerie);

echo '------------Maglieria-------------------------<br>';
$categorie['Maglieria'][] = $Maglieria= $cm->categories()->add('maglieria', 'Maglieria', $abb_donna);
$categorie['Maglieria'][] = $cm->categories()->add('cardigan', 'Cardigan', $Maglieria);
$categorie['Maglieria'][] = $cm->categories()->add('collo-alto', 'Collo Alto', $Maglieria);
$categorie['Maglieria'][] = $cm->categories()->add('maglie', 'Maglie', $Maglieria);

echo '------------Pantaloni-------------------------<br>';
$categorie['Pantaloni'][] = $Pantaloni= $cm->categories()->add('pantaloni', 'Pantaloni', $abb_donna);
$categorie['Pantaloni'][] = $cm->categories()->add('a-sigaretta', 'A Sigaretta', $Pantaloni);
$categorie['Pantaloni'][] = $cm->categories()->add('a-zampa', 'A Zampa', $Pantaloni);
$categorie['Pantaloni'][] = $cm->categories()->add('activewear', 'Activewear', $Pantaloni);
$categorie['Pantaloni'][] = $cm->categories()->add('ampi', 'Ampi', $Pantaloni);
$categorie['Pantaloni'][] = $cm->categories()->add('corti', 'Corti', $Pantaloni);
$categorie['Pantaloni'][] = $cm->categories()->add('in-pelle', 'In Pelle', $Pantaloni);
echo '------------Pelliccie-------------------------<br>';
$categorie['Pelliccie'][] = $Pelliccie= $cm->categories()->add('pelliccie', 'Pelliccie', $abb_donna);
echo '------------Piumini-------------------------<br>';
$categorie['Pantaloni'][] = $piumini= $cm->categories()->add('piumini', 'Piumini', $abb_donna);
echo '------------Polo-------------------------<br>';
$categorie['Polo'][] = $polo= $cm->categories()->add('polo', 'Polo', $abb_donna);
$categorie['Polo'][] = $cm->categories()->add('maniche-corte', 'Maniche Corte', $polo);
$categorie['Polo'][] = $cm->categories()->add('maniche-lunghe', 'Maniche Lunghe', $polo);

echo '------------T-shirt-------------------------<br>';
$categorie['tshirt'][] = $tshirt = $cm->categories()->add('t-shirt', 'T-Shirt', $abb_donna);
$categorie['tshirt'][] = $cm->categories()->add('activewear', 'Activewear', $tshirt);
$categorie['tshirt'][] = $cm->categories()->add('maniche-corte', 'Maniche Corte', $tshirt);
$categorie['tshirt'][] = $cm->categories()->add('maniche-lunghe', 'Maniche Lunghe', $tshirt);

echo '------------Top-------------------------<br>';
$categorie['top'][] = $top = $cm->categories()->add('top', 'Top', $abb_donna);
$categorie['top'][] = $cm->categories()->add('activewear', 'Activewear', $top);
$categorie['top'][] = $cm->categories()->add('corti', 'Corti', $top);
$categorie['top'][] = $cm->categories()->add('maniche-corte', 'Maniche Corte', $top);
$categorie['top'][] = $cm->categories()->add('maniche-lunghe', 'Maniche Lunghe', $top);
$categorie['top'][] = $cm->categories()->add('senza-maniche', 'Senza Maniche', $top);


echo '------------Tute-------------------------<br>';
$categorie['tute'][] = $tute= $cm->categories()->add('tute', 'Tute', $abb_donna);
$categorie['tute'][] = $cm->categories()->add('corte', 'Corte', $top);
$categorie['tute'][] = $cm->categories()->add('lunghe', 'Lunghe', $top);

var_dump($categorie);


$var = $cm->categories()->nestedSet()->getDescendantsByNodeId(1);
var_dump($var);

