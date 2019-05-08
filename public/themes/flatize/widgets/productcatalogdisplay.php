<?php

use bamboo\domain\entities\CProduct;
use bamboo\helpers\CWidgetCatalogHelper;
use bamboo\core\theming\CWidgetDataBag;

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
$sizes = [];
foreach ($product->productPublicSku as $sku) {
    if ($sku->stockQty < 1) continue;
    if ($sku->price == 0) continue;
    $prices[] = $sku->price;
    $salePrices[] = $sku->salePrice;
    $sizes[] = $sku->getPublicSize()->name;

}

if (empty($prices) || ($sale && empty($salePrices))) return;
sort($prices);

if (!(array_sum($prices) / count($prices)) == $prices[0]) {
    $pricesAreOnARange = true;
}
if ($sale && !(array_sum($salePrices) / count($salePrices)) == $salePrices[0]) {
    $pricesAreOnARange = false;
}
$groupedSkus = $product->productPublicSku;

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
    <meta itemprop="description" content="<?php echo strip_tags($product->getDescription()) ?>"/>

    <?php $sTags = $product->productHasTag; ?>
    <div class="product-thumb-info">
        <div class="product-thumb-info-content">
            <div class="product-thumb-info-image">
                <figure class="animation animated fadeInUp img-holder" style="position: relative">
                    <a href="<?php echo $productUrl; ?>">
                        <img alt="<?php echo $product->productBrand->name . ' - ' . $verboseCategory ?>"
                             class="img-responsive xhttp-loading-icon"
                             src="/assets/xhttp-loader-icon.gif"
                             data-src="<?php echo $app->image($product->getPhoto(1, \bamboo\domain\entities\CProductPhoto::SIZE_THUMB), 'amazon') ?>"></a>
                    <?php
                    if (!empty($sTags)):
                    foreach ($sTags as $pht):
                    ?>
                        <div class="product-message-parent-bottom">
                            <div class="product-message-special">
                                <?php
                                switch ($pht->position){
                                    case 2: ?>
                                <div class="corner"></div>
                                <div class="testo">
                                    <?php echo $pht->tag->tagTranslation->getFirst()->name; ?>
                                </div>
                                <?php break;
                                    case 3: ?>
                                <div class="corner-right"></div>
                                <div class="testo-right">
                                    <?php echo $pht->tag->tagTranslation->getFirst()->name; ?>
                                </div>
                                <?php break; }?>
                            </div>
                        </div>

                    <?php endforeach;
                    endif; ?>
                </figure>
            </div>
            <div class="product-thumb-writing">
                <h4>
                    <a href="<?php echo $app->hrefToCatalogBrand($product->productBrand); ?>"
                       style="font-weight:bold;"><span
                                itemprop="brand"><?php echo($product->productBrand->name); ?></span></a></h4>
                <span class="item-cat"><small><a
                                href="<?php echo $productUrl; ?>"><?php echo strtoupper($productName) ?></a></small></span>
                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <link itemprop="availability" href="http://schema.org/InStock"/>
                    <meta itemprop="priceCurrency" content="EUR"/>
                    <meta itemprop="price" content="<?php echo $prices[0] ?>"/>
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
                    <?php
                    $currentUser = \Monkey::app()->getUser();
                    $currentUserId = $currentUser->id;
                    if (!empty($currentUserId)) { ?>
                        <span class="wishlist"><button id="addItemToWishList"
                                                       data-action="<?php echo $app->baseUrl() . '/xhr/' . $app->lang() . '/ProductCatalogDisplay' ?>"
                                                       data-product-variant="<?php echo $product->printId() ?>"
                                                       data-product="<?php echo $product->id ?>"
                                                       data-variant="<?php echo $product->productVariant->id ?>"
                                                       data-lang="<?php echo $app->lang() ?>">
                                <i class="fa fa-heart"></i>
                            </button>
                            </span>
                    <?php } ?>
                </div>
                <?php if ($pricesAreOnARange == true): ?>
                    <span class="price-notice"><?php tpe($data->variablePriceBySize); ?></span>
                <?php endif; ?>
                <?php if ($product->tag->findOneByKey('slug', 'new-arrival')): ?>
                    <span class="product-message"><?php tpe($data->newArrivals); ?></span>
                <?php endif; ?>
                <?php
                if (!empty($sTags)):
                    /** @var \bamboo\domain\entities\CTag $tag */
                    foreach ($sTags as $pht):
                        if($pht->position == 1){
                        ?>
                        <span class="product-message-gold"><?php echo $pht->tag->tagTranslation->getFirst()->name; ?></span>
                    <?php }
                    endforeach;
                endif; ?>

                <span class="product-message-hidden"><?php echo tp($data->availableSizes) . implode(' | ', $sizes); ?></span>
            </div>
        </div>
    </div>
</div>