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



echo '------------Accessori-------------------------<br>';
$categorie['accessori'] = $accessori_uomo = $cm->categories()->add('accessori', 'Accessori', $categorie['$uomo']);

echo '------------per Scarpe-------------------------<br>';
$categorie['scarpe'][] = $per_scarpe= $cm->categories()->add('accessori-per-scarpe', 'Accessori Per Scarpe', $accessori_uomo);
$categorie['scarpe'][] = $cm->categories()->add('stringhe', 'Stringhe', $per_scarpe);
$categorie['scarpe'][] = $cm->categories()->add('sottopiedi', 'Sottopiedi', $per_scarpe);
$categorie['scarpe'][] = $cm->categories()->add('alzatacco', 'Alzatacco', $per_scarpe);
$categorie['scarpe'][] = $cm->categories()->add('lucidi', 'Lucidi', $per_scarpe);
$categorie['scarpe'][] = $cm->categories()->add('tendiscarpe', 'Tendiscarpe', $per_scarpe);
$categorie['scarpe'][] = $cm->categories()->add('forme', 'Forme', $per_scarpe);
$categorie['scarpe'][] = $cm->categories()->add('sacchetti', 'Sacchetti', $per_scarpe);
$categorie['scarpe'][] = $cm->categories()->add('calzanti', 'Calzanti', $per_scarpe);
$categorie['scarpe'][] = $cm->categories()->add('kit-lustrascarpe', 'Kit Lustrascarpe', $per_scarpe);

echo '------------Ascolt-------------------------<br>';
$categorie['ascolt'][] = $cm->categories()->add('ascolt', 'Ascolt', $accessori_uomo);
echo '------------Bretelle-------------------------<br>';
$categorie['bretelle'][] = $cm->categories()->add('bretelle', 'Bretelle', $accessori_uomo);
echo '------------Cappelli-------------------------<br>';
$categorie['cappelli'][] = $per_cappelli = $cm->categories()->add('capelli', 'Capelli', $accessori_uomo);
$categorie['cappelli'][] = $cm->categories()->add('baseball', 'Baseball', $per_cappelli);
$categorie['cappelli'][] = $cm->categories()->add('a-visiera', 'A Visiera', $per_cappelli);
$categorie['cappelli'][] = $cm->categories()->add('bandana', 'Bandana', $per_cappelli);
$categorie['cappelli'][] = $cm->categories()->add('basco', 'Basco', $per_cappelli);
$categorie['cappelli'][] = $cm->categories()->add('berretto', 'Berretto', $per_cappelli);
$categorie['cappelli'][] = $cm->categories()->add('borsalinio', 'Borsalino', $per_cappelli);
$categorie['cappelli'][] = $cm->categories()->add('cloche', 'Cloche', $per_cappelli);
$categorie['cappelli'][] = $cm->categories()->add('con-pon-pon', 'Con Pon Pon', $per_cappelli);
$categorie['cappelli'][] = $cm->categories()->add('visiere', 'Visiere', $per_cappelli);
$categorie['cappelli'][] = $cm->categories()->add('coppola', 'Coppola', $per_cappelli);
$categorie['cappelli'][] = $cm->categories()->add('panama', 'Panama', $per_cappelli);
$categorie['cappelli'][] = $cm->categories()->add('western', 'Western', $per_cappelli);
$categorie['cappelli'][] = $cm->categories()->add('paraorecchi', 'Paraorecchi', $per_cappelli);

echo '------------Cinture-------------------------<br>';
$categorie['cinture'][] = $cinture= $cm->categories()->add('cinture', 'Cinture', $accessori_uomo);
$categorie['cinture'][] = $cm->categories()->add('a-vita-alta', 'A Vita Alta', $cinture);
$categorie['cinture'][] = $cm->categories()->add('a-vita-bassa', 'A Vita Bassa', $cinture);

