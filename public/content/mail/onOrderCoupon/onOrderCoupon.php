<?php
use bamboo\core\theming\CMailerHelper;
/** @var CMailerHelper $app */ ?>
<html lang="<?php echo $app->lang(); ?>">
<head>
    <meta charset="UTF-8"/>
    <style type="text/css"><?php echo $css; ?></style>
</head>
<body style="margin: 0px">
<table align="center" width="100%" cellpadding="0" cellspacing="0" border="0" data-mobile="true" dir="ltr"
       data-width="600" style="font-size: 14px; background-color:#f3f3f3; font-family:Helvetica,Arial,sans-serif">
    <tbody>
    <tr>
        <td align="center" valign="top" style="margin:0;padding:42px 0;">
            <table align="center" border="" cellspacing="0" cellpadding="0" width="600" bgcolor="white"
                   style="background-position: center top; background-repeat: no-repeat; background-size: cover; width: 660px; border:15px solid #B3B3B3;"
                   class="wrapper">
                <tbody>
                <tr>
                    <td align="center" valign="top" style="margin:0;padding:0;">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" data-editable="image"
                               data-mobile-width="0" width="140">
                            <tbody>
                            <tr>
                                <td valign="top" align="center"
                                    style="display: inline-block; padding: 20px 0px 10px; margin: 0px;" class="tdBlock">
                                    <a href="<?php echo $shopSite ?>" target="_blank">
                                        <img src="<?php echo $shopSite.'/assets/img/'.$logoSite;?>" alt="" height="80"
                                             border="0"
                                             style="border-width: 0px; border-style: none; border-color: transparent; font-size: 12px; display: block;"/>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="center" style="padding:10px 10px 0px 10px; margin:0;">
                        <table align="center" width="620px" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0"
                               data-editable="text">
                            <tbody>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 30px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                        Italiano
                                    </span>
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 30px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                        Ciao  <?php echo $userName ?>,<br>
                                        Abbiamo il piacere di rilasciare il seguente <b>coupon</b> del valore <?php echo 'di '. number_format($amountCouponRemote,2,',',''). ' Euro';?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="center" class="lh-3"
                                    style="padding: 10px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:green; line-height:1.2;">
                                        <h1><?php echo $couponCode ?></h1>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 10px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                               Potrai utilizzarlo all 'interno del sito <?php echo $shopSite;?> inserendo il codice nel carrello, oppure presentarlo in negozio.
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 20px 10px 0; margin: 0px; line-height: 1.5; font-size: 18px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:800;color:#3A3A3A; line-height:1.2;">
                                    il Coupon Vale solo su articoli non in saldo e scadrà il <?php echo $couponValidThruEmail;?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 10px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                   Grazie per aver scelto <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2; font-weight: 600"><?php echo strtoupper($nameShop)?></span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 30px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                        English
                                    </span>
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 30px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                        Hi  <?php echo $userName ?>,<br>
                                        We have pleasure to release for you a  <b>coupon</b> with value of  <?php echo number_format($amountCouponRemote,2,',',''). ' Euro';?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="center" class="lh-3"
                                    style="padding: 10px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:green; line-height:1.2;">
                                        <h1><?php echo $couponCode ?></h1>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 10px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                               You can use in <?php echo $shopSite;?> after  putting in basket  application or please present this in our shop to apply.
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 20px 10px 0; margin: 0px; line-height: 1.5; font-size: 18px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:800;color:#3A3A3A; line-height:1.2;">
                                     You can use this Coupon with products not in sale status and its expiration will be  <?php echo $couponValidThruEmail;?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 10px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                   Thank You For choosing <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2; font-weight: 600"><?php echo strtoupper($nameShop)?></span>
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>