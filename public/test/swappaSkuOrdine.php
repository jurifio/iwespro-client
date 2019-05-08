<?php
require "../../iwesStatic.php";

$sku = $ninetyNineMonkey->repoFactory->create('ProductSku')->findOneBy(['productId'=>11403,'productVariantId'=>42814,'productSizeId'=>421,'shopId'=>1]);
$orderLine = $ninetyNineMonkey->repoFactory->create('OrderLine')->findOneBy(['orderId'=>2069168,'id'=>1]);

$sku->stockQty = $sku->stockQty -1;
$sku->padding = $sku->padding + 1;

$orderLine->productSku->stockQty = $orderLine->productSku->stockQty +1;
$orderLine->productSku->padding = $orderLine->productSku->padding -1;
$orderLine->productSku->update();

$orderLine->productId = $sku->productId;
$orderLine->productVariantId = $sku->productVariantId;
$orderLine->productSizeId = $sku->productSizeId;
$orderLine->shopId = $sku->shopId;
$orderLine->frozenProduct = $sku->froze();
$orderLine->update();