<?php
use bamboo\core\theming\CWidgetHelper;
/**
 * @var $app CWidgetHelper
 * */

$gender = $app->user()->getGender(); ?>

<div class="row thankyoutextbox">
    <div class="col-md-6">
        <?php if ($app->user()->isEmailChanged()): ?>
            <?php foreach ($data->pageText as $paragraph):
                tpe($app->parse($paragraph, $gender));
            endforeach; ?>
        <?php else: ?>
            <?php foreach ($data->pageTextCoupon as $paragraph):
                tpe($app->parse($paragraph, $gender));
            endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="col-md-6 animation animated fadeInUp">
        <?php if (!$app->user()->isEmailChanged()): ?>
            <div class="thankyou-coupon">
                <?php tpe($app->parse($data->ticket, $gender)); ?>
            </div>
            <img src="/it/assets/bustaa.jpg" class="img-responsive"/>
        <?php endif; ?>
    </div>
</div>