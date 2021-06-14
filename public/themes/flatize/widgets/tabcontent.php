<div class="tab-pane active">
    <?php $i = 0;
    foreach ($data->multi as $product):
        /** @var \bamboo\domain\entities\CProduct $product */
        $prices = [];
        $salePrices = [];
        $pricesAreOnARange = false;
        $sale = $product->isOnSale();
        foreach ($product->productPublicSku as $sku) {
            if ($sku->stockQty < 1) continue;
            $prices[] = $sku->price;
            $salePrices[] = $sku->salePrice;
        }
        if (empty($prices)) continue;
        sort($prices);
        if (!(array_sum($prices) / count($prices)) == $prices[0]) {
            $pricesAreOnARange = true;
        }
        if ($sale && !(array_sum($salePrices) / count($salePrices)) == $salePrices[0]) {
            $pricesAreOnARange = false;
        }

        ?>
        <?php if ($i % $data->productsPerRow == 0): ?>
        <div class="row">
    <?php endif; ?>
        <div class="col-xs-6 col-sm-3 animation">
            <div class="product">
                <div class="product-thumb-info">
                    <div class="product-thumb-info-image">
                        <figure class="img-holder">
                            <a href="<?php echo $app->productUrl($product); ?>">
                                <img alt=""
                                     class="img-responsive xhttp-loading-icon"
                                     src="/<?php echo $app->lang(); ?>/assets/xhttp-loader-icon.gif"
                                     data-src="<?php echo $app->image($product->getPhoto(1, 562), 'amazon') ?>">
                            </a>
                        </figure>
                    </div>
                    <div class="product-thumb-info-content">
                        <h4>
                            <a href="<?php echo $app->productUrl($product); ?>"><?php echo $product->productBrand->name; ?></a>
                        </h4>
                        <?php
                        $productHasProductCategory=\Monkey::app()->repoFactory->create('ProductHasProductCategory')->findOneBy(['productId'=>$product->id,'productVariantId'=>$product->productVariantId]);
                        $productCategoryId=$productHasProductCategory->productCategoryId;
                        $langId=\Monkey::app()->getLang()->getId();
                        ?>
                        <span class="item-cat"><small><a
                                        href="#"><?php  echo \Monkey::app()->repoFactory->create('ProductCategoryTranslation')->findOneBy(['productCategoryId'=>$productCategoryId,'langId'=>$langId,'shopId'=>44])->name; ?></a></small></span>
                        <?php if ($pricesAreOnARange == true): ?>
                            <?php if ($sale > 0): ?>
                                <span class="oldprice"><?php echo $salePrices[0]; ?> &euro;
                                    - <?php echo $salePrices[count($salePrices) - 1]; ?> &euro;</span>&ensp;
                                <span class="saleprice"><?php echo $salePrices[0]; ?> &euro;
                                    - <?php echo $salePrices[count($salePrices) - 1]; ?> &euro;</span>
                            <?php else: ?>
                                <span class="price"><?php echo $prices[0]; ?> &euro;
                                    - <?php echo $prices[count($prices) - 1]; ?> &euro;</span>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if ($sale > 0): ?>
                                <span class="oldprice"><?php echo $prices[0]; ?> &euro;</span>&ensp;
                                <span class="saleprice"><?php echo $salePrices[0]; ?> &euro;</span>
                            <?php else: ?>
                                <span class="price"><?php echo $prices[0]; ?> &euro;</span>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($pricesAreOnARange == true): ?>
                            <span class="price-notice"><?php echo $data->variablePriceBySize; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php $i++; ?>
        <?php if ($i % $data->productsPerRow == 0): ?>
        </div>
    <?php endif; ?>
    <?php endforeach; ?>
    <?php if ($i % $data->productsPerRow != 0): ?>
</div>
<?php endif; ?>