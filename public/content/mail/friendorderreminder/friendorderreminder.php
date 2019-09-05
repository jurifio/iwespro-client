<?php
use bamboo\core\theming\CMailerHelper;
/** @var CMailerHelper $app */ ?>
<html lang="<?php echo $app->lang(); ?>">
<head>
    <meta charset="UTF-8" />
    <style type="text/css"><?php echo $css; ?></style>
</head>
<body>
Ciao,<br>
    ti ricordiamo che devi confermare <?php echo count($orderLines) ?> ordini.<br />
    Ti prego di preparare i prodotti per la spedizione <br />

    <br />
    <table>
        <thead>
            <tr>
                <th>Numero Ordine</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($orderLines as $orderLine) {
            echo '<tr>';
                echo '<td>'.$orderLine->printId().'</td>';
            echo '</tr>';
            }
        ?>
        </tbody>


    </table>
    puoi confermare gli ordini seguendo il seguente link: <br />
    <a href="https://www.iwes.pro/blueseal/friend/ordini">https://www.iwes.pro/blueseal/friend/ordini</a><br />
    la mancata conferma tempestiva comporterà il ritardo di un giorno<br />
    Saluti<br />

    <img src="https://www.pickyshop.com/it/assets/logowide.png"><br />
    Friends Support

</body>
</html>