<?php

use bamboo\core\theming\CMailerHelper;
use bamboo\domain\repositories\CProductSkuRepo;
use bamboo\domain\repositories\CProductRepo;

/** @var $app CMailerHelper */
/** @var CProductSkuRepo $skuRepo */
$skuRepo = $app->getRepo('ProductSku');
/** @var CProductRepo $productRepo */
/** @var \bamboo\domain\entities\COrder $order */
$productRepo = $app->getRepo('Product');
?>

<!doctype html>
<html lang="<?php echo $app->lang(); ?>">
<head>
    <meta charset="utf-8">
    <title>Conferma Ordine</title>
</head>

<body style="margin: 0px">
<table align="center" width="100%" cellpadding="0" cellspacing="0" border="0" data-mobile="true" dir="ltr"
       data-width="600" style="font-size: 16px; background-color:#f3f3f3;">
    <tbody>
    <tr>
        <td align="center" valign="top" style="margin:0;padding:42px 0;">
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600" bgcolor="white"
                   style="background-position: center top; background-repeat: no-repeat; background-size: cover; width: 600px;"
                   class="wrapper">
                <tbody>
                <tr>
                    <td align="center" valign="top" style="margin:0;padding:0;">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" data-editable="image"
                               data-mobile-width="0" width="140">
                            <tbody>
                            <tr>
                                <td valign="top" align="center"
                                    style="display: inline-block; padding: 10px 0px 0px; margin: 0px;" class="tdBlock">
                                    <a href="https:www.pickyshop.com" target="_blank">
                                        <img src="https://cdn.iwes.it/assets/Pickyshop.png" alt="" height="70"
                                             border="0"
                                             style="border-width: 0px; border-style: none; border-color: transparent; font-size: 12px; display: block;">
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top" style="margin:0;padding:0;">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" data-editable="image"
                               data-mobile-width="0" width="140">
                            <tbody>
                            <tr>
                                <td valign="top" align="center"
                                    style="display: inline-block; padding: 10px 0px 20px; margin: 0px;" class="tdBlock">
                                    <a href="https:www.pickyshop.com" target="_blank">
                                        <img src="https://cdn.iwes.it/assets/img.jpg" alt="" width="580px" border="0"
                                             style="border-width: 0px; border-style: none; border-color: transparent; font-size: 12px; display: block;">
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="center" style="padding:20px 0;margin:0;">
                        <table align="center" width="100%" border="0" cellpadding="0" cellspacing="0"
                               data-editable="text">
                            <tbody>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 5px 20px; margin: 0px; line-height: 1; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:300;color:#000000; line-height:0.5;">
                                       <?php echo sprintf($data->hello, $order->user->name) ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 5px 20px; margin: 0px; line-height: 1; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:300;color:#000000; line-height:0.5;">
                                       <?php echo sprintf($data->line1); ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 5px 20px; margin: 0px; line-height: 1; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:300;color:#000000; line-height:0.5;">
                                       <?php echo sprintf($data->line2, $order->id, $order->orderDate); ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 5px 20px; margin: 0px; line-height: 1; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:300;color:#000000; line-height:0.5;">
                                       <?php echo $data->line3; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 5px 20px; margin: 0px; line-height: 1; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:300;color:#000000; line-height:0.5;">
                                       <?php echo $data->line4; ?>
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="left" class="lh-3"
                        style="padding: 20px 20px 0px; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:300;color:#000000; line-height:0;">
                                       <b><?php $data->tableHeader ?></b>
                                    </span>
                    </td>
                </tr>

                <tr>
                    <td valign="top" align="center" class="lh-3"
                        style="padding: 0px 20px 20px; margin: 0px;">
                        <table>
                            <tbody>
                            <hr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="center" style="padding:0;margin:0;">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
                            <tbody>
                            <tr>
                                <td valign="top" align="center" style="padding:10px;margin:0;">
                                    <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
                                        <tbody>
                                        <?php foreach ($order->orderLine as $orderLine):
                                            /** @var \bamboo\domain\entities\COrderLine $orderLine */
                                            ?>
                                            <tr>
                                                <td align="left" valign="top" width="11%"
                                                    style="margin: 0px; padding:10px 0;"
                                                    class="">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="center"
                                                           width="100%">
                                                        <tbody>
                                                        <tr>
                                                            <td valign="top" align="center" style="padding:0;margin:0;">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                       align="left" data-editable="image"
                                                                       data-mobile-width="0" width="64">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td valign="top" align="left"
                                                                            style="display: inline-block; padding: 0px 0px 0px 40px; margin: 0px;"
                                                                            class="tdBlock"><img
                                                                                    src="https://cdn.iwes.it/<?php echo $orderLine->productSku->product->getPhoto(1,\bamboo\domain\entities\CProductPhoto::SIZE_THUMB);  ?>"
                                                                                    height="100" border="0"
                                                                                    style="border-width: 0px; border-style: none; border-color: transparent; font-size: 12px; display: block;">
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>

                                                <td valign="top" align="left" width="50%"
                                                    style="padding: 0px; margin: 0px;"
                                                    class="">
                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                           align="center" data-editable="text">
                                                        <tbody>
                                                        <tr>
                                                            <td valign="top" align="center" class="lh-1"
                                                                style="padding: 50px 0px; margin: 0px; line-height: 1.15; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:300;color:#000000; line-height:0.5;">
                                                                <?php echo $orderLine->productSku->product->getName() ?>
                                                            </span>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td valign="top" align="left" width="30%"
                                                    style="padding: 0px; margin: 0px;"
                                                    class="">
                                                    <table align="center" width="100%" border="0" cellpadding="0"
                                                           cellspacing="0" data-editable="text">
                                                        <tbody>
                                                        <tr>
                                                            <td valign="top" align="right" class="lh-3"
                                                                style="padding: 50px 20px 5px 30px; margin: 0px; line-height: 1.35; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:300;color:#000000; line-height:0.5;">
                                                               <span style="font-weight:700;"><?php echo $orderLine->activePrice ?></span>
                                                            </span>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>

                </tr>
                <tr>
                    <td valign="top" align="center" class="lh-3"
                        style="padding: 0px 20px 20px; margin: 0px;">
                        <table>
                            <tbody>
                            <hr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td valign="top" align="center" style="padding:0;margin:0;">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
                            <tbody>
                            <tr>
                                <td valign="top" align="center" style="padding:10px;margin:0;">
                                    <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
                                        <tbody>
                                        <tr>
                                            <td valign="top" align="left" width="50%" style="padding: 0px; margin: 0px;"
                                                class="">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                       align="center" data-editable="text">
                                                    <tbody>
                                                    <tr>
                                                        <td valign="top" align="lef" class="lh-1"
                                                            style="padding: 0px 20px; margin: 0px; line-height: 1.15; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,sans-serif;font-size:14px;font-weight:400;color:#000000
                                                               ;line-height: 1.1;">
                                                                <b><?php echo $data->subtotal ?></b>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td valign="top" align="left" width="30%" style="padding: 0px; margin: 0px;"
                                                class="">
                                                <table align="center" width="100%" border="0" cellpadding="0"
                                                       cellspacing="0" data-editable="text">
                                                    <tbody>
                                                    <tr>
                                                        <td valign="top" align="right" class="lh-3"
                                                            style="padding: 0px 20px 5px 30px; margin: 0px; line-height: 1.35; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;color:#000000; line-height:1.3;">
                                                              <span style="font-weight:700;"><?php echo $order->grossTotal ?>
                                                                  EUR</span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td valign="top" align="left" width="50%" style="padding: 0px; margin: 0px;"
                                                class="">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                       align="center" data-editable="text">
                                                    <tbody>
                                                    <tr>
                                                        <td valign="top" align="lef" class="lh-1"
                                                            style="padding: 0px 20px; margin: 0px; line-height: 1.15; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,sans-serif;font-size:14px;font-weight:400;color:#000000
                                                               ;line-height: 1.1;">
                                                                <?php echo $data->shipping ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td valign="top" align="left" width="30%" style="padding: 0px; margin: 0px;"
                                                class="">
                                                <table align="center" width="100%" border="0" cellpadding="0"
                                                       cellspacing="0" data-editable="text">
                                                    <tbody>
                                                    <tr>
                                                        <td valign="top" align="right" class="lh-3"
                                                            style="padding: 0px 20px 5px 30px; margin: 0px; line-height: 1.35; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;color:#000000; line-height:1.3;">
                                                              <span><?php echo $order->shippingPrice ?> EUR</span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" align="left" width="50%" style="padding: 0px; margin: 0px;"
                                                class="">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                       align="center" data-editable="text">
                                                    <tbody>
                                                    <tr>
                                                        <td valign="top" align="lef" class="lh-1"
                                                            style="padding: 0px 20px; margin: 0px; line-height: 1.15; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,sans-serif;font-size:14px;font-weight:400;color:#000000
                                                               ;line-height: 1.1;">
                                                                <?php echo $data->modifier ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td valign="top" align="left" width="30%" style="padding: 0px; margin: 0px;"
                                                class="">
                                                <table align="center" width="100%" border="0" cellpadding="0"
                                                       cellspacing="0" data-editable="text">
                                                    <tbody>
                                                    <tr>
                                                        <td valign="top" align="right" class="lh-3"
                                                            style="padding: 0px 20px 5px 30px; margin: 0px; line-height: 1.35; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;color:#000000; line-height:1.3;">
                                                              <span><?php echo $order->grossTotal - $order->netTotal - $order->shippingPrice ?>
                                                                  EUR</span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" align="left" width="50%" style="padding: 0px; margin: 0px;"
                                                class="">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                       align="center" data-editable="text">
                                                    <tbody>
                                                    <tr>
                                                        <td valign="top" align="lef" class="lh-1"
                                                            style="padding: 0px 20px; margin: 0px; line-height: 1.15; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,sans-serif;font-size:14px;font-weight:400;color:#000000
                                                               ;line-height: 1.1;">
                                                                <b><?php echo $data->total ?></b>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td valign="top" align="left" width="30%" style="padding: 0px; margin: 0px;"
                                                class="">
                                                <table align="center" width="100%" border="0" cellpadding="0"
                                                       cellspacing="0" data-editable="text">
                                                    <tbody>
                                                    <tr>
                                                        <td valign="top" align="right" class="lh-3"
                                                            style="padding: 0px 20px 5px 30px; margin: 0px; line-height: 1.35; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;color:#000000; line-height:1.3;">
                                                              <span style="font-weight:700;"><?php echo $order->netTotal ?>
                                                                  EUR</span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>

                </tr>


                <tr>


                    <td valign="top" align="center" style="padding:0;margin:0;">
                        <table align="center" width="100%" border="0" cellpadding="0" cellspacing="0"
                               data-editable="text">
                            <tbody>
                            <td valign="top" align="center" class="lh-3"
                                style="padding: 0px 20px 20px; margin: 0px;">
                                <hr style="border-top: 1px dotted #8c8b8b;">
                            </td>
                            <tr>
                                <td valign="top" align="center" style="padding:0 0 20px 0;margin:0;" width="50%">
                                    <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
                                        <tbody>
                                        <tr>
                                            <td valign="top" align="center" width="50%" style="padding:10px;margin:0;">
                                                <table border="0" cellpadding="0" cellspacing="0" align="center"
                                                       width="100%">
                                                    <tbody>
                                                    <tr>
                                                        <td valign="top" align="left" width="50%"
                                                            style="padding: 0px; margin: 0px;"
                                                            class="">
                                                            <table width="100%" border="0" cellpadding="0"
                                                                   cellspacing="0"
                                                                   align="center" data-editable="text">
                                                                <tbody>
                                                                <tr>
                                                                    <td valign="top" align="lef" class="lh-1"
                                                                        style="padding: 0px 20px; margin: 0px; line-height: 1.15; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,sans-serif;font-size:14px;font-weight:400;color:#000000
                                                               ;line-height: 1.1;">
                                                                <b><?php echo $data->shippingAddress ?></b>
                                                            </span>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td valign="top" align="left" width="50%"
                                                            style="padding: 0px; margin: 0px;"
                                                            class="">
                                                            <table width="100%" border="0" cellpadding="0"
                                                                   cellspacing="0"
                                                                   align="center" data-editable="text">
                                                                <tbody>
                                                                <tr>
                                                                    <td valign="top" align="lef" class="lh-1"
                                                                        style="padding: 0px 20px; margin: 0px; line-height: 1.15; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,sans-serif;font-size:14px;font-weight:400;color:#000000
                                                               ;line-height: 1.1;">
                                                                <?php echo $order->shipmentAddress->name . ' ' . $order->shipmentAddress->surname ?>
                                                            </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" align="lef" class="lh-1"
                                                                        style="padding: 0px 20px; margin: 0px; line-height: 1.15; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,sans-serif;font-size:14px;font-weight:400;color:#000000
                                                               ;line-height: 1.1;">
                                                                <?php echo $order->shipmentAddress->address ?>
                                                            </span>
                                                                    </td>
                                                                </tr>
                                                                <?php if (!empty($order->shipmentAddress->extra)): ?>
                                                                    <tr>
                                                                        <td valign="top" align="lef" class="lh-1"
                                                                            style="padding: 0px 20px; margin: 0px; line-height: 1.15; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,sans-serif;font-size:14px;font-weight:400;color:#000000
                                                               ;line-height: 1.1;">
                                                                <?php echo $order->shipmentAddress->extra ?>
                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                                <tr>
                                                                    <td valign="top" align="lef" class="lh-1"
                                                                        style="padding: 0px 20px; margin: 0px; line-height: 1.15; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,sans-serif;font-size:14px;font-weight:400;color:#000000
                                                               ;line-height: 1.1;">
                                                                <?php echo $order->shipmentAddress->postcode ?>
                                                                , <?php echo $order->shipmentAddress->city ?>
                                                                , <?php echo $order->shipmentAddress->province ?>
                                                            </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" align="lef" class="lh-1"
                                                                        style="padding: 0px 20px; margin: 0px; line-height: 1.15; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,sans-serif;font-size:14px;font-weight:400;color:#000000
                                                               ;line-height: 1.1;">
                                                                <?php echo $order->shipmentAddress->country->name ?>
                                                            </span>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td valign="top" align="center" style="padding:0;margin:0;">
                                                <table align="center" width="100%" border="0" cellpadding="0"
                                                       cellspacing="0"
                                                       data-editable="text">
                                                    <tbody>
                                                    <tr>
                                                        <td valign="top" align="center" style="padding:0;margin:0;">
                                                            <table border="0" cellpadding="0" cellspacing="0"
                                                                   align="center" width="100%">
                                                                <tbody>
                                                                <tr>
                                                                    <td valign="top" align="center"
                                                                        style="padding:10px;margin:0;">
                                                                        <table border="0" cellpadding="0"
                                                                               cellspacing="0" align="center"
                                                                               width="100%">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td valign="top" align="left"
                                                                                    width="50%"
                                                                                    style="padding: 0px; margin: 0px;"
                                                                                    class="">
                                                                                    <table width="100%" border="0"
                                                                                           cellpadding="0"
                                                                                           cellspacing="0"
                                                                                           align="center"
                                                                                           data-editable="text">
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <td valign="top" align="lef"
                                                                                                class="lh-1"
                                                                                                style="padding: 0px 20px; margin: 0px; line-height: 1.15; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,sans-serif;font-size:14px;font-weight:400;color:#000000
                                                               ;line-height: 1.1;">
                                                                <b><?php echo $data->billingAddress ?></b>
                                                            </span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td valign="top" align="left"
                                                                                    width="100%"
                                                                                    style="padding: 0px; margin: 0px;"
                                                                                    class="">
                                                                                    <table width="100%" border="0"
                                                                                           cellpadding="0"
                                                                                           cellspacing="0"
                                                                                           align="center"
                                                                                           data-editable="text">
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <td valign="top" align="lef"
                                                                                                class="lh-1"
                                                                                                style="padding: 0px 20px; margin: 0px; line-height: 1.15; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,sans-serif;font-size:14px;font-weight:400;color:#000000
                                                               ;line-height: 1.1;">
                                                                <?php echo $order->billingAddress->name . ' ' . $order->billingAddress->surname ?>
                                                            </span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td valign="top" align="lef"
                                                                                                class="lh-1"
                                                                                                style="padding: 0px 20px; margin: 0px; line-height: 1.15; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,sans-serif;font-size:14px;font-weight:400;color:#000000
                                                               ;line-height: 1.1;">
                                                                <?php echo $order->billingAddress->address ?>
                                                            </span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <?php if (!empty($order->billingAddress->extra)): ?>
                                                                                            <tr>
                                                                                                <td valign="top"
                                                                                                    align="lef"
                                                                                                    class="lh-1"
                                                                                                    style="padding: 0px 20px; margin: 0px; line-height: 1.15; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,sans-serif;font-size:14px;font-weight:400;color:#000000
                                                               ;line-height: 1.1;">
                                                                <?php echo $order->billingAddress->extra ?>
                                                            </span>
                                                                                                </td>
                                                                                            </tr>
                                                                                        <?php endif; ?>
                                                                                        <tr>
                                                                                            <td valign="top" align="lef"
                                                                                                class="lh-1"
                                                                                                style="padding: 0px 20px; margin: 0px; line-height: 1.15; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,sans-serif;font-size:14px;font-weight:400;color:#000000
                                                               ;line-height: 1.1;">
                                                                <?php echo $order->billingAddress->postcode ?>
                                                                , <?php echo $order->billingAddress->city ?>
                                                                , <?php echo $order->billingAddress->province ?>
                                                            </span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td valign="top" align="lef"
                                                                                                class="lh-1"
                                                                                                style="padding: 0px 20px; margin: 0px; line-height: 1.15; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,sans-serif;font-size:14px;font-weight:400;color:#000000
                                                               ;line-height: 1.1;">
                                                                <?php echo $order->billingAddress->country->name ?>
                                                            </span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <?php if(!empty($order->billingAddress->fiscalCode)): ?>
                                                                                        <tr>
                                                                                            <td valign="top" align="lef"
                                                                                                class="lh-1"
                                                                                                style="padding: 0px 20px; margin: 0px; line-height: 1.15; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                                            <span style="font-family:Helvetica,sans-serif;font-size:14px;font-weight:400;color:#000000
                                                               ;line-height: 1.1;">
                                                                <?php echo $order->billingAddress->fiscalCode ?>
                                                            </span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <?php endif; ?>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="center" style="padding:0;margin:0;">
                        <table align="center" width="100%" border="0" cellpadding="0" cellspacing="0"
                               data-editable="text">
                            <tbody>
                            <td valign="top" align="center" class="lh-3"
                                style="padding: 0px 20px 20px; margin: 0px;">
                                <hr style="border-top: 1px dotted #8c8b8b;">
                            </td>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="center" style="padding:0;margin:0;">
                        <table align="center" width="100%" border="0" cellpadding="0" cellspacing="0"
                               data-editable="text">
                            <tbody>
                            <tr>
                                <td valign="top" align="justify" class="lh-3"
                                    style="padding: 0px 20px; margin: 0px; line-height: 0.9; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family:Helvetica,Arial,sans-serif;font-size:11px;font-weight:300;color:#5E5E5E; line-height:0.5;">
                                       <?php echo $data->footer ?>
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <td>

                    <table data-editable="socialmedia" style="margin: 0px auto;" align="center" cellspacing="0"
                           cellpadding="0">
                        <tbody>
                        <tr>
                            <td align="left" valign="top" style="padding: 0; margin: 0px;">
                                <table align="center" width="100%" cellspacing="0" cellpadding="0">
                                    <tbody>
                                    <tr data-columns="no">
                                        <td style="display: inline-block !important; width: auto !important; margin: auto; padding: 5px;">
                                            <p style="font-family:Helvetica,Arial,sans-serif;font-size:18px;font-weight:300;color:#5E5E5E; line-height:1.3;">
                                                Follow Us</p></td>
                                        <td style="display: inline-block !important; width: auto !important; margin: auto; padding: 5px;">
                                            <a href="https://www.instagram.com/pkyshop/" title="Instagram"><img
                                                        src="https://cdn.iwes.it/assets/icon-ig.png" alt="Follow"
                                                        style="display: block;" border="0" target="_blank"></a></td>
                                        <td style="display: inline-block !important; width: auto !important; margin: auto; padding: 5px;">
                                            <a href="https://www.facebook.com/pickyshopcom/?fref=ts"
                                               title="Facebook"><img src="https://cdn.iwes.it/assets/facebook.png"
                                                                     alt="Like" style="display: block;" border="0"
                                                                     target="_blank"></a></td>
                                        <td style="display: inline-block !important; width: auto !important; margin: auto; padding: 5px;">
                                            <a href="https://twitter.com/pkyshop?lang=it" title="Twitter"><img
                                                        src="https://cdn.iwes.it/assets/ico_twitter.png" alt="Twitter"
                                                        style="display: block;" border="0" target="_blank"></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>

                    </table>
                </td>
                <tr>
                    <td>
                        <table data-editable="text" align="center" width="100%" cellspacing="0" cellpadding="0"
                               border="0">
                            <tbody>
                            <tr>
                                <td class="lh-1" align="left" valign="top"
                                    style="padding: 10px 0 40px 0; font-size: 16px; font-family: Times New Roman, Times, serif; line-height: 1.5;">
                                    <div style="text-align: center;"><span
                                                style="font-family:Helvetica,Arial,sans-serif;font-size:10px;font-weight:300;color:#5E5E5E; line-height:1;">Iwes snc -&nbsp;</span><span
                                                style="font-family:Helvetica,Arial,sans-serif;font-size:10px;font-weight:300;color:#5E5E5E; line-height:0.5;">via Cesare Pavese 1,&nbsp;</span><span
                                                style="font-family:Helvetica,Arial,sans-serif;font-size:10px;font-weight:300;color:#5E5E5E; line-height:0.5;">62012 Civitanova Marche (MC)</span>
                                    </div>
                                    <font style="font-size: 10px;" size="10">
                                        <div style="text-align: center; font-family:Helvetica,Arial,sans-serif;font-size:10px;font-weight:300;color:#5E5E5E; line-height:0.5;">
                                            <span>Cod. Fisc. e Partita IVA 0186 538 0438 tel. <a
                                                        href="tel:+390237920266">+39 02 37920266</a> mob. <a
                                                        href="tel:+393275590989">+39 327 5590989 </a> mail <a
                                                        href="mailto:support@pickyshop.com">support@pickyshop.com</a></span>
                                        </div>
                                    </font></td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>

</body>
</html>
