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

echo '------------Donna-------------------------<br>';
$categorie['$scarpe_donna'] = $scarpe_donna =  $cm->categories()->add('calzature','Calzature',$categorie['$donna']);

echo '------------Ankle boots-------------------------<br>';
$categorie['$ankelBoots'] = $ankelBoots = $cm->categories()->add('ankle-boots','Ankle boots',$scarpe_donna);
$categorie['$ankelBoots_flat'] = $ankelBoots_flat = $cm->categories()->add('flat','Flat',$ankelBoots);
$categorie['$ankelBoots_basso'] = $ankelBoots_basso = $cm->categories()->add('tacco-basso','Tacco Basso',$ankelBoots);
$categorie['$ankelBoots_medio'] = $ankelBoots_medio = $cm->categories()->add('tacco-medio','Tacco Medio',$ankelBoots);
$categorie['$ankelBoots_alto'] = $ankelBoots_alto = $cm->categories()->add('tacco-alto','Tacco Alto',$ankelBoots);

echo '------------ballerine-------------------------<br>';
$categorie['$ballerine'] = $ballerine = $cm->categories()->add('ballerine','Ballerine',$scarpe_donna);

echo '------------Decollete-------------------------<br>';
$categorie['$decolte'] = $decolte = $cm->categories()->add('decollete','Déecolleté',$scarpe_donna);
$categorie['$decolte_basso'] = $decolte_basso = $cm->categories()->add('tacco-basso','Tacco Basso',$decolte);
$categorie['$decolte_medio'] = $decolte_medio = $cm->categories()->add('tacco-medio','Tacco Medio',$decolte);
$categorie['$decolte_alto'] = $decolte_alto = $cm->categories()->add('tacco-alto','Tacco Alto',$decolte);
$categorie['$decolte_punta'] = $decolte_punta = $cm->categories()->add('punta-aperta','Punta Aperta',$decolte);
$categorie['$decolte_zeppe'] = $decolte_zeppe = $cm->categories()->add('zeppe','Zeppe',$decolte);

echo '------------Espadrillas-------------------------<br>';
$categorie['$Espadrillas'] = $Espadrillas = $cm->categories()->add('espadrillas','Espadrillas',$scarpe_donna);
$categorie['$Espadrillas_basso'] = $Espadrillas_basso = $cm->categories()->add('tacco-basso','Tacco Basso',$Espadrillas);
$categorie['$Espadrillas_medio'] = $Espadrillas_medio = $cm->categories()->add('tacco-medio','Tacco Medio',$Espadrillas);
$categorie['$Espadrillas_alto'] = $Espadrillas_alto = $cm->categories()->add('tacco-alto','Tacco Alto',$Espadrillas);
$categorie['$Espadrillas_zeppe'] = $Espadrillas_zeppe = $cm->categories()->add('zeppe','Zeppe',$decolte);

echo '------------Infradito-------------------------<br>';
$categorie['$infradito'] = $infradito = $cm->categories()->add('infradito','Infradito',$scarpe_donna);
$categorie['$infradito_flat'] = $infradito_flat = $cm->categories()->add('flat','Flat',$infradito);
$categorie['$infradito_basso'] = $infradito_basso = $cm->categories()->add('tacco-basso','Tacco Basso',$infradito);
$categorie['$infradito_medio'] = $infradito_medio = $cm->categories()->add('tacco-medio','Tacco Medio',$infradito);
$categorie['$infradito_alto'] = $infradito_alto = $cm->categories()->add('tacco-alto','Tacco Alto',$infradito);
$categorie['$infradito_zeppe'] = $infradito_zeppe = $cm->categories()->add('zeppe','Zeppe',$infradito);

echo '------------Mocassini-------------------------<br>';
$categorie['$mocassini'] = $mocassini = $cm->categories()->add('mocassini','Mocassini',$scarpe_donna);
$categorie['$mocassini_flat'] = $mocassini_flat = $cm->categories()->add('flat','Flat',$mocassini);
$categorie['$mocassini_basso'] = $mocassini_basso = $cm->categories()->add('tacco-basso','Tacco Basso',$mocassini);
$categorie['$mocassini_medio'] = $mocassini_medio = $cm->categories()->add('tacco-medio','Tacco Medio',$mocassini);
$categorie['$mocassini_alto'] = $mocassini_alto = $cm->categories()->add('tacco-alto','Tacco Alto',$mocassini);
$categorie['$mocassini_zeppe'] = $mocassini_zeppe = $cm->categories()->add('zeppe','Zeppe',$mocassini);

echo '------------Mule-------------------------<br>';
$categorie['$mule'] = $mule = $cm->categories()->add('mule','Mule',$scarpe_donna);
$categorie['$mule_basso'] = $mule_basso = $cm->categories()->add('tacco-basso','Tacco Basso',$mule);
$categorie['$mule_medio'] = $mule_medio = $cm->categories()->add('tacco-medio','Tacco Medio',$mule);
$categorie['$mule_alto'] = $mule_alto = $cm->categories()->add('tacco-alto','Tacco Alto',$mule);
$categorie['$mule_punta'] = $mule_punta = $cm->categories()->add('punta-aperta','Punta Aperta',$mule);
$categorie['$mule_zeppe'] = $mule_zeppe = $cm->categories()->add('zeppe','Zeppe',$mule);