echo '------------Cravatte-------------------------<br>';
$categorie['cravatte'][] = $guanti= $cm->categories()->add('cravatte', 'Cravatte', $accessori_uomo);
$categorie['cravatte'][] = $cm->categories()->add('strette', 'Strette (5-7cm)', $guanti);
$categorie['cravatte'][] = $cm->categories()->add('classiche', 'Classiche(8-9cm)', $guanti);
$categorie['cravatte'][] = $cm->categories()->add('larghe', 'Larghe (+9cm)', $guanti);
$categorie['cravatte'][] = $cm->categories()->add('maglia', 'Maglia', $guanti);
$categorie['cravatte'][] = $cm->categories()->add('7-pieghe', '7 Pieghe', $guanti);
$categorie['cravatte'][] = $cm->categories()->add('x-long', 'X-Long (165cm)', $guanti);


echo '------------Guanti-------------------------<br>';
$categorie['guanti'][] = $guanti= $cm->categories()->add('guanti', 'Guanti', $accessori_uomo);
$categorie['guanti'][] = $cm->categories()->add('con-dita', 'Con Dita', $guanti);
$categorie['guanti'][] = $cm->categories()->add('senza-dita', 'Senza Dita', $guanti);
$categorie['guanti'][] = $cm->categories()->add('a-manopola', 'A Manopola', $guanti);

echo '------------Ombrelli-------------------------<br>';
$categorie['Ombrelli'][] = $Ombrelli= $cm->categories()->add('ombrelli', 'Ombrelli', $accessori_uomo);
$categorie['Ombrelli'][] = $cm->categories()->add('classici', 'Classici', $Ombrelli);
$categorie['Ombrelli'][] = $cm->categories()->add('pieghevoli', 'Pieghevoli', $Ombrelli);

echo '------------Piccola pelletteria-------------------------<br>';
$categorie['pelletteria'][] = $pelletteria= $cm->categories()->add('piccola-pelletteria', 'Piccola Pelletteria', $accessori_uomo);
$categorie['pelletteria'][] = $cm->categories()->add('portafogli', 'Portafogli', $pelletteria);
$categorie['pelletteria'][] = $cm->categories()->add('portadocumenti', 'Portadocumenti', $pelletteria);
$categorie['pelletteria'][] = $cm->categories()->add('portaagenda', 'Portaagenda', $pelletteria);
$categorie['pelletteria'][] = $cm->categories()->add('portachiavi', 'Portachiavi', $pelletteria);
$categorie['pelletteria'][] = $cm->categories()->add('porta-ipad-laptop', 'Porta IPad e Laptop', $pelletteria);

echo '------------Scialli-------------------------<br>';
$categorie['scialli'][] = $pelletteria= $cm->categories()->add('scialli', 'Scialli', $accessori_uomo);

echo '------------Sciarpe e Foulard-------------------------<br>';
$categorie['sciarpe'][] = $sciarpe= $cm->categories()->add('sciarpe-e-foulard', 'Sciarpe e Foulard', $accessori_uomo);
$categorie['sciarpe'][] = $cm->categories()->add('Sciarpe', 'Sciarpe', $pelletteria);
$categorie['sciarpe'][] = $cm->categories()->add('foulard', 'Foulard', $pelletteria);

echo '------------Valigeria-------------------------<br>';
$categorie['valigeria'][] = $valigeria= $cm->categories()->add('valigeria', 'Valigeria', $accessori_uomo);
$categorie['valigeria'][] = $cm->categories()->add('trolley-a-mano', 'Trolley a Mano', $valigeria);
$categorie['valigeria'][] = $cm->categories()->add('trolley-medi', 'Trolley Medi', $valigeria);
$categorie['valigeria'][] = $cm->categories()->add('trolley-grandi', 'Trolley Grandi', $valigeria);
$categorie['valigeria'][] = $cm->categories()->add('borsoni', 'Borsoni', $valigeria);
$categorie['valigeria'][] = $cm->categories()->add('set-trolley', 'Set Trolley', $valigeria);



var_dump($categorie);


$var = $cm->categories()->nestedSet()->getDescendantsByNodeId(1);
var_dump($var);

