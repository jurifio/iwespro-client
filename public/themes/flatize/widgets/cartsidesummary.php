<div id="cartsidesummary" data-action="<?php echo $app->baseUrl().'/xhr/'.$app->lang().'/CartSideSummary'?>" class="featured-box featured-box-secondary sidebar floating-gray-box">
    <div class="box-content">
        <h4><?php tpe($data->cartSummary) ?></h4>
        <table cellspacing="0" class="cart-totals" width="100%">
            <tbody>
                <tr class="cart-subtotal">
                    <th><?php tpe($data->subTotal); ?></th>
                    <td class="product-price">
                        <span class="amount"><?php echo number_format($total,2,'.'); ?> &euro;</span>
                    </td>
                </tr>

                <?php
                /**
                 * Coupon section
                 */
                if(!empty($data->entity->coupon) && $couponSale != 0):?>
                <tr class="coupon">
                    <th><?php tpe($data->coupon) ?></th>
                    <td><?php echo number_format($couponSale,2,'.'); ?> &euro;</td>
                </tr>
                <?php endif;

                /**
                 * Payment method section
                 */
                $difference = 0;

                if(isset($data->entity->orderPaymentMethodId) && isset($data->entity->orderPaymentMethod->modifier) && !is_null($data->entity->orderPaymentMethod->modifier)):?>
                <tr class="payment">
                    <th><?php tpe($data->payment); ?> <?php tpe($data->entity->orderPaymentMethod->name); ?></th>
                    <td>
                        <?php if(strstr($data->entity->orderPaymentMethod->modifier,'%')){
                            $difference = $total * (double) $data->entity->orderPaymentMethod->modifier * 0.01;
                        } else {
                            $difference = (double) $data->entity->orderPaymentMethod->modifier;
                        }
                        echo number_format($difference,2,'.') ?> &euro;<input type="hidden" value="<?php echo $difference ?>" id="coupon" name="coupon">
                    </td>
                </tr>
                <?php endif;
                /**
                 * Shipping section
                 */
                ?>
                 <tr class="shipping">
                    <th><?php tpe($data->shipping) ?></th>
                    <td>
                        <?php if($data->entity->shippingModifier == 0) {
                            echo $data->freeShipping;
                        } else {
                            echo number_format($data->entity->shippingModifier,2,'.')." &euro;";
                        } ?>
                        <input type="hidden" value="<?php echo number_format($data->entity->shippingModifier,2,'.'); ?> &euro;" id="shippingCost" name="shipping_method">
                    </td>
                </tr>

                <tr class="total">
                    <th><?php tpe($data->cartTotal); ?></th>
                    <td class="product-price">
                        <span data-total="" class="amount"><?php echo number_format($data->entity->getNetTotal(),2,'.'); ?> &euro;</span>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php if($checkoutStep == null): ?>
            <p><a href="<?php echo $app->toCart() ?>" type="submit" class="btn btn-default btn-block btn-sm" data-loading-text="Loading..."> <?php tpe($data->updateCart); ?> &nbsp;&nbsp;&nbsp;<i class="fa fa-refresh"></i></a></p>
            <p><a id="goCheckout"
                  data-checkout-step="0"
                  href="<?php echo $nextCheckoutStepAddress ?>"
                  type="submit"
                  class="btn btn-primary btn-block btn-sm"
                  data-loading-text="Loading..."> <?php tpe($data->continue); ?> &nbsp;&nbsp;&nbsp;<i class="fa fa-hand-o-right"></i></a></p>
            <p><a href="<?php echo $app->baseUrlLang() ?>" type="submit" class="btn btn-grey btn-block btn-sm" data-loading-text="Loading..."> <?php tpe($data->goShopping); ?> &nbsp;&nbsp;&nbsp;<i class="fa fa-shopping-cart"></i></a></p>
        <?php elseif($checkoutStep['name'] == 'checkout'): ?>
            <p>
                <a id="goPay"
                   data-checkout-step="<?php echo $checkoutStep['pointer'] ?>"
                   href="<?php echo $nextCheckoutStepAddress ?>"
                   type="submit"
                   data-total-amount="<?php echo number_format(($total + $data->entity->shippingModifier + $difference + $couponSale),2,'.'); ?>"
                   data-order-id="<?php echo $data->entity->id; ?>"
                   class="btn btn-primary btn-block btn-sm"
                   data-loading-text="Loading..."> <?php echo $data->confirmAndContinue; ?> &nbsp;&nbsp;&nbsp;<i class="fa fa-hand-o-right"></i>
                </a>
            </p>
        <?php else: ?>
        <p><a id="goCheckout"
              data-checkout-step="<?php echo $checkoutStep['pointer'] ?>"
              href="<?php echo $nextCheckoutStepAddress ?>"
              type="submit"
              class="btn btn-primary btn-block btn-sm"
              data-loading-text="Loading..."> <?php tpe($data->continue); ?> &nbsp;&nbsp;&nbsp;<i class="fa fa-hand-o-right"></i></a></p>
        <?php endif; ?>
    </div>
</div>