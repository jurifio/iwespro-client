<?php

use bamboo\core\base\CObjectCollection;
use bamboo\core\theming\CWidgetHelper;

/**
 * @var CWidgetHelper $app
 */
?>

<div id="cartsummary" data-address="cart.default">

    <?php if (!isset($data->entity) || !($data->entity->cartLine instanceof CObjectCollection) || $data->entity->cartLine->isEmpty()): ?>
        <div class="featured-box featured-box-cart floating-gray-box">
            <div class="box-content">
                <h4><?php tpe($data->emptyCartTitle); ?></h4>
                <p><?php tpe($data->emptyCartText); ?></p>
            </div>
        </div>
    <?php else: ?>

        <div class="featured-box featured-box-cart floating-gray-box">
            <div class="box-content">
                <h4><?php tpe($data->shippingToTitle); ?> Italia</h4>
                <form method="post" action="">

                    <?php foreach ($data->entity->cartLine as $line):
                        /** @var \bamboo\domain\entities\CCartLine $line */
                        ?>
                        <div class="row shop_table cart_table_item"
                             data-id="<?php echo $line->productPublicSku->product->printId() ?>"
                             data-price="<?php echo $line->productPublicSku->getActivePrice() ?>"
                             data-quantity="<?php echo $line->qty ?>"
                             data-name="<?php echo $line->productPublicSku->product->getName() ?>"
                             data-list="<?php echo 'catalog'; ?>"
                             data-brand="<?php echo $line->productPublicSku->product->productBrand->name; ?>"
                             data-category="<?php echo $app->getVerboseCategory($line->productPublicSku->product) ?>"
                             data-variant="<?php echo $line->productPublicSku->product->productVariant->name ?>">
                            <div class="col-md-3 col-xs-4 product-thumbnail">
                                <a href="<?php echo $app->productUrl($line->productPublicSku->product); ?>">
                                    <img alt="" width="120"
                                         src="<?php echo $app->image($line->productPublicSku->product->getPhoto(1, 281), 'amazon') ?>"
                                         class="img-responsive">
                                </a>
                            </div>
                            <div class="col-md-6 col-xs-8 product-name">
                                <p class="product-brand-name"><a
                                            href="<?php echo $app->productUrl($line->productPublicSku->product); ?>"><?php echo $line->productPublicSku->product->productBrand->name; ?></a>
                                </p>
                                <p class="product-description"><a
                                            href="<?php echo $app->productUrl($line->productPublicSku->product); ?>"><?php echo !is_null($line->productPublicSku->product->productNameTranslation->getFirst()) ? $line->productPublicSku->product->productNameTranslation->getFirst()->name : $line->productPublicSku->product->itemno; ?></a>
                                </p>
                                <p class="product-id"
                                   data-product-id="<?php echo $line->productPublicSku->printPublicSku(); ?>">ID: <a
                                            href="<?php echo $app->productUrl($line->productPublicSku->product); ?>"><?php echo $line->productPublicSku->printPublicSku(); ?></a>
                                </p>
                                <p class="product-quantity">
                                    <?php tpe($data->quantityLabel); ?>: <input type="text" disabled="disabled"
                                                                                class="input-qty"
                                                                                value="<?php echo $line->qty; ?>"
                                                                                name="quantity" min="1" step="1">
                                    <span class="quantity">
                                <button
                                        data-action="<?php echo $app->baseUrl() . '/xhr/' . $app->lang() . '/CartSummary' ?>"
                                        data-pid="<?php echo $line->id ?>" class="btn btn-xxs btn-grey plus"><i
                                            class="fa fa-plus"></i></button>
                                <button
                                        data-action="<?php echo $app->baseUrl() . '/xhr/' . $app->lang() . '/CartSummary' ?>"
                                        data-pid="<?php echo $line->id ?>" class="btn btn-xxs btn-grey minus"><i
                                            class="fa fa-minus"></i></button>
                            </span>
                                </p>
                                <p class="product-size"><?php echo $data->sizeLabel; ?>:
                                    <select class="full-width selectpicker" style="width: 102px;"
                                            placeholder="Seleziona la taglia" data-address="cart.default"
                                            data-action="<?php echo $app->baseUrl() . '/xhr/' . $app->lang() . '/CartSummary' ?>"
                                            data-pid="<?php echo $line->id ?>" data-init-plugin="selectize"
                                            tabindex="-1"
                                            title="productSizeId" name="productSizeId" id="productSizeId">
                                        <?php foreach ($skus[$line->id] as $sku):
                                            if ($sku->stockQty != 0) { ?>
                                                <option value="<?php echo $sku->productSizeId ?>" required
                                                <?php echo ($sku->productSizeId == $line->productPublicSku->productSize->id) ? 'selected="selected"' : ""; ?> >
                                                <?php echo $sku->productSize->name . "";
                                            } ?></option>
                                            <?php
                                        endforeach; ?>
                                    </select>
                            </div>
                            <div class="col-md-2 col-xs-6 product-subtotal">
                                <?php if ($line->productPublicSku->isOnSale) : ?>
                                    <span
                                            class="amount oldprice"><?php echo money_format("%.2n", $line->productPublicSku->price * $line->qty); ?>
                                        &euro;</span>
                                    <br/>
                                    <span
                                            class="amount saleprice"><?php echo money_format("%.2n", $line->productPublicSku->salePrice * $line->qty); ?>
                                        &euro;</span>
                                <?php else: ?>
                                    <span
                                            class="amount"><?php echo money_format("%.2n", $line->productPublicSku->price * $line->qty); ?>
                                        &euro;</span>
                                <?php endif; ?>
                                <?php if ($line->getCouponDiscount()): ?>
                                    <div class="cart-line-coupon">
                                        <span class="amount">Coupon:</span><br/>
                                        <span class="amount"><?php echo money_format("%.2n", $line->getCouponDiscount() * $line->qty); ?>
                                            &euro;</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-1 col-xs-6 product-remove">
                                <a class="remove" href="#"
                                   data-action="<?php echo $app->baseUrl() . '/xhr/' . $app->lang() . '/CartSummary' ?>"
                                   data-pid="<?php echo $line->id ?>">
                                    <i class="fa fa-times-circle">&nbsp;</i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </form>
            </div>
        </div>
    <?php endif; ?>
</div>