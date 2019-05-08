<?php
require "ebayconfig.php";

/** @var \bamboo\domain\entities\CProduct $product */
//$product = $ninetyNineMonkey->repoFactory->create('Product')->findOne([30089,81133]);

$marketplaceProducts = \Monkey::app()->repoFactory->create('Product')->findBySql("SELECT DISTINCT productId AS id, 
                                                                                                  productVariantId 
                                                                                  FROM pickyshop.MarketplaceAccountHasProduct 
                                                                                  WHERE marketplaceId = ? ORDER BY lastRevised asc", [3]);
foreach ($marketplaceProducts as $marketplaceProduct) {
    var_dump($marketplaceProduct->printId());
    \Monkey::app()->eventManager->triggerEvent("product.marketplace.change", ["productIds"=>$marketplaceProduct->printId()]);
}