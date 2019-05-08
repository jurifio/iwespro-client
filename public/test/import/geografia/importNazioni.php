<?php
ini_set("display_errors",1);
error_reporting(~0);

require "../../BlueSeal.php";

use bamboo\core\db\pandaorm\entities\CEntityManager;

$ninetyNineMonkey = new BlueSeal('BlueSeal','cartechinishop','/data/www/redpanda');
$ninetyNineMonkey->enableDebugging();

$entries = array();

$file = "countryInfo.txt";

/** @var CEntityManager $em */
$em = $ninetyNineMonkey->entityManagerFactory->create('Country');


$f  = fopen($file, 'r');
while ($line = fgets($f)) {
    //Foreign csv got some errors, so we're fixing them. Basically it's not a proper a csv...
    var_dump('---gogo---');
    if($line[0] == '#') continue;
    $entry = preg_split('/[\t,]/', $line);
    $country = $em->getEmptyEntity();

    try{
        $country->ISO = $entry[0];
        $country->ISO3 = $entry[1];
        $country->name = $entry[4];
        $country->shippingCost = 10;
        $country->capital = $entry[5];
        $country->population = $entry[7];
        $country->continent = $entry[8];
        $country->tld = $entry[9];
        $country->currencyCode = $entry[10];
        $country->currency = $entry[11];
        $country->phone = $entry[12];
        $country->postCodeFormat = $entry[13];
        $country->postCodeRegex = $entry[14];
        $langs = [];
        for($i=15;isset($entry[$i]);$i++){
            if(is_numeric($entry[$i]) && strlen($entry[$i]) == 7 ){
                $country->geonameId = $entry[$i];
                break;
            }
            $langs[]=$entry[$i];
        }
        $country->langs = implode(',',$langs);

        //$em->insert($country);
        var_dump('---done---');
    }catch (\Throwable $e){
        var_dump('errore linea',$line);
        var_dump('errore oggettp',$country);

        var_dump('for: '.$e->getTraceAsString());
        continue;
    }
}
fclose($f);
