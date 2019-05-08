<?php
require "../../iwesStatic.php";

$amazonUrl = $ninetyNineMonkey->cfg()->fetch('general', 'product-photo-host');
$products = $ninetyNineMonkey->repoFactory->create('Product')->findBySql(
    "SELECT distinct p.id,p.productVariantId 
            FROM Product p 
              JOIN ProductHasProductPhoto phpp on (p.id,p.productVariantId) = (phpp.productId,phpp.productVariantId)
              JOIN ProductPhoto pp on phpp.productPhotoId = pp.id
            WHERE dummyPicture is null or dummyPicture like '' or dummyPicture like 'bs-dummy-16-9.png'", []);

foreach ($products as $product) {
    try {
        $product->dummyPicture = $amazonUrl.$product->getPhoto(1, \bamboo\domain\entities\CProductPhoto::SIZE_SMALL);
        $product->update();
    } catch (Exception $e) {
        var_dump($e->getMessage());
        die();
    }
}