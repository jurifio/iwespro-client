<?php

use bamboo\domain\entities\CMarketplaceAccount;
use bamboo\domain\repositories\CEmailRepo;
use bamboo\domain\repositories\CMarketplaceAccountHasProductRepo;

$ttime = microtime(true);
$time = microtime(true);
require '../../iwesStatic.php';

$activityLogRepo=\Monkey::app()->repoFactory->create('ActivityLog');
$marketplaceAccountRepo = \Monkey::app()->repoFactory->create('MarketplaceAccount');
$productBrandRepo = \Monkey::app()->repoFactory->create('ProductBrand');
$productRepo = \Monkey::app()->repoFactory->create('Product');
$productSkuRepo = \Monkey::app()->repoFactory->create('ProductSku');
$marketplaceRepo = \Monkey::app()->repoFactory->create('Marketplace');
$year = (new DateTime())->format('Y');
$currentMonth = (new DateTime())->format('m');
echo $currentMonth;
switch($currentMonth){
    case "01":
        $lastDay='31';
        break;
    case "02":
        ;
        $lastDay='28';
        break;
    case "03":

        $lastDay='31';
        break;
    case "04":

        $lastDay='30';
        break;
    case "05":

        $lastDay='31';
        break;
    case "06":

        $lastDay='30';
        break;
    case "07":

        $lastDay='31';
        break;
    case "08":

        $lastDay='31';
        break;
    case "09":

        $lastDay='30';
        break;
    case "10":

        $lastDay='31';
        break;
    case "11":

        $lastDay='30';
        break;
    case "12":

        $lastDay='31';
        break;
}
$sql = "select sum(cost) as cost FROM CampaignVisit WHERE campaignId=7 AND timestamp between '".$year."-".$currentMonth."-01 00:00:00' and  '".$year."-".$currentMonth."-".$lastDay." 00:00:00'";
$cost = \Monkey::app()->dbAdapter->query($sql, [])->fetchAll()[0]['cost'];
echo $cost;
$marketplaceAccounts = $marketplaceAccountRepo->findBy(['id' => 32,'marketplaceId' => 9]);
$activityLog=$activityLogRepo->findBy(['sid'=>'5d26ecaa4f1f6b2716ed4e037c62e324db067aec753f51ac1e0abdccf9b47309']);
foreach ($activityLog as $log){
    if(preg_match("/\bMobile\b/i", $log->userAgent)){
        echo 'mobile';
        }

}

/*
foreach ($marketplaceAccounts as $marketplaceAccount) {
    $markeplaceId = $marketplaceAccount->marketplaceId;
    $marketplaceAccountId = $marketplaceAccount->id;
    $activeAutomatic = isset($marketplaceAccount->config['activeAutomatic']) ? $marketplaceAccount->config['activeAutomatic'] : 0;

    $isActive = isset($marketplaceAccount->config['isActive']) ? $marketplaceAccount->config['isActive'] : 0;
    if ($isActive == 0) {
        continue;
    }
    $rows = [];
    $countProduct = 0;
    $bodyMail = '<html><body>Elenco Prodotti in Pubblicazione per aggregatore '.$marketplaceAccount->name.':<br><table><thead><th>codice</th><th>brand</th><th>categoria</th><th>cpc Desktop</th><th>cpc Mobile</th></thead>';
    $marketplace = $marketplaceRepo->findOneBy(['id' => $marketplaceAccount->marketplaceId]);
    $priceRange1=explode('-',$marketplaceAccount->config['priceModifierRange1']);
    $priceRange2=explode('-',$marketplaceAccount->config['priceModifierRange2']);
    $priceRange3=explode('-',$marketplaceAccount->config['priceModifierRange3']);
    $priceRange4=explode('-',$marketplaceAccount->config['priceModifierRange4']);
    $priceRange5=explode('-',$marketplaceAccount->config['priceModifierRange5']);


    $filters = explode(',',json_encode($marketplaceAccount->config['ruleOption'],false));
    foreach ($filters as $filter) {
        $brandShop = explode('-',$filter);
        $brand = $brandShop[0];
        $shopD = $brandShop[1];
        $productBrand = $productBrandRepo->findOneBy(['id' => $brand]);
        if ($productBrand!=null) {
            $brandName = $productBrand->name;
        }else{
            $brandName ='non specificato';
        }
        $products = $productRepo->findBy(['productBrandId' => $brand,'productStatusId' => 6]);
        foreach ($products as $product) {
            $isOnSale = $product -> isOnSale;
            if ($product->qty >= 1) {
                $productSku = $productSkuRepo->findOneBy(['productId' => $product->id,'productVariantId' => $product->productVariantId,'shopId' => $shopD]);
                if ($productSku != null) {
                    if ($marketplace->type == 'cpc') {
                        if ($activeAutomatic == 0) {
                            $fee = $marketplaceAccount->config['defaultCpc'];
                            $feeMobile = $marketplaceAccount->config['defaultCpcM'];
                        } else {
                            $price = $productSku -> price;
                            $salePrice = $productSku -> salePrice;
                            if ($isOnSale == 1) {
                                $activePrice = $salePrice;
                            } else {
                                $activePrice = $price;
                            }



                            switch(true){
                                case $activePrice>=$priceRange1[0] && $activePrice<=$priceRange1[1]:
                                    $fee=$marketplaceAccount->config['range1Cpc'];
                                    $feeMobile=$marketplaceAccount->config['range1CpcM'];
                                    break;
                                case $activePrice>=$priceRange2[0] && $activePrice<=$priceRange2[1]:
                                    $fee=$marketplaceAccount->config['range2Cpc'];
                                    $feeMobile=$marketplaceAccount->config['range2CpcM'];
                                    break;
                                case $activePrice>=$priceRange3[0] && $activePrice<=$priceRange3[1]:
                                    $fee=$marketplaceAccount->config['range3Cpc'];
                                    $feeMobile=$marketplaceAccount->config['range3CpcM'];
                                    break;
                                case $activePrice>=$priceRange4[0] && $activePrice<=$priceRange4[1]:
                                    $fee=$marketplaceAccount->config['range4Cpc'];
                                    $feeMobile=$marketplaceAccount->config['range4CpcM'];

                                    break;
                                case $activePrice>=$priceRange5[0] && $activePrice<=$priceRange5[1]:
                                    $fee=$marketplaceAccount->config['range5Cpc'];
                                    $feeMobile=$marketplaceAccount->config['range5CpcM'];
                                    break;
                            }
                        }
                    }else{
                        $fee='nessun cpc ';
                        $feeMobile='nessun cpc Mobile';
                    }
                    $countProduct++;
                    array_push($rows,[$productSku->productId . '-' . $product->productVariantId]);
                    $bodyMail .= " <tr><td>codice: " . $productSku->productId . '-' . $productSku->productVariantId . ' </td><td>brand: ' . $brandName . '</td><td>categoria: ' . $product->getLocalizedProductCategories('/','/'). ' </td><td>cpc Desktop: '.$fee. ' </td><td>cpc Mobile: '.$feeMobile.'</td></tr>';
                }

            } else {
                continue;
            }
        }

    }
    $bodyMail.='</table></body></html>';
    $bodyMail.='numero Prodotti Totali in Coda di Pubblicazione '.$countProduct;
    /** @var CEmailRepo $mailRepo */

/*
    $mailRepo = \Monkey::app()->repoFactory->create('Email');
    $mailRepo->newMail('it@iwes.it', ["gianluca@iwes.it","juri@iwes.it"],[],[],"coda Pubblicazione su ".$marketplaceAccount->name, $bodyMail);
}
echo $bodyMail;