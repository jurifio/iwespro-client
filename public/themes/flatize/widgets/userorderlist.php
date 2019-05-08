
<?php
use bamboo\core\theming\CWidgetHelper;
/**  @var CWidgetHelper $app
 * @var \bamboo\domain\entities\COrder $order
 */
?>
<h2><?php echo $data->title; ?></h2>
<table class="table table-hover table-responsive">
    <thead>
    <tr>
        <?php foreach($data->columns as $column): ?>
            <th><?php tpe($column); ?></th>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach($data->multi as $order): ?>
        <?php $date = new DateTime($order->orderDate); ?>
        <tr>
            <td><a href="myorder/<?php echo $order->id?>"><?php echo $order->id; ?></a></td>
            <td><?php echo $date->format('d/m/Y'); ?></td>
            <td><?php echo $order->orderPaymentMethod->orderPaymentMethodTranslation->getFirst()->name; ?></td>
            <td><?php echo $order->netTotal; ?> &euro;</td>
            <td><?php tpe($order->getPublicOrderStatus()) ?></td>
            <td><?php
                if(!$order->isPaid() && !$order->isCanceled()): ?>
                    <a href="<?php echo $app->application()->orderManager->getPaymentGateway($order)->getUrl($order); ?>"><i class="fa fa-money"></i> <?php tpe($data->retry) ?></a>
                <?php endif; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
        <td colspan="5"><?php tpe($data->footer); ?></td>
    </tr>
    </tfoot>
</table>