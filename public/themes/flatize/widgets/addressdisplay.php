<?php

use bamboo\core\theming\CWidgetHelper;

/**
 * @var $app CWidgetHelper;
 */

if (isset($data->entity) && !empty($data->entity)) : ?>
    <address class="box-content featured-box featured-box-secondary floating-gray-box">
        <h4><?php tpe($data->title) ?> <a href="<?php echo $app->toAddressForm() ?>"><!-- <i class="pull-right fa fa-edit"></i>--></a></h4>
        <ul class="list-unstyled address">
            <li><?php echo $data->entity->name.' '.$data->entity->surname; ?></li>
            <li><?php echo $data->entity->address; ?></li>
            <li> <?php echo $data->entity->postcode; ?> - <?php echo $data->entity->city; ?> (<?php echo $data->entity->province; ?>) - <?php echo $data->entity->country->name; ?></li>
            <?php if(!empty($data->entity->extra )): ?><li> <?php echo $data->entity->extra; ?> </li> <?php endif; ?>

            <li> <i class="fa fa-phone"></i> <?php echo $data->entity->phone; ?></li>
        </ul>
    </address>
<?php endif; ?>