<?php
use bamboo\core\theming\CWidgetHelper;
/**
 * @var $app CWidgetHelper
 * */
?>
<div class="row thankyoutextbox">
    <div class="col-md-6">
        <?php

        foreach ($data->pageText as $paragraph) {
            echo $app->parse(t($paragraph), $app->user()->getGender());
        }

        if (!$app->user()->isEmailChanged()) {
            foreach ($data->pageTextCoupon as $paragraph) {
                echo $app->parse(t($paragraph), $app->user()->getGender());
            }
        }

        foreach ($data->pageTextLastpart as $paragraph) {
            echo $app->parse(t($paragraph), $app->user()->getGender());
        }

        ?>
    </div>
    <div class="col-md-6 animation animated fadeInUp">
        <?php if (!$app->user()->isEmailChanged()): ?>
            <div class="thankyou-user-signature"><p><strong><?php echo $app->user()->getName().' '.$app->user()->getSurname(); ?></strong></p></div>
            <img src="/it/assets/bustac.png" class="img-responsive"/>
        <?php endif; ?>
    </div>
</div>