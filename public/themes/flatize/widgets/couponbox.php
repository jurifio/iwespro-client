<div id="couponbox" class="featured-box featured-box-secondary floating-gray-box coupon"
     data-action="<?php echo $app->urlForXhr() . '/CouponBox' ?>">
    <div class="box-content">
        <h4><?php tpe($data->title); ?></h4>
        <?php if (empty($data->entity->couponId)): ?>
            <p><?php tpe($data->text); ?></p>
            <form action="" id="coupon-form" method="post">
                <input type="hidden" id="widgetAddress" name="widgetAddress" value="cart.default">
                <div class="form-group">
                    <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title=""
                       tabindex="-1"></a>
                    <label class="sr-only"><?php echo $data->title; ?></label>
                    <input type="text" value="" id="name" name="coupon.name" maxlength="20" class="form-control"
                           placeholder="<?php tpe($data->hint); ?>" style="font-size:13px !important;">
                </div>
                <div class="form-group">
                    <input type="submit" value="<?php tpe($data->button); ?>" class="btn btn-checkout btn-block btn-sm"
                           data-loading-text="Loading...">
                </div>
            </form>
        <?php else: ?>
            <div class="row" style="display: grid">
                <div class="col-md-8">
                    <p><?php tpe($data->entity->coupon->amountType == 'F' ? $data->textCouponEur : $data->textCouponPercent, $data->entity->coupon->amount); ?></p>
                </div>
                <div class="col-md-4">
                    <input type="hidden" id="widgetAddress" name="widgetAddress" value="cart.default">
                    <input id="deleteCoupon" type="submit" value="<?php tpe($data->cancelButton); ?>"
                           class="btn btn-grey btn-sm"
                           data-loading-text="Loading...">
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>