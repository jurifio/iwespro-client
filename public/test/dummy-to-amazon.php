<?php
require "../../iwesStatic.php";
$ninetyNineMonkey->authManager->auth();

use bamboo\core\utils\amazonPhotoManager\S3Manager;

$ninetyNineMonkey->vendorLibraries->load("amazon2723");
$config = $ninetyNineMonkey->cfg()->fetch('miscellaneous', 'amazonConfiguration');
$image = new S3Manager($config['credential']);

$amazonUrl = $ninetyNineMonkey->cfg()->fetch('general', 'product-photo-host');
$products = $ninetyNineMonkey->repoFactory->create('Product')->em()->findBySql("SELECT distinct p.id,p.productVariantId 
                                                                                                FROM Product p 
                                                                                                  JOIN ProductHasProductPhoto phpp on (p.id,p.productVariantId) = (phpp.productId,phpp.productVariantId)
                                                                                                  JOIN ProductPhoto pp on phpp.productPhotoId = pp.id
                                                                                                WHERE dummyPicture NOT LIKE '%amazonaws%' 
                                                                                                      and dummyPicture not like ? 
                                                                                                      and dummyPicture not like 'bs-dummy-9-16.png'
                                                                                                      and qty > 0", [$amazonUrl.'%']);
//$img = strpos($val->dummyPicture,'s3-eu-west-1.amazonaws.com') ? $val->dummyPicture : $this->urls['dummy']."/".$val->dummyPicture;
$dummyFileFolder = $ninetyNineMonkey->rootPath() . $ninetyNineMonkey->cfg()->fetch('paths', 'dummyFolder');

var_dump($products);
die('non funziona');
foreach ($products as $product) {
    try {
        $original = $product->dummyPicture;
        var_dump($dummyFileFolder . '/' . $original);
        if (!is_file($dummyFileFolder . '/' . $original)) continue;
        $firstTry = $product->getPhoto(1, \bamboo\domain\entities\CProductPhoto::SIZE_SMALL);
        if (!empty($firstTry)) {
            $product->dummyPicture = $amazonUrl . $firstTry;
        } else {
            $res = $image->putImage($config['bucket'], $dummyFileFolder . '/' . $original, 'dummy', $original);
            $product->dummyPicture = $res->get('ObjectURL');
        }
        unlink($dummyFileFolder . '/' . $original);
        $product->update();
        var_dump($product->dummyPicture);
    } catch (Exception $e) {
        var_dump($e->getMessage());
        die();
    }
}