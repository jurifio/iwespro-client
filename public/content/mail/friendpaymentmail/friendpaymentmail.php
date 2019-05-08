<?php
use bamboo\core\theming\CMailerHelper;

/** @var CMailerHelper $app */ ?>
<html lang="<?php echo $app->lang(); ?>">
<head>
    <meta charset="UTF-8"/>
    <style type="text/css"><?php echo $css; ?></style>
</head>
<body>
<img height="65" src="http://www.creval.it/PublishingImages/base/logo.png">
<br />
<br />
Preghiamo prendere nota che la società IWES s.n.c. ha disposto bonifico bancario per € <?php echo $total ?>
 a favore di <?php echo $name ?> da eseguirsi in data <?php echo \bamboo\utils\time\STimeToolbox::EurFormattedDate($paymentBill->paymentDate) ?>.
<br />

Di seguito la lista delle fatture saldate con questo pagamento:

<br />
<table>
    <thead>
    <tr>
        <th>
            Anno
        </th>
        <th>
            Numero
        </th>
        <th>
            Valore
        </th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($payment as $invoice): ?>
        <tr>
            <td><?php echo $invoice->year; ?></td>
            <td><?php echo $invoice->number; ?></td>
            <td><?php echo $invoice->getSignedValueWithVat(); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<br />
Cordialmente,<br />
<br />
<img height="25" src="https://www.pickyshop.com/it/assets/logowide.png">
<br />
Iwes International Web Ecommerce Services
<br />
Billing Department
<br />
<br />
</body>
</html>