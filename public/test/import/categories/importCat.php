<?php
ini_set("display_errors",1);
error_reporting(~0);

require "/data/www/redpanda/htdocs/cartechinishop/BlueSeal.php";


$ninetyNineMonkey = new BlueSeal('BlueSeal','cartechinishop','/data/www/redpanda');
$ninetyNineMonkey->enableDebugging();

$f  = fopen('categories.csv', 'r');
while ($line = fgetcsv($f)) {
    //Foreign csv got some errors, so we're fixing them. Basically it's not a proper a csv...
    $name = strtolower($line[2]);
    $name = str_replace(" ","_", $name);
    $name = str_replace("/","_",$name);
    switch($line[0]){
        case 'SD':
            $parent = 6;
            break;
        case 'SU':
            $parent = 5;
            break;
        case 'D':
            $parent = 6;
            break;
        case 'U':
            $parent = 5;
            break;
        case 'BD':
            $parent = 9;
            break;
        case 'BU':
            $parent = 8;
            break;
        case 'B':
            $parent = 9;
            break;
        case 'SBD':
            $parent = 9;
            break;
        case 'SBU':
            $parent = 8;
            break;
        default:
            $parent = 1;
            break;
    }
    $categories = $ninetyNineMonkey->categoryManager->categories()->add($name,$line[2],$parent);

    //$categories = $categoryManager->categories()->add($line[1],$line[1],14);

    //$categories = $categoryManager->categories()->add($line[1],$line[1],14);
    echo $name ." - ".$line[2]." - ". $categories."<br>";
}