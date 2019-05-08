<?php
require "../../iwesStatic.php";
$i = 0;
$products = $ninetyNineMonkey->dbAdapter->query('SELECT ps.*
											FROM ProductSku ps, DirtyProduct dp, DirtySku ds
											WHERE ps.productId = dp.productId AND ps.productVariantId = dp.productVariantId AND ps.shopId = ds.shopId AND
      											dp.id = ds.dirtyProductId AND dp.shopId = ? AND ps.price != ds.value;', [31])->fetchAll();
foreach ($products as $row) {
	$sku = $ninetyNineMonkey->repoFactory->create('ProductSku')->findOne(["productId"        => $row['productId'],
	                                                              "productVariantId" => $row['productVariantId'],
	                                                              "productSizeId"    => $row['productSizeId'],
	                                                              "shopId"           => $row['shopId']]);

	if ($sku->shopId == 31 && $sku->value > $sku->price) {
		$tempValue = $sku->price;
		$tempPrice = $sku->value;
		$tempSalePrice = $sku->price + (0.18 * $sku->price);

		$sku->value = (float)$tempValue;
		$sku->price = $tempPrice;
		$sku->salePrice = round($tempSalePrice);
		$sku->isOnSale = 1;
		$sku->update();
		$i++;
		$ninetyNineMonkey->dbAdapter->insert('ProductHasTag', ['productId' => $sku->productId, 'productVariantId' => $sku->productVariantId, 'tagId' => 11],false,true);
	}
}
echo $i . " skus corretti";
