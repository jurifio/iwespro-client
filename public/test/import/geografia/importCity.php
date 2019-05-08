<?php
ini_set("display_errors",1);
error_reporting(~0);

require "../../BlueSeal.php";

use bamboo\core\db\pandaorm\entities\CEntityManager;

$ninetyNineMonkey = new BlueSeal('BlueSeal','cartechinishop','/data/www/redpanda');
$ninetyNineMonkey->enableDebugging();

$entries = array();

$file = "Comuni.csv";
$log = "comuni.log";
/** @var CEntityManager $em */
$em = $ninetyNineMonkey->entityManagerFactory->create('City');

$startFrom = 0;
$i = 0;
$w = fopen($log,'w');
fputs($w,"\nSTART");
$f  = fopen($file, 'r');
$ids = [];
while (!feof($f)){
    $line = fgets($f);

    $i++;
    //set_time_limit(8);
    var_dump('---gogo---');

    if($i <= $startFrom) continue;
    $entry = preg_split('/[;]/', $line);

    $city = $em->getEmptyEntity();
    try{
        $provinceExternalId = (int) $entry[4];

        if(!isset($id[$provinceExternalId])){
            $ids[$provinceExternalId] = $ninetyNineMonkey->dbAdapter->query("SELECT id FROM Province where externalId = ?",array($provinceExternalId))->fetch()['id'];
        }

        $city->provinceId = $ids[$provinceExternalId];
        $city->fiscalCode = trim($entry[11]);
        $city->name = trim($entry[12]);
        $city->population = (int) str_replace('.','',$entry[21]);


        $id = $em->insert($city);
        var_dump('---done---');
        fputs($w,"\n fatto: ".$id.' - '.$city->name);
    }catch (\Throwable $e){
        fputs($w, "\nerrore linea: ".$line);
        ob_start();
        var_dump($e);
        $buffer = ob_get_clean();
        fputs($w, "\neccezione: ".$buffer);
        var_dump('errore linea',$line);
        var_dump('errore oggettp',$city);
        var_dump($e);
        die();
    }
}
fputs($w,"\nEND");
fclose($w);
fclose($f);
