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
        <?php foreach ($data->pageTextLastpart as $paragraph):
                tpe($app->parse($paragraph, $gender));
        endforeach; ?>
    </div>
    <div class="col-md-6 animation animated fadeInUp">
        <?php if (!$app->user()->isEmailChanged()): ?>
            <img src="/it/assets/bustac.png" class="img-responsive"/>
        <?php endif; ?>
    </div>
</div>