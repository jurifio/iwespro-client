<?php

use bamboo\core\exceptions\BambooException;

ini_set("memory_limit","2000M");
ini_set('max_execution_time',0);
$ttime = microtime(true);
$time = microtime(true);
require '../../iwesStatic.php';
var_dump('Applicazione  \t\t\t\t' . (microtime(true) - $time));
echo 'prova';
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
$dirtySkuRepo = \Monkey::app()->repoFactory->create('DirtySku');
$dirtyProductRepo = \Monkey::app()->repoFactory->create('DirtyProduct');
$productSoldSizeRepo = \Monkey::app()->repoFactory->create('ProductSizeSoldDay');
$shopHasProductRepo = \Monkey::app()->repoFactory->create('ShopHasProduct');
if (ENV == 'dev') {
    $files = glob('/media/sf_sites/iwespro/temp/*.tar.gz');
} else {
    $files = glob('/home/iwespro/public_html/temp-eancsv/*.tar.gz');
}
$dateStart = (new \DateTime())->format('Y-m-d H:i:s');
echo $dateStart;
try {
    foreach ($files as $file) {
        $origingFile = basename($file,".gz") . PHP_EOL;
        $firstFileDay = substr($origingFile,-14,-12);
        if ($firstFileDay == '23') {
            echo 'trovato';
            $phar = new \PharData($file);
            if (ENV == 'dev') {
                $phar->extractTo('/media/sf_sites/iwespro/temp/',null,true);
            } else {
                $phar->extractTo('/home/iwespro/public_html/temp-eancsv/',null,true);
            }
            $nameFile = basename($file,".csv") . PHP_EOL;
            echo $nameFile;
            $year = substr($nameFile,0,4);
            $yearEndSale = $year + 1;
            $month = substr($nameFile,4,2);
            $day = substr($nameFile,6,2);
            $dateFile = (new \DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
            $dateStartSale1 = (new \DateTime($year . '-01-01'))->format('Y-m-d');
            $dateEndSale1 = (new \DateTime($yearEndSale . '-03-15'))->format('Y-m-d');
            $dateStartSale2 = (new \DateTime($year . '-07-01'))->format('Y-m-d');
            $dateEndSale2 = (new \DateTime($year . '-09-15'))->format('Y-m-d');
            echo '</br>' . $year . '<br>';
            echo $day . '<br>';
            echo $month . '<br>';

            $fileexport = substr($nameFile,0,-8);

            if (ENV == 'dev') {
                $finalFile = '/media/sf_sites/iwespro/temp/' . substr($fileexport,15,100) . '.csv';
            } else {
                $finalFile = '/home/iwespro/public_html/temp-eancsv/' . substr($fileexport,15,100) . '.csv';
            }
            echo $finalFile . '</br>';


            $f = fopen($finalFile,'r');
            fgets($f);
            $arrayProduct = [];
            $dirtyProduct = '';
            while (($values = fgetcsv($f,0,";")) !== false) {
                $quantity = $values[30];
                $barcode = $values[18];

                $productSold=
                $productSold = $productSoldSizeRepo->findOneBy(['barcode' => $barcode,'shopId' => 58,'year' => $year,'month' => $month,'day' => $day]);
                if ($productSold) {
                    echo 'trovato record</br>';
                    $startQuantity = $productSold->startQuantity;
                    echo $startQuantity.'</br>';
                    echo $values[30].'</br>';
                    $priceActive = $productSold->priceActive;
                    echo $priceActive.'</br>';
                    if ($startQuantity != $values[30]) {
                        $soldQuantity = $startQuantity - $values[30];
                        echo $soldQuantity.'</br>';
                        $productSold->dateStart = $dateStart;
                        $productSold->startQuantity = $values[30];
                        $productSold->dateEnd = $dateStart;
                        $productSold->endQuantity = $values[30];
                        $netTotal = $priceActive * $soldQuantity;
                        $productSold->soldQuantity = $soldQuantity;
                        $productSold->netTotal = $netTotal;
                        $productSold->sourceUpgrade = $finalFile;
                        $productSold->update();
                        echo 'record Aggiornato'.'</br>';
                    }
                }


            }
            fclose($f);
        } else {
            continue;
        }
        sleep(2);
    }
} catch (\Throwable $e) {
    echo $e->getMessage();
    echo '</br>';
    echo $e->getLine();
}









