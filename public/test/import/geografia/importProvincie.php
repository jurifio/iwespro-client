<?php
ini_set("display_errors",1);
error_reporting(~0);

require "../../BlueSeal.php";

use bamboo\core\db\pandaorm\entities\CEntityManager;

$ninetyNineMonkey = new BlueSeal('BlueSeal','cartechinishop','/data/www/redpanda');
$ninetyNineMonkey->enableDebugging();

$entries = array();

$file = "ripartizioni_regioni_città metropolitane_province.csv";

/** @var CEntityManager $em */
$em = $ninetyNineMonkey->entityManagerFactory->create('Province');


$f  = fopen($file, 'r');
while ($line = fgets($f)) {
    //Foreign csv got some errors, so we're fixing them. Basically it's not a proper a csv...
    var_dump('---gogo---');
    $entry = preg_split('/[;]/', $line);
    $province = $em->getEmptyEntity();
    try{
        $province->countryId = 110;
        $province->regionId = $entry[5];
        $province->regionName = $entry[9];
        $province->fiscalCode = $entry[7];

        $province->name = $entry[14] == '-' ? $entry[15]: $entry[14];
        $province->code = $entry[16];
        $province->externalId = $entry[10];


        //$em->insert($province);
        var_dump('---done---');
    }catch (\Throwable $e){
        var_dump('errore linea',$line);
        var_dump('errore oggettp',$province);

        var_dump('for: '.$e->getTraceAsString());
        continue;
    }
}
fclose($f);
