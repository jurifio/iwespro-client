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
echo "inizio prova" . '</br>';
if (ENV == 'dev') {
    $files = glob('/media/sf_sites/iwespro/temp/*.tar.gz');
} else {
    $files = glob('/home/iwespro/public_html/client/public/media/productsync/barbagallo/import/done/.tar.gz');
}
$dateStart = (new \DateTime())->format('Y-m-d H:i:s');
echo $dateStart.'</br>';
try {
    foreach ($files as $file) {
        $origingFile = basename($file,".tar.gz") . PHP_EOL;
        echo $origingFile;
        $firstFileDay = substr($origingFile,8,2);
        $year = substr($origingFile,0,4);
        $yearEndSale = $year + 1;
        $month = substr($origingFile,4,2);
        $day = substr($origingFile,6,2);

        if (($firstFileDay == '10') && ($year>2018)) {
            $phar = new \PharData($file);
            if (ENV == 'dev') {
                $phar->extractTo('/media/sf_sites/iwespro/temp/',null,true);
            } else {
                $phar->extractTo('/home/iwespro/public_html/client/public/media/productsync/barbagallo/import/done/',null,true);
            }
            $nameFile = basename($file,".json") . PHP_EOL;
            echo $nameFile;

            $dateFile = (new \DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
            $dateStartSale1 = (new \DateTime($year . '-01-01'))->format('Y-m-d');
            $dateEndSale1 = (new \DateTime($yearEndSale . '-03-15'))->format('Y-m-d');
            $dateStartSale2 = (new \DateTime($year . '-07-01'))->format('Y-m-d');
            $dateEndSale2 = (new \DateTime($year . '-09-15'))->format('Y-m-d');
            echo $year . '<br>';
            echo $day . '<br>';
            echo $month . '<br>';

            $fileexport = substr($nameFile,0,-8);


            if (ENV == 'dev') {
                $finalFile = '/media/sf_sites/iwespro/temp/' . substr($fileexport,15,100) . '.json';
            } else {
                $finalFile = '/home/iwespro/public_html/client/public/media/productsync/barbagallo/import/done/' . substr($fileexport,15,100) . '.json';
            }
            echo $finalFile . '</br>';

            $rawData = json_decode(file_get_contents($finalFile),true);

            $arrayProduct = [];
            $dirtyProduct = '';
            $quantity = 0;
            $lineCount=0;
            foreach ($rawData as $values) {
                $quantity = $values['esistenza'];
                $size = $values['size'];
                $barcode =$values['barcode'];
                $price =floatval(str_replace(',','.',$values["PrListino"]));
                $dirtySku = $dirtySkuRepo->findOneBy(['barcode' => $barcode,'shopId' => 51]);
                if ($dirtySku) {
                    if ($dirtySku->productSizeId != null) {
                        $dirtyProductId = $dirtySku->dirtyProductId;

                        $dirtyProduct = $dirtyProductRepo->findOneBy(['id' => $dirtyProductId]);
                        if ($dirtyProduct) {
                            if ($dirtyProduct->productId != null) {
                                $productId = $dirtyProduct->productId;
                                $productVariantId = $dirtyProduct->productVariantId;
                                $shopHasProduct = $shopHasProductRepo->findOneBy(['productId' => $productId,'productVariantId' => $productVariantId,'shopId' => 51]);
                                $productSold = $productSoldSizeRepo->findOneBy(['productId' => $productId,'productVariantId' => $productVariantId,'productSizeId'=>$dirtySku->productSizeId,'shopId' => 51,'year' => $year,'month' => $month,'day' => $day]);
                                if($productSold==null) {
                                    $productSoldInsert = $productSoldSizeRepo->getEmptyEntity();
                                    $productSoldInsert->productId = $productId;
                                    $productSoldInsert->productVariantId = $productVariantId;
                                    $productSoldInsert->productSizeId = $dirtySku->productSizeId;
                                    $productSoldInsert->shopId = 51;
                                    $productSoldInsert->barcode = $barcode;
                                    $productSoldInsert->dateStart = $year.'-'.$month.'-'.$day.' 00:00:00';
                                    $productSoldInsert->startQuantity = $quantity;
                                    $productSoldInsert->dateEnd = $year.'-'.$month.'-'.$day.' 00:00:00';
                                    $productSoldInsert->endQuantity = $quantity;
                                    if ($dateFile >= $dateStartSale1 && $dateFile <= $dateEndSale1) {
                                        if ($shopHasProduct->salePrice == null) {
                                            $priceActive = $price;
                                        } else {
                                            $priceActive = $shopHasProduct->salePrice;

                                        }
                                    } else {
                                        if ($shopHasProduct->price == null) {
                                            $priceActive = $price;
                                        } else {
                                            $priceActive = $shopHasProduct->price;

                                        }

                                    }
                                    if ($dateFile >= $dateStartSale2 && $dateFile <= $dateEndSale2) {
                                        if ($shopHasProduct->salePrice == null) {
                                            $priceActive = $price;

                                        } else {
                                            $priceActive = $shopHasProduct->salePrice;

                                        }
                                    } else {
                                        if ($shopHasProduct->price == null) {
                                            $priceActive = $price;

                                        } else {
                                            $priceActive = $shopHasProduct->price;

                                        }

                                    }
                                    $productSoldInsert->priceActive = $priceActive;
                                    $productSoldInsert->soldQuantity = 0;
                                    $productSoldInsert->netTotal = 0;
                                    $productSoldInsert->day = $day;
                                    $productSoldInsert->month = $month;
                                    $productSoldInsert->year = $year;
                                    $productSoldInsert->sourceInitial = $finalFile;
                                    $productSoldInsert->insert();
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
            unlink($finalFile);

        } else {
            continue;
        }

    }
} catch (\Throwable $e) {
    echo $e->getMessage();
    echo '</br>';
    echo $e->getLine();
}