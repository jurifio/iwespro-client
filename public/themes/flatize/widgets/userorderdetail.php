<?php /** @var \bamboo\domain\entities\COrder $order */
        /** @var @var CWidgetHelper $app*/
    $order = $data->entity;
?>
<h2><?php tpe('Riepilogo Ordine: %s', $order->id) ?></h2>
<div class="box-order-recap featured-box featured-box-cart floating-gray-box">
    <div class="box-content">
        <div class="row">
            <div class="col-sm-12">
                <ol class="progress-track">
                    <?php foreach ($order->getPublicOrderStatuses() as $key => $name): ?>
                    <li class="<?php echo $order->isStatusPassed($key) ? "progress-done".( $order->isStatusActual($key) ? " progress-current" : "" ) : "progress-todo" ?>">
                        <div>
                            <i class="marker"></i>
                            <div class="icon-wrap">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </div>
                            <span class="progress-text"><?php tpe($name); ?></span>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="box-order-recap featured-box featured-box-cart floating-gray-box">
    <div class="box-content">
        <div class="row">
            <div class="col-sm-8">
                <div>
                    <h4><?php tpe("Stato dell'ordine: %s", $order->getPublicOrderStatus()) ?></h4>
                    <table class="table table-responsive shop_table condensed">
                        <?php foreach ($order->orderLine as $orderLine):
                            /** @var \bamboo\domain\entities\COrderLine $orderLine */
                            ?>
                            <tr class="cart_table_item"
                                data-id="<?php echo $orderLine->productSku->product->printId() ?>"
                                data-price="<?php echo $orderLine->productSku->getActivePrice() ?>"
                                data-name="<?php echo $orderLine->productSku->product->getName() ?>"
                                data-list="<?php echo 'catalog'; ?>"
                                data-brand="<?php echo $orderLine->productSku->product->productBrand->name; ?>"
                                data-category="<?php echo $app->getVerboseCategory($orderLine->productSku->product) ?>"
                                data-variant="<?php echo $orderLine->productSku->product->productVariant->name ?>"
                            >
                                <td class="product-thumbnail">
                                    <a href="<?php echo $app->productUrl($orderLine->productSku->product); ?>">
                                        <img alt="" width="95" src="<?php echo $app->image($orderLine->productSku->product->getPhoto(1, 281), 'amazon') ?>">
                                    </a>
                                </td>
                                <td class="product-name">
                                    <p class="product-brand-name"><a href="<?php echo $app->productUrl($orderLine->productSku->product); ?>"><?php echo $orderLine->productSku->product->productBrand->name; ?></a></p>
                                    <p class="product-description"><a href="<?php echo $app->productUrl($orderLine->productSku->product); ?>"><?php echo $orderLine->productSku->product->getName(); ?></a></p>
                                    <p class="product-id">ID: <a href="<?php echo $app->productUrl($orderLine->productSku->product); ?>"><?php echo $orderLine->productSku->printPublicSku(); ?></a></p>
                                    <p class="product-size"><?php tpe("Taglia"); ?>: <?php echo $orderLine->productSku->getPublicSize()->name; ?></p>

                                </td>
                                <td class="product-subtotal">
                                    <span class="amount active-price"><?php echo number_format($orderLine->activePrice,2,'.'); ?> &euro;</span>
                                    <?php if($orderLine->couponCharge): ?>
                                        <div class="cart-line-coupon">
                                            <span class="amount">Coupon:</span><br />
                                            <span class="amount"><?php echo number_format( $orderLine->couponCharge,2,'.'); ?> &euro;</span>
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="condensed-info">
                    <h4><?php tpe('Situazione Ordine') ?></h4>
                    <ul class="list-unstyled list-order-data">
                        <li>
                            <span class="list-title"><?php tpe("Stato dell'ordine") ?>: </span>
                            <span><?php echo $order->orderStatus->getLocalizedName() ?></span>
                        </li>
                        <li>
                            <span class="list-title"><?php tpe('Totale') ?>:</span>
                            <span><?php echo number_format( $order->netTotal) ?></span>
                        </li>
                        <li>
                            <span class="list-title"><?php tpe('Pagamento') ?>:</span>
                            <?php if ($order->isPaid()): ?>
                                <span class="order-data-green"><i class="fa fa-check-square-o" aria-hidden="true"></i></span>
                            <?php else: ?>
                                <span><?php tpe('Non Pagato') ?></span>
                            <?php endif; ?>
                        </li>
                        <?php if (!$order->isPaid()): ?>
                        <li>
                            <span class="list-title"><?php tpe('Azione') ?>:</span>
                            <span><a href="<?php echo $order->getOrderPaymentUrl(); ?>"><i class="fa fa-money"></i> <?php tpe('Ritenta Pagamento') ?></a></span>
                        </li>
                        <?php endif;
                        /** @var \bamboo\domain\entities\CShipment $shipment */
                            $shipment = $order->getLastShipmentToClient();
                            if($shipment != null): ?>
                        <li>
                            <span class="list-title">Spedizione</span>
                            <ul>
                                <li>
                                    <span class="list-title"><?php tpe('Partenza') ?>:</span>
                                    <span><?php echo \bamboo\utils\time\STimeToolbox::EurFormattedDate($shipment->shipmentDate); ?></span>
                                </li>
                                <li>
                                    <span class="list-title"><?php tpe('Vettore') ?>:</span>
                                    <span><?php echo $shipment->carrier->name; ?></span>
                                </li>
                                <li>
                                    <span class="list-title"><?php tpe('Tracking Number') ?>:</span>
                                    <span><?php echo $shipment->trackingNumber; ?></span>
                                </li>
                                <li>
                                    <span class="list-title"><?php tpe('Arrivo') ?>:</span>
                                    <span><?php echo $shipment->deliveryDate ?? $shipment->predictedDeliveryDate; ?></span>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="box-order-recap featured-box featured-box-cart floating-gray-box">
    <div class="box-content">
        <div class="row">
            <div class="col-sm-6">
                <address class="address-condensed">
                    <h4><?php tpe('Indirizzo di spedizione') ?></h4>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fa fa-user"></i> <?php echo $order->shipmentAddress->name . ' ' . $order->shipmentAddress->surname; ?>
                        </li>
                        <li><i class="fa fa-map-marker"></i> <?php echo $order->shipmentAddress->address; ?></li>
                        <li><i class="fa fa-map-marker"></i> <?php echo $order->shipmentAddress->postcode; ?>
                            - <?php echo $order->shipmentAddress->city; ?>
                            (<?php echo $order->shipmentAddress->province; ?>)
                        </li>
                        <?php if (!empty($order->shipmentAddress->extra)): ?>
                            <li> <?php echo $order->shipmentAddress->extra; ?> </li> <?php endif; ?>
                        <li>
                            <i class="fa fa-map-marker"></i> <?php echo $order->shipmentAddress->country->name; ?>
                        </li>
                        <li><i class="fa fa-phone"></i> <?php echo $order->shipmentAddress->phone; ?></li>
                    </ul>
                </address>
            </div>
            <div class="col-sm-6">
                <address class="address-condensed">
                    <h4><?php tpe('Indirizzo di Fatturazione') ?></h4>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fa fa-user"></i> <?php echo $order->billingAddress->name . ' ' . $order->billingAddress->surname; ?>
                        </li>
                        <li><i class="fa fa-map-marker"></i> <?php echo $order->billingAddress->address; ?></li>
                        <li><i class="fa fa-map-marker"></i> <?php echo $order->billingAddress->postcode; ?>
                            - <?php echo $order->billingAddress->city; ?>
                            (<?php echo $order->shipmentAddress->province; ?>)
                        </li>
                        <?php if (!empty($order->shipmentAddress->extra)): ?>
                            <li> <?php echo $order->billingAddress->extra; ?> </li> <?php endif; ?>
                        <li><i class="fa fa-map-marker"></i> <?php echo $order->billingAddress->country->name; ?>
                        </li>
                        <li><i class="fa fa-phone"></i> <?php echo $order->billingAddress->phone; ?></li>
                    </ul>
                </address>
            </div>
        </div>
    </div>
</div>