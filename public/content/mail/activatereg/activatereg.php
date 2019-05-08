<?php
    /** @var \bamboo\core\theming\CMailerHelper $app */
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
<!doctype HTML>
<html>
<head>
    <style>
        @font-face {
            font-family: 'Handlee';
            font-style: normal;
            font-weight: 400;
            src: local('Handlee Regular'), local('Handlee-Regular'), url(https://fonts.gstatic.com/s/handlee/v5/hN5OFJA7DLALxZ1osZb59Q.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
        }
    </style>

    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <meta charset="utf-8">
    <title><?php echo $data->confirmUserSubscription ?></title>
</head>
<body style="margin: 0px">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tbody>
    <tr>
        <td style="font-family:Arial; font-size:1px; line-height:1px; background-color:#f0f0f0" width="100%">
            <font color="#f0f0f0">Pickyshop.com! Richiesta Attivazione Account</font>
        </td>
    </tr>
    </tbody>
</table>
<table align="center" width="100%" cellpadding="0" cellspacing="0" border="0" data-mobile="true" dir="ltr"
       data-width="600" style="font-size: 14px; background-color:#f3f3f3; font-family:Helvetica,Arial,sans-serif">
    <tbody>
    <tr>
        <td align="center" valign="top" style="margin:0;padding:42px 0;">
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600" bgcolor="white"
                   style="background-position: center top; background-repeat: no-repeat; background-size: cover; width: 660px;"
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
                                    <a href="https:www.pickyshop.com" target="_blank">
                                        <img src="https://cdn.iwes.it/assets/Pickyshop.png" alt="" height="70"
                                             border="0"
                                             style="border-width: 0px; border-style: none; border-color: transparent; font-size: 12px; display: block;"/>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table border="0" cellspacing="0" cellpadding="0" align="center">
                            <tr style="text-align: center;">
                                <td style="clear: none; padding: 0 20px 0 20px; margin: 0px auto !important;"
                                    align="center" valign="top">
                                    <a href="https://www.pickyshop.com/<?php echo $app->lang(); ?>/donna-2/new-arrival-6"
                                       style="color: grey; padding: 10px 10px; text-align: center; text-decoration: none"
                                       target="_blank" title="<?php echo $data->newArrivals ?>"><?php echo $data->newArrivals ?></a>
                                </td>
                                <td style="clear: none; padding: 0 20px 0 20px; margin: 0px auto !important;"
                                    align="right" valign="top">
                                    <a href="https://www.pickyshop.com/<?php echo $app->lang(); ?>/donna-2"
                                       style="color: grey; padding: 10px 10px; text-align: center; text-decoration: none"
                                       target="_blank" title="<?php echo $data->woman ?>"><?php echo $data->woman ?></a>
                                </td>
                                <td style="clear: none; padding: 0 20px 0 20px; margin: 0px auto !important;"
                                    align="right" valign="top">
                                    <a href="https://www.pickyshop.com/<?php echo $app->lang(); ?>/uomo-3"
                                       style="color: grey; padding: 10px 10px; text-align: center; text-decoration: none"
                                       target="_blank" title="<?php echo $data->man ?>"><?php echo $data->man ?></a>
                                </td>
                                <td style="clear: none; padding: 0 20px 0 20px; margin: 0px auto !important;"
                                    align="right" valign="top">
                                    <a href="https://www.pickyshop.com/<?php echo $app->lang(); ?>/brands/donna-2"
                                       style="color: grey; padding: 10px 10px; text-align: center; text-decoration: none"
                                       target="_blank" title="DESIGNER">DESIGNER</a>
                                </td>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top" style="margin:0;padding:0;">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" data-editable="image"
                               data-mobile-width="0">
                            <tbody>
                            <tr>
                                <td>
                                    <img src="https://cdn.iwes.it/assets/mail.jpg" alt="" width="640px" border="0"
                                         style="border-width: 0px; border-style: none; border-color: transparent; font-size: 12px; display: block;">
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
                                       <?php echo sprintf($data->hello, $user->name) ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 5px 10px; margin: 0px; line-height: 1; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                       <?php echo $app->parse($data->line1,$user->getGender()); ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 5px 10px; margin: 0px; line-height: 1; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:600;color:#3A3A3A; line-height:1.2;">
                                       <?php echo sprintf($data->line2, $app->toActivation()); ?>
                                    </span>

                                </td>

                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 5px 10px; margin: 0px; line-height: 1; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:400;color:#3A3A3A; line-height:1.2;"><a
                                                href="<?php echo $app->toActivation()?>"
                                                style="text-decoration: none; color: black;"><?php echo $app->toActivation() ?></a>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 5px 10px ; margin: 0px; line-height: 1; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                       <?php echo $app->parse($data->line3) ?>
                                     </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 5px 10px; margin: 0px; line-height: 1; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                       <?php echo $data->line4 ?>
                                     </span>
                                </td>
                            </tr>
                            <tr>

                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 5px 10px; line-height: 2; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px; color:#3A3A3A; line-height:2; font-weight: 600">
                                       <?php echo $data->line5 ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 5px 10px 30px; margin: 0px; line-height: 1; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                        <?php echo $data->line6 ?>
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td>
                        <hr>
                        <table border="0" cellspacing="0" cellpadding="0" align="center">
                            <tr style="text-align: center;">
                                <td style="clear: none; padding: 0 20px 0 20px; margin: 0px auto !important;"
                                    align="center" valign="top">
                                    <a href="https://www.pickyshop.com/<?php echo $app->lang(); ?>/donna-2/new-arrival-6"
                                       style="color: grey; padding: 10px 10px; text-align: center; text-decoration: none"
                                       target="_blank" title="<?php echo $data->newArrivals ?>"><?php echo $data->newArrivals ?></a>
                                </td>
                                <td style="clear: none; padding: 0 20px 0 20px; margin: 0px auto !important;"
                                    align="right" valign="top">
                                    <a href="https://www.pickyshop.com/<?php echo $app->lang(); ?>/donna-2"
                                       style="color: grey; padding: 10px 10px; text-align: center; text-decoration: none"
                                       target="_blank" title="<?php echo $data->woman ?>"><?php echo $data->woman ?></a>
                                </td>
                                <td style="clear: none; padding: 0 20px 0 20px; margin: 0px auto !important;"
                                    align="right" valign="top">
                                    <a href="https://www.pickyshop.com/<?php echo $app->lang(); ?>/uomo-3"
                                       style="color: grey; padding: 10px 10px; text-align: center; text-decoration: none"
                                       target="_blank" title="<?php echo $data->man ?>"><?php echo $data->man ?></a>
                                </td>
                                <td style="clear: none; padding: 0 20px 0 20px; margin: 0px auto !important;"
                                    align="right" valign="top">
                                    <a href="https://www.pickyshop.com/<?php echo $app->lang(); ?>/brands/donna-2"
                                       style="color: grey; padding: 10px 10px; text-align: center; text-decoration: none"
                                       target="_blank" title="DESIGNER">DESIGNER</a>
                                </td>
                            </tr>
                        </table>
                        <hr>

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
                                                style="font-family:Helvetica,Arial,sans-serif;font-size:10px;font-weight:300;color:#5E5E5E; line-height:1;">Iwes snc -&nbsp;</span><span
                                                style="font-family:Helvetica,Arial,sans-serif;font-size:10px;font-weight:300;color:#5E5E5E; line-height:0.5;">via Cesare Pavese 1,&nbsp;</span><span
                                                style="font-family:Helvetica,Arial,sans-serif;font-size:10px;font-weight:300;color:#5E5E5E; line-height:0.5;">62012 Civitanova Marche (MC)</span>
                                    </div>
                                    <font style="font-size: 10px;" size="10">
                                        <div style="text-align: center; font-family:Helvetica,Arial,sans-serif;font-size:10px;font-weight:300;color:#5E5E5E; line-height:1;">
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