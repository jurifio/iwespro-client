<?php
/**
 * @var $app CWidgetHelper
 * @var $data CWidgetDatabag
 */
use bamboo\core\theming\CWidgetHelper;
use bamboo\core\theming\CWidgetDataBag;

/** @var $product \bamboo\domain\entities\CProduct */
$product = $data->entity;
/** @var $groupedSkus \bamboo\domain\entities\CProductPublicSku[] */
$groupedSkus = $product->productPublicSku;
?>
<div id="productDetailForm" class="cart">
    <?php $gotIt = false;
    foreach ($groupedSkus as $sku) {
        if ($sku->stockQty < 1) continue;
        $gotIt = true;
        break;
    }
    if ($gotIt):
        ?>
        <div class="row selectors">
            <div class="col-md-6">
                <select id="selectVariant" class="btn btn-icon">
                    <?php foreach ($product->getVariants() as $variant):
                        /** @var \bamboo\domain\entities\CProduct $variant */
                        ?>
                        <option <?php echo $product->productVariantId == $variant->productVariantId ? 'selected="selected"' : ''; ?>
                                value="<?php echo $variant->printId() ?>"
                                data-url="<?php echo $app->productUrl($variant) ?>">
                            <?php echo $variant->productVariant->name;
                            if(!empty($variant->productVariant->description)) echo ' - ' . $variant->productVariant->description;
                            else if($variant->productColorGroup && $variant->productColorGroup->id != 1) echo ' - ' . $variant->productColorGroup->getLocalizedName() ?>

                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6">
                <select id="selectSize" class="btn btn-icon">
                    <option disabled="disabled" selected="selected"><?php echo $data->sizeSelector; ?></option>
                    <?php foreach ($groupedSkus as $sku): ?>
                        <?php if ($sku->stockQty < 1) continue; ?>
                        <option value="<?php echo $sku->productSize->id ?>"
                                data-public-sku="<?php echo $sku->printId(); ?>"
                                data-isOnSale="<?php echo $sku->isOnSale ?>"
                                data-salePrice="<?php echo $sku->salePrice ?>"
                                data-fullPrice="<?php echo $sku->price ?>"
                                data-price="<?php echo $sku->getActivePrice(); ?>"><?php echo $sku->productSize->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button id="addItemToCart" class="btn btn-primary btn-icon btn-max-width pull-right"
                        data-action="<?php echo $app->baseUrl() . '/xhr/' . $app->lang() . '/AddToCartBox' ?>"
                        data-product-variant="<?php echo $product->printId() ?>"
                        data-product="<?php echo $product->id ?>"
                        data-variant="<?php echo $product->productVariantId ?>"
                        data-lang="<?php echo $app->lang() ?>">
                    <i class="fa fa-cart-plus"></i> <?php tpe($data->cartButton); ?>
                </button>
            </div>
        </div>
        <?php
        $currentUser = \Monkey::app()->getUser();
        $currentUserId = $currentUser->id;
        if(!empty($currentUserId)){ ?>
        <div class="row">
            <div class="col-md-12">
                <button id="addItemToWishList" class="btn btn-primary btn-icon btn-max-width pull-right"
                        data-action="<?php echo $app->baseUrl() . '/xhr/' . $app->lang() . '/AddToCartBox' ?>"
                        data-product-variant="<?php echo $product->printId() ?>"
                        data-product="<?php echo $product->id ?>"
                        data-variant="<?php echo $product->productVariantId ?>"
                        data-lang="<?php echo $app->lang() ?>">
                    <i class="fa fa-heart"></i> <?php tpe($data->wishListButton); ?>
                </button>
            </div>
        </div>
    <?php } ?>
        <div class="row">
            <div class="col-md-12" style="margin-top:30px;margin-bottom:0;text-align:left;">
                <div class="row">
                    <div class="col-md-6 contact-label"><?php echo $data->calltoLabel; ?>:</div>
                    <div class="col-md-6 contact-value"><a class="phone-number" href="tel:+390237920266"
                                                           style=""><i
                                    class="fa fa-phone"></i> +39 02&shy;3792&shy;0266</a></div>
                </div>
                <div class="row">
                    <div class="col-md-6 contact-label"><?php echo $data->mailtoLabel; ?>:</div>
                    <div class="col-md-6 contact-value"><a href="mailto:support@pickyshop.com"><i
                                    class="fa fa-envelope"></i> support@pickyshop.com</a>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-md-12 ">
                <h4><strong><?php tpe($data->notPresent); ?></strong></h4>
            </div>
        </div>
    <?php endif; ?>
</div>