echo '------------Pantofole-------------------------<br>';
$categorie['$pantofole'] = $pantofole = $cm->categories()->add('pantofole','Pantofole',$scarpe_donna);
$categorie['$pantofole_basso'] = $pantofole_basso = $cm->categories()->add('tacco-basso','Tacco Basso',$pantofole);
$categorie['$pantofole_medio'] = $pantofole_medio = $cm->categories()->add('tacco-medio','Tacco Medio',$pantofole);
$categorie['$pantofole_alto'] = $pantofole_alto = $cm->categories()->add('tacco-alto','Tacco Alto',$pantofole);
$categorie['$pantofole_zeppe'] = $pantofole_zeppe = $cm->categories()->add('zeppe','Zeppe',$pantofole);

echo '------------Sandali-------------------------<br>';
$categorie['$sandali'] = $sandali = $cm->categories()->add('sandali','Sandali',$scarpe_donna);
$categorie['$sandali_basso'] = $sandali_basso = $cm->categories()->add('tacco-basso','Tacco Basso',$sandali);
$categorie['$sandali_medio'] = $sandali_medio = $cm->categories()->add('tacco-medio','Tacco Medio',$sandali);
$categorie['$sandali_alto'] = $sandali_alto = $cm->categories()->add('tacco-alto','Tacco Alto',$sandali);
$categorie['$sandali_zeppe'] = $sandali_zeppe = $cm->categories()->add('zeppe','Zeppe',$sandali);

echo '------------Sneakers alte-------------------------<br>';
$categorie['$sneakers_alte'] = $sneakers_alte = $cm->categories()->add('sneakers-alte','Sneakers Alte',$scarpe_donna);

echo '------------Sneakers basse-------------------------<br>';
$categorie['$sneakers_basse'] = $sneakers_basse = $cm->categories()->add('sneakers-basse','Sneakers Basse',$scarpe_donna);
$categorie['$sneakers_basso'] = $sneakers_basso = $cm->categories()->add('tacco-basso','Tacco Basso',$sneakers_basse);
$categorie['$sneakers_medio'] = $sneakers_medio = $cm->categories()->add('tacco-medio','Tacco Medio',$sneakers_basse);
$categorie['$sneakers_alto'] = $sneakers_alto = $cm->categories()->add('tacco-alto','Tacco Alto',$sneakers_basse);
$categorie['$sneakers_zeppe'] = $sneakers_zeppe = $cm->categories()->add('zeppe','Zeppe',$sneakers_basse);
$categorie['$sneakers_slip'] = $sneakers_slip = $cm->categories()->add('slip-on','Slip on',$sneakers_basse);
$categorie['$sneakers_running'] = $sneakers_running = $cm->categories()->add('running','Running',$sneakers_basse);

echo '------------Stivaletti-------------------------<br>';
$categorie['$stivaletti'] = $stivaletti = $cm->categories()->add('stivaletti','Stivaletti',$scarpe_donna);
$categorie['$stivaletti_basso'] = $stivaletti_basso = $cm->categories()->add('tacco-basso','Tacco Basso',$stivaletti);
$categorie['$stivaletti_medio'] = $stivaletti_medio = $cm->categories()->add('tacco-medio','Tacco Medio',$stivaletti);
$categorie['$stivaletti_alto'] = $stivaletti_alto = $cm->categories()->add('tacco-alto','Tacco Alto',$stivaletti);
$categorie['$stivaletti_punta'] = $stivaletti_punta = $cm->categories()->add('punta-aperta','Punta Aperta',$stivaletti);
$categorie['$stivaletti_zeppe'] = $stivaletti_zeppe = $cm->categories()->add('zeppe','Zeppe',$stivaletti);

echo '------------Stivali-------------------------<br>';
$categorie['$stivali_zeppe'] = $stivali = $cm->categories()->add('stivali','Stivali',$scarpe_donna);
$categorie['$stivali_basso'] = $stivali_basso = $cm->categories()->add('tacco-basso','Tacco Basso',$stivali);
$categorie['$stivali_medio'] = $stivali_medio = $cm->categories()->add('tacco-medio','Tacco Medio',$stivali);
$categorie['$stivali_alto'] = $stivali_alto = $cm->categories()->add('tacco-alto','Tacco Alto',$stivali);
$categorie['$stivali_ginocchio'] = $stivali_ginocchio = $cm->categories()->add('sopra-al-ginocchio','Sopra al ginocchio',$stivali);
$categorie['$stivali_zeppe'] = $stivali_zeppe = $cm->categories()->add('zeppe','Zeppe',$stivali);

echo '------------Stringate-------------------------<br>';
$categorie['$stringate'] = $stringate = $cm->categories()->add('stringate','Stringate',$scarpe_donna);
$categorie['$stringate_basso'] = $stringate_basso = $cm->categories()->add('tacco-basso','Tacco Basso',$stringate);
$categorie['$stringate_medio'] = $stringate_medio = $cm->categories()->add('tacco-medio','Tacco Medio',$stringate);
$categorie['$stringate_alto'] = $stringate_alto = $cm->categories()->add('tacco-alto','Tacco Alto',$stringate);
$categorie['$stringate_zeppe'] = $stringate_zeppe = $cm->categories()->add('zeppe','Zeppe',$stringate);
var_dump($categorie);


$var = $cm->categories()->nestedSet()->getDescendantsByNodeId(1);
var_dump($var);


/*
echo $cm->categories()->add('uomo','Borse')."<br>";
echo $cm->categories()->add('donna','Borse')."<br>";
echo $cm->categories()->add('bambino','Borse')."<br>";
echo $cm->categories()->add('scarpe','Borse',2)."<br>";
echo $cm->categories()->add('scarpe','Borse',3)."<br>";
echo $cm->categories()->add('scarpe','Borse',4)."<br>";
echo $cm->categories()->add('borse','Borse',2)."<br>";
echo $cm->categories()->add('borse','Borse',3)."<br>";
echo $cm->categories()->add('borse','Borse',4)."<br>";

*/