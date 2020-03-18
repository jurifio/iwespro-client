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
                                        <img src="https://cdn.iwes.it/assets/logoIwes.png" alt="" height="80"
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
                                        Inviamo di seguito il <?php echo $noticeCounter;?>° ed ultimo  sollecito di pagamento della  distinta n. <?php echo $numberSlip ?> con importo iniziale € <?php echo number_format($slipTotalAmount,2,',','.') ?>
                                 e  con Scadenza <?php echo \bamboo\utils\time\STimeToolbox::EurFormattedDate($slipFinalDate);?>.
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 10px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                       Vi preghiamo cortesemente voler provvedere al pagamento indicando il numero di distinta pagata,  onde evitare la sospensione del servizio.
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 20px 10px 0; margin: 0px; line-height: 1.5; font-size: 18px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:800;color:#3A3A3A; line-height:1.2;">
                                    DATI BANCARI
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 10px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                    Beneficiary: <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2; font-weight: 600">International Web Ecommerce Sevices snc</span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 10px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                        Iban: <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2; font-weight: 600">IT 48L 05216 1340 0000 00000 2334</span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 10px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                    Bank: CREDITO VALTELLINESE
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 10px 10px 10px; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                    BIC/SWIFT: BPCVT2S
                                    </span>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="center" style="padding:10px 10px 0px 10px; margin:0;">
                        <table align="center" width="620px" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0"
                               data-editable="text">
                            <thead>
                            <tr>
                                <th valign="top" align="left" class="lh-3"
                                    style="padding: 10px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:800;color:#3A3A3A; line-height:1.2;">
                                Numero Fattura
                                </span>
                                </th>
                                <th valign="top" align="left" class="lh-3"
                                    style="padding: 10px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:800;color:#3A3A3A; line-height:1.2;">
                                Data Fattura
                                        </span>
                                </th>
                                <th valign="top" align="left" class="lh-3"
                                    style="padding: 10px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:800;color:#3A3A3A; line-height:1.2;">
                                data Scadenza Pagamento
                                        </span>
                                </th>
                                <th valign="top" align="left" class="lh-3"
                                    style="padding: 10px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:800;color:#3A3A3A; line-height:1.2;">
                                Importo scadenza
                                        </span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $slipTotalAmount=0;
                            foreach ($invoiceIds as $invoiceId){
                                $slipTotalAmount+=$amountPayment;
                                $bri=\Monkey::app()->repoFactory->create('BillRegistryInvoice')->findOneBy(['id'=>$invoiceId]);
                                ?>
                                <tr>
                                    <td valign="top" align="left" class="lh-3"
                                        style="padding: 10px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                        <?php echo $bri->invoiceNumber.'/'.$bri->invoiceType; ?>
                                    </span>
                                    </td>
                                    <td valign="top" align="left" class="lh-3"
                                        style="padding: 10px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                        <?php echo \bamboo\utils\time\STimeToolbox::EurFormattedDate($bri->invoiceDate); ?>
                                    </span>
                                    </td>
                                    <td valign="top" align="left" class="lh-3"
                                        style="padding: 10px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                        <?php echo \bamboo\utils\time\STimeToolbox::EurFormattedDate($dateEstimated); ?>
                                    </span>
                                    </td>
                                    <td valign="top" align="left" class="lh-3"
                                        style="padding: 10px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                        <?php

                                        echo number_format($amountPayment,2,',','.')

                                        ?>
                                    </span>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 10px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:bold;color:#3A3A3A; line-height:1.2;">
                                        <?php echo number_format($slipTotalAmount,2,',','.'); ?>
                                    </span>
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
                                    style="padding: 20px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                        In attesa di ricevere contabile di pagamento al seguente indirizzo mail: <a style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#909090; line-height:1.2" href="mailto:billing@iwes.it">billing@iwes.it</a>.
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 20px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                        Cordialmente salutiamo.
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 20px 10px 0; margin: 0px; line-height: 1.5; font-size: 18px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:800;color:#3A3A3A; line-height:1.2;">
                                     I.W.E.S.
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 0px 10px 0; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#878787; line-height:1.2;">
                                        International Web E-commerce Services
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" class="lh-3"
                                    style="padding: 2px 10px 20px; margin: 0px; line-height: 1.5; font-size: 16px; font-family: Times New Roman, Times, serif;">
                                    <span style="font-family: 'Poppins', sans-serif; font-size:15px;font-weight:300;color:#3A3A3A; line-height:1.2;">
                                     Financial Department
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