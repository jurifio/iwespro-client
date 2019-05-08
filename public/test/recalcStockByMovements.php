<?php
require "../../iwesStatic.php";

/**
 * @var bamboo\core\auth\rbac\CRbacManager $rbac
*/
;
$bs = $ninetyNineMonkey;

function fixMovementSigns($movements) {
    $count = 0;
    foreach($movements as $v) {
        $multiplier = ($v->storehouseOperationCause->sign) ? 1 : -1;
        foreach($v->storehouseOperationLine as $line) {
            $line->qty = abs($line->qty) * $multiplier;
            $line->update();
            $count++;
        }
    }
    return $count;
}

function recalcStock($movements, $shopId) {
    global $bs;
    $skuRepo = $bs->repoFactory->create('ProductSku');
    $shpRepo = $bs->repoFactory->create('ShopHasProduct');
    $stocks = [];

    foreach($movements as $m) {
        foreach($m->storehouseOperationLine as $line) {
            if (!array_key_exists($line->productVariantId . '-' . $line->productSizeId, $stocks)) {
                $stocks[$line->productId . '-' . $line->productVariantId . '-' . $line->productSizeId] = $line->qty;
            } else {
                $stocks[$line->productId . '-' . $line->productVariantId . '-' . $line->productSizeId] += $line->qty;
            }
        }
    }

    $bs->repoFactory->beginTransaction();
    $update = 0;
    $insert = 0;

    foreach($stocks as $k => $qty) {
        list($id, $pv, $ps) = explode('-', $k);
        $sku = $skuRepo->findOneBy(['productVariantId' => $pv, 'productSizeId' => $ps, 'shopId' => $shopId]);
        if ($sku) {
            try {
                $sku->stockQty = $qty;
                $sku->padding = 0;
                $sku->update();
                $update++;
            } catch (\Throwable $e) {
                $bs->repoFactory->rollback();
                throw new \Exception('sku: ' . $sku->productId . '-' . $sku->productVariantId . '-' . $sku->productSizeIs . ', shopId: ' . $shopId . '. Errore: ' . $e->getMessage());
            }
        } else {
            try {
                $shp = $shpRepo->findOneBy(['productVariantId' => $pv, 'shopId' => $shopId]);
                if (!$shp) throw new Exception('il prodotto con l\'id variante ' . $pv . ' non ha prezzi specificati');
                $sku = $skuRepo->getEmptyEntity();
                $sku->productId = $id;
                $sku->productVariantId = $pv;
                $sku->productSizeId = $ps;
                $sku->shopId = $shopId;
                $sku->currencyId = 1;
                $sku->stockQty = $qty;
                $sku->padding = 0;
                $sku->value = $shp->value;
                $sku->price = $shp->price;
                $sku->salePrice = $shp->salePrice;
                $sku->insert();

                $skuRepo->levelPrice($id, $pv);
                $insert++;
            } catch (\Throwable $e) {
                $bs->repoFactory->rollback();
                throw new \Exception('sku: ' . $id . '-' . $pv . '-' . $ps . ', shopId: ' . $shopId . '. Errore: ' . $e->getMessage());
            }
        }
    }

    $bs->repoFactory->commit();
    return ['insert' => $insert, 'update' => $update];
}

$shopId = 32;
$movements = $bs->repoFactory->create('StorehouseOperation')->findBy(['shopId' => $shopId]);
echo "conto i movimenti: " . $movements->count() . '<br />';

/*$count = fixMovementSigns($movements);

echo 'il segno delle quantità è stato controllato e corretto su ' . $count . ' righe<br />';

$res = recalcStock($movements, $shopId);

echo 'Sono stati aggioranti ' . $res['update'] . ' sku e ne sono stati inseriti ' . $res['insert'] . ' nuovi<br />';*/