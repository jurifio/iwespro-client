<div class="box-content featured-box featured-box-secondary floating-gray-box payment">
    <h4><?php echo $data->title ?> <a href="<?php echo $app->toPaymentSelection() ?>"><!<i class="pull-right fa fa-edit"></i></a></h4>
    <div> <!--<i class="fa <?php echo $data->{$data->entity->orderPaymentMethod->name.'Icon'}?>"></i>--> <?php echo $data->entity->orderPaymentMethod->orderPaymentMethodTranslation->getFirst()->name; ?> </div>
</div>