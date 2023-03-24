<?php
use bamboo\core\theming\CWidgetHelper;
use bamboo\core\db\pandaorm\entities\AEntity;
/**
 * @var $app CWidgetHelper
 * */
if (!$data->entity instanceof AEntity): ?>

<div class="hidden-sm hidden-xs menu-column">
    <?php tpe($data->noOrderText); ?>
</div>

<?php else: ?>

<div class="row thankyoutextbox">
    <div class="col-md-6 animation animated fadeInUp">
        <h2><?php tpe($data->pageTitle); echo ' <strong>'.$data->entity->id.'</strong>'; ?></h2>
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class=""><?php tpe($data->mainSectionTitle); ?></a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" style="">
                    <div class="panel-body">
                        <?php foreach ($data->mainSectionText as $paragraph):
                            tpe($paragraph);
                        endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed"><?php echo $data->OrderPaymentMethod->{$data->entity->orderPaymentMethodId}->titleLabel?></a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" style="height: 0px;">
                    <div class="panel-body">
                        <p>
                            <?php if ($data->entity->orderPaymentMethodId == 5):
                                echo $data->OrderPaymentMethod->{$data->entity->orderPaymentMethodId}->text;
                                echo number_format($data->entity->netTotal,2,'.'); ?> &euro;
                            <?php else:
                                echo $data->OrderPaymentMethod->{$data->entity->orderPaymentMethodId}->text;
                            endif; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed"><?php tpe($data->socialSectionTitle); ?></a> </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php foreach ($data->socialSectionText as $paragraph):
                            tpe($paragraph);
                        endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="order-data-layer" data-order-id="<?php echo $data->entity->id ?>" style="display: none">
        <ul id="order-product-list">
            <?php foreach ($data->entity->orderLine as $orderLine): ?>
                    <li class="order-line" data-order-product-id="<?php echo $orderLine->productSku->product->printId()?>" data-product-price="<?php echo $orderLine->activePrice ?>"></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-md-6" style="text-align:right;">
        <img src="/it/assets/bag3.jpg" />
    </div>
</div>

<div class="row">
    <div class="col-md-6">

    </div>
</div>

<?php endif; ?>