<?php

use bamboo\domain\entities\CProduct;
use bamboo\helpers\CWidgetCatalogHelper;

/**
 * @controller CProductgridController
 * @var $product CProduct
 * @var $app CWidgetCatalogHelper
 * @var $data ->multi CObjectCollection
 */

$product = $data->entity;
if (!stristr($app->image($product->getPhoto(1, \bamboo\domain\entities\CProductPhoto::SIZE_THUMB), 'amazon'), 'jpg')) {
    $app->application()->eventManager->triggerEvent('catalogPhotoMissing', ['productIds' => $product->getIds()]);
    return;
}

$prices = [];
$salePrices = [];
$pricesAreOnARange = false;
$sale = $product->isOnSale();
foreach ($product->productPublicSku as $sku) {
    if ($sku->stockQty < 1) continue;
    $prices[] = $sku->price;
    $salePrices[] = $sku->salePrice;
}
sort($prices);
if (empty($prices)) return;
if (!(array_sum($prices) / count($prices)) == $prices[0]) {
    $pricesAreOnARange = true;
}
if ($sale > 0 && !(array_sum($salePrices) / count($salePrices)) == $salePrices[0]) {
    $pricesAreOnARange = false;
}


/** Metatada preparation */
$verboseCategory = $product->getLocalizedProductCategories();
$productName = $product->getName();
$productCpf = $product->printCpf(' ');
$productUrl = $app->productUrl($product);
?>

<div itemprop="item" itemscope itemtype="http://schema.org/Product" class="product product-display-box"
     data-id="<?php echo $product->printId() ?>"
     data-name="<?php echo $productName ?>"
     data-list="<?php echo 'catalog'; ?>"
     data-brand="<?php echo $product->productBrand->name; ?>"
     data-category="<?php echo $verboseCategory ?>"
     data-variant="<?php echo $product->productVariant->name ?>"
     data-price="<?php echo $prices[0]; ?>"
     data-sale-tag="<?php echo $product->tag->findOneByKey('slug', 'sales') ? 'true' : 'false' ?>"
>
    <meta itemprop="category" content="<?php echo $verboseCategory ?>"/>
    <meta itemprop="mpn" content="<?php echo $productCpf ?>"/>
    <meta itemprop="image"
          content="<?php echo $app->image($product->getPhoto(1, \bamboo\domain\entities\CProductPhoto::SIZE_BIG), 'amazon', false) ?>"/>
    <meta itemprop="name" content="<?php echo $productName ?>"/>
    <meta itemprop="url" content="<?php echo $productUrl ?>"/>
    <meta itemprop="mainEntityOfPage" content="<?php echo $productUrl ?>"/>
    <meta itemprop="color" content="<?php echo $product->productColorGroup->getLocalizedName() ?>"/>
    <meta itemprop="description" content="<?php echo htmlspecialchars($product->getDescription()) ?>"/>


    <div class="item product">
        <div class="product-thumb-info">
            <div class="product-thumb-info-image">
                <figure class="animation animated fadeInUp img-holder">
                    <a href="<?php echo $app->productUrl($product); ?>">
                        <img alt=""
                             class="img-responsive"
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
                    <span class="price-notice"><?php tpe($data->variablePriceBySize); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

