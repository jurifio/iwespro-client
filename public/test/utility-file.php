<?php

require "../../iwesStatic.php";


$products = \Monkey::app()->dbAdapter->query(
    'SELECT p.id, p.productVariantId
            FROM Product p
              JOIN ProductSku ps ON ps.productId = p.id AND ps.productVariantId = p.productVariantId
            WHERE ps.value in (ps.price) AND p.productStatusId = 6
            GROUP BY p.id, p.productVariantId',
            [])->fetchAll();

/** @var \bamboo\domain\repositories\CProductRepo $pR */
$pR = \Monkey::app()->repoFactory->create('Product');
foreach ($products as $product){

    $maxPrice = \Monkey::app()->dbAdapter->query('
            SELECT max(ps.price) max
            FROM ProductSku ps
            WHERE ps.productId = ? AND ps.productVariantId = ?',
        [$product['id'], $product['productVariantId']])->fetch()['max'];

    $minPrice = \Monkey::app()->dbAdapter->query('
            SELECT min(ps.price) min
            FROM ProductSku ps
            WHERE ps.productId = ? AND ps.productVariantId = ?',
        [$product['id'], $product['productVariantId']])->fetch()['min'];

    if ($maxPrice == $minPrice) continue;

    try {
        \Monkey::app()->dbAdapter->beginTransaction();
        /** @var \bamboo\domain\entities\CProduct $p */
        $p = $pR->findOneBy(["id" => $product['id'], "productVariantId" => $product['productVariantId']]);

        /** @var \bamboo\domain\entities\CProductSku $psk */
        foreach ($p->productSku as $psk) {
            $psk->price = $maxPrice;
            $psk->update();

            $shopHasProduct = $psk->shopHasProduct;
            $shopHasProduct->price = $maxPrice;
            $shopHasProduct->update();
        }

        /** @var \bamboo\domain\entities\CProductPublicSku $ppsk */
        foreach ($p->productPublicSku as $ppsk){
            $ppsk->price = $maxPrice;
            $ppsk->update();
        }

        \Monkey::app()->dbAdapter->commit();
    } catch(Throwable $e){
        \Monkey::app()->dbAdapter->rollBack();
    }
}

