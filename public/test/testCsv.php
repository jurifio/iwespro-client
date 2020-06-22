<?php
ini_set("memory_limit","2000M");
ini_set('max_execution_time',0);
$ttime = microtime(true);
$time = microtime(true);
require '../../iwesStatic.php';
var_dump('Applicazione  \t\t\t\t' . (microtime(true) - $time));

$monkey = \Monkey::app();
$time = microtime(true);
$monkey->dbAdapter;
var_dump("dbAdapter \t\t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->cacheService;
var_dump("cacheService \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->sessionManager;
var_dump("sessionManager \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->authManager;
var_dump("authManager \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->entityManagerFactory;
var_dump("entityManagerFactory \t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->repoFactory;
var_dump("repoFactory \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->eventManager;
var_dump("eventManager \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);

$files = glob(\Monkey::app()->rootPath() . \Monkey::app()->cfg()->fetch('paths','productSync') . '/thesquareroma/Articoli*.txt');
$products = $files[count($files) - 1];

$size = filesize($products);
while ($size != filesize($products)) {
    sleep(1);
    $size = filesize($products);
}
$main = \Monkey::app()->rootPath() . \Monkey::app()->cfg()->fetch('paths','productSync') . '/thesquareroma/import/main' . rand(0,1000) . '.csv';
copy($products,$main);
for ($i = 0; $i < (count($files) - 1); $i++) {
    unlink($files[$i]);
}

$mainF = fopen($main,'r');


//read main
$main = $mainF;

fgets($main);
$dirtyProduct = [];
$dirtyProductExtended = [];
$i = 0;
ini_set('auto_detect_line_endings',TRUE);
while (($values = fgetcsv($main,0,'|')) !== false) {
    if ($i >= 0) {

        $line = implode('|',$values);
        $dirtyProduct[$i]['brand'] = $values[12];
        $dirtyProduct[$i]['itemno'] = $values[0];
        $dirtyProduct[$i]['extId'] = $values[19];
        $dirtyProduct[$i]['value'] = $values[29];
        $dirtyProduct[$i]['price'] = $values[30];
        $dirtyProduct[$i]['salePrice'] = $values[31];
        $dirtyProductExtended[$i]['season'] = $values[6];
        $dirtyProductExtended[$i]['name'] = $values[1];
        $dirtyProductExtended[$i]['description'] = $values[2];
        $dirtyProductExtended[$i]['colorDescription'] = $values[22];
        $dirtyProductExtended[$i]['generalColor'] = $values[22];
        $dirtyProductExtended[$i]['audience'] = $values[18];
        $dirtyProductExtended[$i]['cat1'] = $values[28];
        $dirtyProductExtended[$i]['cat2'] = $values[16];
        $dirtyProductExtended[$i]['cat3'] = $values[14];
        $dirtyProductExtended[$i]['cat4'] = $values[26];


        $i++;

    }
}
ini_set('auto_detect_line_endings',FALSE);
var_dump($dirtyProduct);

var_dump($dirtyProductExtended);



