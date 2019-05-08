<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Coupon Inutilizzato 1</title>
</head>

<body style="margin: 0px; font-family: Arial,sans-serif;">
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
                                        <img src="https://iwes.s3.amazonaws.com/assets/Pickyshop.png" alt="" height="70"
                                             border="0"
                                             style="border-width: 0px; border-style: none; border-color: transparent; font-size: 12px; display: block;">
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <hr style="margin: 10px 20px;">
                        <table border="0" cellspacing="0" cellpadding="0" align="center">
                            <tr style="text-align: center; font-size: 14px;">
                                <td style="clear: none; padding: 0 20px 0 20px; margin: 0px auto !important;"
                                    align="center" valign="top">
                                    <a href="https://www.pickyshop.com/it/donna-2/tag-nuovi-arrivi-t6"
                                       style="color: grey; padding: 10px 10px; text-align: center; text-decoration: none"
                                       target="_blank" title="newArrivals"><?php echo $data->newArrivals; ?></a>
                                </td>
                                <td style="clear: none; padding: 0 10px; margin: 0px auto !important;"
                                    align="right" valign="top">
                                    <a href="https://www.pickyshop.com/it/donna-2"
                                       style="color: grey; padding: 10px 10px; text-align: center; text-decoration: none"
                                       target="_blank" title="woman"><?php echo $data->woman; ?></a>
                                </td>
                                <td style="clear: none; padding: 0 10px; margin: 0px auto !important;"
                                    align="right" valign="top">
                                    <a href="https://www.pickyshop.com/it/uomo-3"
                                       style="color: grey; padding: 10px 10px; text-align: center; text-decoration: none"
                                       target="_blank" title="man"><?php echo $data->man; ?></a>
                                </td>
                                <td style="clear: none; padding: 0 10px; margin: 0px auto !important;"
                                    align="right" valign="top">
                                    <a href="https://www.pickyshop.com/it/brands/donna-2"
                                       style="color: grey; padding: 10px 10px; text-align: center; text-decoration: none"
                                       target="_blank" title="designer"><?php echo $data->designer; ?></a>

                                </td>
                                <td style="clear: none; padding: 0 10px; margin: 0px auto !important;"
                                    align="right" valign="top">
                                    <a href="https://www.pickyshop.com/it/donna-2/tag-sales-t11"
                                       style="color: red; padding: 10px 10px; text-align: center; text-decoration: none"
                                       target="_blank" title="sales"><?php echo $data->sales; ?></a>
                                </td>
                            </tr>
                        </table>
                        <hr style="margin: 10px 20px;">
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top" style="margin:0;padding:0;">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" data-editable="image"
                               data-mobile-width="0" width="140">
                            <tbody>
                            <tr>
                                <td height="" align="center" valign="top" class="tdBlock"
                                    style="display: inline-block; padding: 5px 0px 5px; margin: 0px;">
                                    <a href="https:www.pickyshop.com" target="_blank">
                                        <img src="<?php
                                        switch ($remindNumber) {
                                            case 1:
                                                echo $data->firstReminder;
                                                break;
                                            case 2:
                                                echo $data->secondReminder;
                                                break;
                                            case 3:
                                                echo $data->thirdReminder;
                                                break;
                                        }
                                        ?>" alt="" width=""
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
                    <td valign="top" align="center" style="padding:10px 0;margin:0;">
                        <table align="center" width="100%" border="0" cellpadding="0" cellspacing="0"
                               data-editable="text">
                            <tbody>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 5px 20px; margin: 0px; line-height: 1; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:300;color:#000000; line-height:0.5;">
                                       <?php echo is_null($name) ? $data->simpleHello : sprintf($data->hello, $name); ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 5px 20px; margin: 0px; line-height: 1; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:300;color:#000000; line-height:0.5;">
                                       <?php echo $data->line1; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 5px 20px; margin: 0px; line-height: 1; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:300;color:#000000; line-height:0.5;">
                                       <?php echo sprintf($data->couponCode, $couponCode); ?>
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
                                    <span style="font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:600;color:#000000; line-height:0.5; text-transform: uppercase;">
                                       <?php echo $data->line4; ?>
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="center" class="lh-3"
                        style="padding: 0px 20px; margin: 0px;">
                        <hr>
                    </td>
                </tr>

                <tr>
                    <td valign="top" align="center" style="padding:0;margin:0;">
                        <hr style="margin: 10px 20px;">
                        <table border="0" cellspacing="0" cellpadding="0" align="center">
                            <tr style="text-align: center; font-size: 14px;">
                                <td style="clear: none; padding: 0 20px 0 20px; margin: 0px auto !important;"
                                    align="center" valign="top">
                                    <a href="https://www.pickyshop.com/it/donna-2/tag-nuovi-arrivi-t6"
                                       style="color: grey; padding: 10px 10px; text-align: center; text-decoration: none"
                                       target="_blank" title="newArrivals"><?php echo $data->newArrivals; ?></a>
                                </td>
                                <td style="clear: none; padding: 0 10px; margin: 0px auto !important;"
                                    align="right" valign="top">
                                    <a href="https://www.pickyshop.com/it/donna-2"
                                       style="color: grey; padding: 10px 10px; text-align: center; text-decoration: none"
                                       target="_blank" title="woman"><?php echo $data->woman; ?></a>
                                </td>
                                <td style="clear: none; padding: 0 10px; margin: 0px auto !important;"
                                    align="right" valign="top">
                                    <a href="https://www.pickyshop.com/it/uomo-3"
                                       style="color: grey; padding: 10px 10px; text-align: center; text-decoration: none"
                                       target="_blank" title="man"><?php echo $data->man; ?></a>
                                </td>
                                <td style="clear: none; padding: 0 10px; margin: 0px auto !important;"
                                    align="right" valign="top">
                                    <a href="https://www.pickyshop.com/it/brands/donna-2"
                                       style="color: grey; padding: 10px 10px; text-align: center; text-decoration: none"
                                       target="_blank" title="designer"><?php echo $data->designer; ?></a>

                                </td>
                                <td style="clear: none; padding: 0 10px; margin: 0px auto !important;"
                                    align="right" valign="top">
                                    <a href="https://www.pickyshop.com/it/donna-2/tag-sales-t11"
                                       style="color: red; padding: 10px 10px; text-align: center; text-decoration: none"
                                       target="_blank" title="sales"><?php echo $data->sales; ?></a>
                                </td>
                            </tr>
                        </table>
                        <hr style="margin: 10px 20px;">
                    </td>
                </tr>
                <tr>
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
                                                <p style="font-family:Helvetica,Arial,sans-serif;font-size:18px;font-weight:300;color:#000000; margin: 5px; text-decoration: underline;">
                                                    Follow Us</p></td>
                                            <td style="display: inline-block !important; width: auto !important; margin: auto; padding: 5px;">
                                                <a href="https://www.instagram.com/pkyshop/" title="Instagram"><img
                                                            src="https://cdn.iwes.it/assets/icon-ig.png" alt="Follow"
                                                            style="display: block;" border="0" target="_blank"></a></td>
                                            <td style="display: inline-block !important; width: auto !important; margin: auto; padding: 5px;">
                                                <a href="https://www.facebook.com/pickyshoppky/?fref=ts"
                                                   title="Facebook"><img src="https://cdn.iwes.it/assets/facebook.png"
                                                                         alt="Like" style="display: block;" border="0"
                                                                         target="_blank"></a></td>
                                            <td style="display: inline-block !important; width: auto !important; margin: auto; padding: 5px;">
                                                <a href="https://twitter.com/pkyshop?lang=it" title="Twitter"><img
                                                            src="https://cdn.iwes.it/assets/ico_twitter.png"
                                                            alt="Twitter"
                                                            style="display: block;" border="0" target="_blank"></a></td>
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
                    <td>
                        <table data-editable="text" align="center" width="100%" cellspacing="0" cellpadding="0"
                               border="0">
                            <tbody>
                            <tr>
                                <td class="lh-1" align="left" valign="top"
                                    style="padding: 10px 0 40px 0; font-size: 16px; font-family: Times New Roman, Times, serif; line-height: 1.5;">
                                    <div style="text-align: center;"><span
                                                style="font-family:Helvetica,Arial,sans-serif;font-size:10px;font-weight:300;color:#9e9e9e; line-height:1;">Iwes snc -&nbsp;</span><span
                                                style="font-family:Helvetica,Arial,sans-serif;font-size:10px;font-weight:300;color:#9e9e9e; line-height:0.5;">via Cesare Pavese 1,&nbsp;</span><span
                                                style="font-family:Helvetica,Arial,sans-serif;font-size:10px;font-weight:300;color:#9e9e9e; line-height:0.5;">62012 Civitanova Marche (MC)</span>
                                    </div>
                                    <font style="font-size: 10px;" size="10">
                                        <div style="text-align: center; font-family:Helvetica,Arial,sans-serif;font-size:10px;font-weight:300;color:#9e9e9e; line-height:0.5;">
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
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>

