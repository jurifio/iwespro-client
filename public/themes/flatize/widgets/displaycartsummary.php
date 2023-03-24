<?php

use bamboo\core\base\CObjectCollection;
use bamboo\core\theming\CWidgetHelper;

/**
 * @var CWidgetHelper $app
 */
?>
<div id="displaycartsummary" data-address="cart.default">

    <?php if (!isset($data->entity) || !($data->entity->cartLine instanceof CObjectCollection) || $data->entity->cartLine->isEmpty()): ?>
        <div class="featured-box featured-box-cart floating-gray-box-bottom">
            <div class="box-content">
                <h4><?php tpe($data->emptyCartTitle); ?></h4>
                <p><?php tpe($data->emptyCartText); ?></p>
            </div>
        </div>
    <?php else: ?>

        <div class="featured-box featured-box-cart floating-gray-box">
            <div class="box-content">
                <h4><?php tpe($data->yourOrderLabel) ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                            class="product-edit-checkout"><a href="<?php echo $app->toCart(); ?>"><i
                                    class="fa fa-edit"></i> <?php tpe($data->editLabel) ?></a></span></h4>
                <form method="post" action="">
                    <table cellspacing="0" class="shop_table" width="100%">
                        <tbody>
                        <?php foreach ($data->entity->cartLine as $val):
                            /** @var \bamboo\domain\entities\CCartLine $val */ ?>
                            <tr class="cart_table_item"
                                data-id="<?php echo $val->productPublicSku->product->printId() ?>"
                                data-price="<?php echo $val->productPublicSku->getActivePrice() ?>"
                                data-quantity="<?php echo $val->qty ?>"
                                data-name="<?php echo $val->productPublicSku->product->getName() ?>"
                                data-list="<?php echo 'catalog'; ?>"
                                data-brand="<?php echo $val->productPublicSku->product->productBrand->name; ?>"
                                data-category="<?php echo $app->getVerboseCategory($val->productPublicSku->product) ?>"
                                data-variant="<?php echo $val->productPublicSku->product->productVariant->name ?>"
                            >
                                <td class="product-thumbnail">
                                    <a href="<?php echo $app->productUrl($val->productPublicSku->product); ?>">
                                        <img alt="" width="120"
                                             src="<?php echo $app->image($val->productPublicSku->product->getPhoto(1, 281), 'amazon') ?>">
                                    </a>
                                </td>
                                <td class="product-name">
                                    <p class="product-brand-name"><a
                                                href="<?php echo $app->productUrl($val->productPublicSku->product); ?>"><?php echo $val->productPublicSku->product->productBrand->name; ?></a>
                                    </p>
                                    <p class="product-description"><a
                                                href="<?php echo $app->productUrl($val->productPublicSku->product); ?>"><?php echo $val->productPublicSku->product->getName(); ?></a>
                                    </p>
                                    <p class="product-id">ID: <a
                                                href="<?php echo $app->productUrl($val->productPublicSku->product); ?>"><?php echo $val->productPublicSku->printPublicSku(); ?></a>
                                    </p>
                                    <p class="product-size"><?php echo $data->sizeLabel; ?>
                                        : <?php echo $val->productPublicSku->productSize->name; ?></p>

                                </td>
                                <td class="product-subtotal">
                                    <?php if ($val->productPublicSku->isOnSale) : ?>
                                        <span class="amount oldprice"><?php echo number_format(($val->productPublicSku->price * $val->qty),2,'.'); ?>
                                            &euro;</span><br/>
                                        <span class="amount saleprice active-price"><?php echo number_format( ($val->productPublicSku->salePrice * $val->qty),2,'.'); ?>
                                            &euro;</span>
                                    <?php else: ?>
                                        <span class="amount active-price"><?php echo number_format( $val->productPublicSku->price * $val->qty,2,'.'); ?>
                                            &euro;</span>
                                    <?php endif; ?>
                                    <?php if ($val->getCouponDiscount()): ?>
                                        <div class="cart-line-coupon">
                                            <span class="amount">Coupon:</span><br/>
                                            <span class="amount"><?php echo number_format($val->getCouponDiscount() * $val->qty,2,'.',''); ?>
                                                &euro;</span>
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>
