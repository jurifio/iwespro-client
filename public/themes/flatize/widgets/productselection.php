<?php

foreach ($data->multi as $style): ?>
    <?php

    $productsPerRow = count($style->products);

    switch ($productsPerRow) {
        case 2:
            $col = 6;
            break;
        case 3:
            $col = 4;
            break;
        case 4:
            $col = 3;
            break;
        default:
            $col = 3;
            $productsPerRow = 4;
            break;
    }

    ?>
    <hr /><h2 style="margin:35px 0 0 5px;"><span><?php tpe($style->title); ?></span></h2>
    <p><?php echo $style->text; ?></p><?php
    $i = 0;
    foreach ($style->products as $product):

        /** @var \bamboo\domain\entities\CProduct $product */
        if (!stristr($app->image($product->getPhoto(1, 562), 'amazon'), 'jpg')) {
            $app->application()->eventManager->triggerEvent('catalogPhotoMissing', ['productIds' => $product->getIds()]);
            continue;
        }

        $prices = [];
        $salePrices = [];
        $pricesAreOnARange = false;
        $sale = $product->isOnSale();
        $sizes = [];
        foreach ($product->productPublicSku as $sku) {
            if ($sku->stockQty < 1) continue;
            $prices[] = $sku->price;
            $salePrices[] = $sku->salePrice;
            $sizes[] = $sku->getPublicSize()->name;
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
        <?php if ($i % $productsPerRow == 0): ?>
        <div class="row">
    <?php endif; ?>
        <div class="col-md-<?php echo $col ?> col-sm-6 col-xs-6">
            <div class="product product-display-box"
                 data-id="<?php echo $product->printId() ?>"
                 data-name="<?php echo $product->getName() ?>"
                 data-list="<?php echo 'catalog'; ?>"
                 data-brand="<?php echo $product->productBrand->name; ?>"
                 data-category="<?php echo $app->getVerboseCategory($product) ?>"
                 data-variant="<?php echo $product->productVariant->name ?>"
                 data-position="<?php echo $i ?>"
                 data-price="<?php echo $prices[0]; ?>"
            >
                <div class="product-thumb-info">
                    <div class="product-thumb-info-content">
                        <div class="product-thumb-info-image">
                            <figure class="animation animated fadeInUp img-holder">
                                <a href="<?php echo $app->productUrl($product); ?>">
                                    <img alt=""
                                         class="img-responsive xhttp-loading-icon"
                                         src="/<?php echo $app->lang(); ?>/assets/xhttp-loader-icon.gif"
                                         data-src="<?php echo $app->image($product->getPhoto(1, 562), 'amazon') ?>">
                                </a>
                            </figure>
                        </div>
                        <h4>
                            <a style="font-weight:bold;"><?php echo($product->productBrand->name); ?></a></h4>
                        <span class="item-cat"><small><a
                                    href="<?php echo $app->productUrl($product); ?>"><?php echo strtoupper($product->getName()) ?></a></small></span>
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
                                <span
                                    class="percentage"><?php echo '- ' . floor(($prices[0] - $salePrices[0]) / $prices[0] * 100); ?>
                                    %</span>&ensp;
                                <span class="saleprice"><?php echo $salePrices[0]; ?> &euro;</span>
                            <?php else: ?>
                                <span class="price"><?php echo $prices[0]; ?> &euro;</span>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($pricesAreOnARange == true): ?>
                            <span class="price-notice"><?php tpe($data->variablePriceBySize); ?></span>
                        <?php endif; ?>
                        <?php if ($product->tag->findOneByKey('slug', 'new-arrival')): ?><span
                            class="product-message"><?php tpe($data->newArrivals); ?></span><?php endif; ?>
                        <span
                            class="product-message-hidden"><br><?php echo tp($data->availableSizes) . implode(' | ', $sizes); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php $i++; ?>
        <?php if ($i % $productsPerRow == 0): ?>
        </div>
    <?php endif; ?>
    <?php endforeach; ?>
    <?php if ($i % $productsPerRow != 0): ?>
        </div>
    <?php endif; ?>

<?php endforeach; ?>