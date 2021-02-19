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
$productSoldSizeRepo = \Monkey::app()->repoFactory->create('ProductSoldSize');
$shopHasProductRepo = \Monkey::app()->repoFactory->create('ShopHasProduct');
echo "inizio prova".'</br>';
if (ENV == 'dev') {
    $files = glob('/media/sf_sites/iwespro/temp/*.tar.gz');
}else{
    $files = glob('/home/iwespro/public_html/temp-csv/*.tar.gz');
}
$dateStart = (new \DateTime())->format('Y-m-d H:i:s');
try {
    foreach ($files as $file) {


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
        $dateEndSale1 = (new \DateTime($year . '-09-15'))->format('Y-m-d');
        echo $year . '<br>';
        echo $day . '<br>';
        echo $month . '<br>';

        $fileexport = substr($nameFile,0,-8);

        if (ENV == 'dev') {
            $finalFile = '/media/sf_sites/iwespro/temp/' . substr($fileexport,15,100) . '.csv';
        } else {
            $finalFile = '/home/iwespro/public_html/temp-eancsv/' . substr($fileexport,15,100) . '.csv';
        }
        echo $finalFile;


        $f = fopen($finalFile,'r');
        fgets($f);
        $arrayProduct = [];
        $dirtyProduct = '';
        $quantity = 0;
        while (($values = fgetcsv($f,0,";")) !== false) {

            echo $values[18] . '</br>';
            $quantity = $values[30];

            $dirtySku = $dirtySkuRepo->findOneBy(['barcode' => $values[18],'shopId' => 58]);
            if ($dirtySku) {
                if ($dirtySku->productSizeId != null) {
                    $dirtyProductId = $dirtySku->dirtyProductId;

                    $dirtyProduct = $dirtyProductRepo->findOneBy(['id' => $dirtyProductId]);
                    if ($dirtyProduct) {
                        if ($dirtyProduct->productId != null) {
                            $productId = $dirtyProduct->productId;
                            $productVariantId = $dirtyProduct->productVariantId;
                            $shopHasProduct = $shopHasProductRepo->findOneBy(['productId' => $productId,'productVariantId' => $productVariantId,'shopId' => 58]);
                            $productSold = $productSoldSizeRepo->findOneBy(['productId' => $productId,'productVariantId' => $productVariantId,'productSizeId' => $dirtySku->productSizeId,'shopId' => 58,'year' => $year,'month' => $month,'day' => $day]);
                            if ($productSold) {

                                $startQuantity = $productSold->startQuantity;
                                if ($startQuantity == $quantity) {
                                    continue;
                                } else {
                                    $soldQuantity = $startQuantity - $quantity;
                                    $productSold->dateStart = $dateStart;
                                    $productSold->startQuantity = $quantity;
                                    $productSold->dateEnd = $dateEnd;
                                    $productSold->endQuantity = $quantity;
                                    if ($dateFile >= $dateStartSale1 && $dateFile <= $dateEndSale1) {
                                        $priceActive = $shopHasProduct->salePrice;
                                        $netTotal = $shopHasProduct->salePrice * $soldQuantity;
                                    } else {
                                        $priceActive = $shopHasProduct->price;
                                        $netTotal = $shopHasProduct->price * $soldQuantity;

                                    }
                                    if ($dateFile >= $dateStartSale2 && $dateFile <= $dateEndSale2) {
                                        $netTotal = $shopHasProduct->salePrice * $soldQuantity;
                                    } else {
                                        $priceActive = $shopHasProduct->price;
                                        $netTotal = $shopHasProduct->price * $soldQuantity;

                                    }
                                    $productSold->priceActive = $priceActive;
                                    $productSold->soldQuantity = $soldQuantity;
                                    $productSold->netPrice = $netTotal;

                                    $productSold->update();
                                }
                            } else {
                                $productSoldInsert = $productSoldRepo->getEmptyEntity();
                                $productSoldInsert->productId = $productId;
                                $productSoldInsert->productVariantId = $productVariantId;
                                $productSoldInsert->productSizeId = $dirtySku->productSizeId;
                                $productSoldInsert->shopId = 58;
                                $productSoldInsert->dateStart = $dateStart;
                                $productSoldInsert->startQuantity = $quantity;
                                $productSoldInsert->dateEnd = $dateEnd;
                                $productSoldInsert->endQuantity = $quantity;
                                if ($dateFile >= $dateStartSale1 && $dateFile <= $dateEndSale1) {
                                    $priceActive = $shopHasProduct->salePrice;
                                } else {
                                    $priceActive = $shopHasProduct->price;

                                }
                                if ($dateFile >= $dateStartSale2 && $dateFile <= $dateEndSale2) {
                                    $priceActive = $shopHasProduct->salePrice;
                                } else {
                                    $priceActive = $shopHasProduct->price;

                                }
                                $productSoldInsert->priceActive = $priceActive;
                                $productSoldInsert->soldQuantity = 0;
                                $productSoldInsert->netTotal = 0;
                                $productSoldInsert->day = $day;
                                $productSoldInsert->month = $month;
                                $productSoldInsert->year = $year;
                                $productSoldINsert->insert();

                            }


                        } else {
                            continue;
                        }
                    } else {
                        continue;
                    }
                }

            }
        }


    }
}catch(\Throwable $e){
    echo $e->getMessage();
    echo '</br>';
    echo $e->getLine();
}











