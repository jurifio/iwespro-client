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
$categorie['accessori'] = $accessori_donna = $cm->categories()->add('accessori', 'Accessori', $categorie['$donna']);

echo '------------per Capelli-------------------------<br>';
$categorie['capelli'][] = $cm->categories()->add('accessori-per-capelli', 'Accessori per Capelli', $accessori_donna);

echo '------------per Scarpe-------------------------<br>';
$categorie['scarpe'][] = $per_scarpe= $cm->categories()->add('accessori-per-scarpe', 'Accessori Per Scarpe', $accessori_donna);
$categorie['scarpe'][] = $cm->categories()->add('stringhe', 'Stringhe', $per_scarpe);
$categorie['scarpe'][] = $cm->categories()->add('sottopiedi', 'Sottopiedi', $per_scarpe);
$categorie['scarpe'][] = $cm->categories()->add('alzatacco', 'Alzatacco', $per_scarpe);
$categorie['scarpe'][] = $cm->categories()->add('lucidi', 'Lucidi', $per_scarpe);
$categorie['scarpe'][] = $cm->categories()->add('tendiscarpe', 'Tendiscarpe', $per_scarpe);
$categorie['scarpe'][] = $cm->categories()->add('forme', 'Forme', $per_scarpe);
$categorie['scarpe'][] = $cm->categories()->add('sacchetti', 'Sacchetti', $per_scarpe);
$categorie['scarpe'][] = $cm->categories()->add('calzari', 'Calzari', $per_scarpe);
$categorie['scarpe'][] = $cm->categories()->add('kit-lustrascarpe', 'Kit Lustrascarpe', $per_scarpe);

echo '------------Ascolt-------------------------<br>';
$categorie['ascolt'][] = $cm->categories()->add('ascolt', 'Ascolt', $accessori_donna);
echo '------------Bretelle-------------------------<br>';
$categorie['bretelle'][] = $cm->categories()->add('bretelle', 'Bretelle', $accessori_donna);
echo '------------Cappelli-------------------------<br>';
$categorie['cappelli'][] = $per_cappelli = $cm->categories()->add('capelli', 'Capelli', $accessori_donna);
$categorie['cappelli'][] = $cm->categories()->add('a-falda-larga', 'A Falda Larga', $per_cappelli);
$categorie['cappelli'][] = $cm->categories()->add('a-visiera', 'A Visiera', $per_cappelli);
$categorie['cappelli'][] = $cm->categories()->add('bandana', 'Bandana', $per_cappelli);
$categorie['cappelli'][] = $cm->categories()->add('basco', 'Basco', $per_cappelli);
$categorie['cappelli'][] = $cm->categories()->add('borsalinio', 'Borsalino', $per_cappelli);
$categorie['cappelli'][] = $cm->categories()->add('cloche', 'Cloche', $per_cappelli);
$categorie['cappelli'][] = $cm->categories()->add('con-pon-pon', 'Con Pon Pon', $per_cappelli);
$categorie['cappelli'][] = $cm->categories()->add('con-valletta', 'Con Valletta', $per_cappelli);
$categorie['cappelli'][] = $cm->categories()->add('coppola', 'Coppola', $per_cappelli);

echo '------------Cinture-------------------------<br>';
$categorie['cinture'][] = $cinture= $cm->categories()->add('cinture', 'Cinture', $accessori_donna);
$categorie['cinture'][] = $cm->categories()->add('a-vita-alta', 'A Vita Alta', $cinture);
$categorie['cinture'][] = $cm->categories()->add('a-vita-bassa', 'A Vita Bassa', $cinture);

echo '------------Guanti-------------------------<br>';
$categorie['guanti'][] = $guanti= $cm->categories()->add('guanti', 'Guanti', $accessori_donna);
$categorie['guanti'][] = $cm->categories()->add('con-dita', 'Con Dita', $guanti);
$categorie['guanti'][] = $cm->categories()->add('senza-dita', 'Senza Dita', $guanti);
$categorie['guanti'][] = $cm->categories()->add('a-manopola', 'A Manopola', $guanti);

echo '------------Ombrelli-------------------------<br>';
$categorie['Ombrelli'][] = $Ombrelli= $cm->categories()->add('ombrelli', 'Ombrelli', $accessori_donna);
$categorie['Ombrelli'][] = $cm->categories()->add('classici', 'Classici', $Ombrelli);
$categorie['Ombrelli'][] = $cm->categories()->add('pieghevoli', 'Pieghevoli', $Ombrelli);

echo '------------Piccola pelletteria-------------------------<br>';
$categorie['pelletteria'][] = $pelletteria= $cm->categories()->add('piccola-pelletteria', 'Piccola Pelletteria', $accessori_donna);
$categorie['pelletteria'][] = $cm->categories()->add('portafogli', 'Portafogli', $pelletteria);
$categorie['pelletteria'][] = $cm->categories()->add('portadocumenti', 'Portadocumenti', $pelletteria);
$categorie['pelletteria'][] = $cm->categories()->add('portaagenda', 'Portaagenda', $pelletteria);
$categorie['pelletteria'][] = $cm->categories()->add('portachiavi', 'Portachiavi', $pelletteria);
$categorie['pelletteria'][] = $cm->categories()->add('porta-ipad-laptop', 'Porta IPad e Laptop', $pelletteria);

echo '------------Scialli-------------------------<br>';
$categorie['scialli'][] = $pelletteria= $cm->categories()->add('scialli', 'Scialli', $accessori_donna);

echo '------------Sciarpe e Foulard-------------------------<br>';
$categorie['sciarpe'][] = $sciarpe= $cm->categories()->add('sciarpe-e-foulard', 'Sciarpe e Foulard', $accessori_donna);
$categorie['sciarpe'][] = $cm->categories()->add('Sciarpe', 'Sciarpe', $pelletteria);
$categorie['sciarpe'][] = $cm->categories()->add('foulard', 'Foulard', $pelletteria);
echo '------------Stole-------------------------<br>';
$categorie['stole'][] = $pelletteria= $cm->categories()->add('stole', 'Stole', $accessori_donna);

echo '------------Valigeria-------------------------<br>';
$categorie['valigeria'][] = $valigeria= $cm->categories()->add('valigeria', 'Valigeria', $accessori_donna);
$categorie['valigeria'][] = $cm->categories()->add('trolley-a-mano', 'Trolley a Mano', $valigeria);
$categorie['valigeria'][] = $cm->categories()->add('trolley-medi', 'Trolley Medi', $valigeria);
$categorie['valigeria'][] = $cm->categories()->add('trolley-grandi', 'Trolley Grandi', $valigeria);
$categorie['valigeria'][] = $cm->categories()->add('borsoni', 'Borsoni', $valigeria);
$categorie['valigeria'][] = $cm->categories()->add('set-trolley', 'Set Trolley', $valigeria);


echo '------------Profumi-------------------------<br>';
$categorie['profumi'] = $profumi = $cm->categories()->add('profumi', 'Profumi', $categorie['$donna']);



var_dump($categorie);


$var = $cm->categories()->nestedSet()->getDescendantsByNodeId(1);
var_dump($var);

