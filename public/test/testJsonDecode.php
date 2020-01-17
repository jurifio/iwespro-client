<?php

use bamboo\domain\entities\CMarketplaceAccount;

$ttime = microtime(true);
$time = microtime(true);
require '../../iwesStatic.php';

$marketplaceAccountRepo = \Monkey::app()->repoFactory->create('MarketplaceAccount');
$productBrandRepo = \Monkey::app()->repoFactory->create('ProductBrand');
$productRepo = \Monkey::app()->repoFactory->create('Product');
$productSkuRepo = \Monkey::app()->repoFactory->create('ProductSku');

$marketplaceAccounts = $marketplaceAccountRepo->findBy(['id' => 32,'marketplaceId' => 9]);
$i=0;
foreach ($marketplaceAccounts as $marketplaceAccount) {
    $activeAutomatic = isset($marketplaceAccount->config['activeAutomatic']) ? $marketplaceAccount->config['activeAutomatic'] : 0;

    $isActive = isset($marketplaceAccount->config['isActive']) ? $marketplaceAccount->config['isActive'] : 0;
    if ($isActive == 0) {
        continue;
    }
    $rows = [];
    $productBrands = [];
    $shops = [];
    $prova='';
    $countProduct=0;
    $filters = explode(',',json_encode($marketplaceAccount->config['ruleOption'],false));
    foreach ($filters as $filter) {
        $brandShop = explode('-',$filter);
        $brand = $brandShop[0];
        $shopD = $brandShop[1];
        $products = $productRepo->findBy(['productBrandId' => $brand,'productStatusId' => 6]);

        foreach ($products as $product) {
            if ($product->qty >= 1) {
                $productSku = $productSkuRepo->findOneBy(['productId' => $product->id,'productVariantId' => $product->productVariantId,'shopId' => $shopD]);
                if ($productSku != null) {
                    array_push($rows, [$productSku -> productId . '-' . $product -> productVariantId]);
                    $i++;
                    $prova.=$productSku->productId.'-'.$product->productVariantId.'<br>';
                }

            } else {
                continue;
            }
        }

    }
    echo $prova;
}
