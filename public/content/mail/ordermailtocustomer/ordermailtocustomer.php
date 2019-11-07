<?php
use bamboo\core\theming\CMailerHelper;
/** @var CMailerHelper $app */ ?>
<html lang="<?php echo $app->lang(); ?>">
<head>
    <meta charset="UTF-8" />
    <style type="text/css"><?php echo $css; ?></style>
</head>
<body>
<?php $findShopSeller=\Monkey::app()->repoFactory->create('Shop')->findOneBy(['id'=>$row['remoteShopSellerId']]);
$logoSite=$findShopSeller->logoSite;
echo  '<img  width="600" src="https://www.pickyshop.com/it/assets/'.$logoSite.'"><br>';?>

Ciao,<br>
    Ho il piacere di comunicarti che il Tuo oggetto è in  spedizione.<br>

    <br>
<table>
    <?php

    echo '<head>';
    echo '<th>Ordine-Riga</th>';
    echo '<th>Nome Prodotto</th>';
    echo '<th>Codice Prodotto</th>';
    echo '<th>Colore</th>';
    echo '<th>Brand</th>';
    echo '<th>Taglia</th>';
    echo '<th>Anteprima</th>';

    
        echo '<tr>';
        echo '<td>' ; echo $row['orderId'].'-'.$row['orderLineId'].'</td>';
        echo '<td>'; echo $row['productNameTranslation'].'</td>';
        echo '<td>'; echo $row['productId']."-".$row['productVariantId']; echo '</td>';
        echo '<td>'; echo $row['var']; echo '</td>';
        echo '<td>'; echo $row['brand']; echo '</td>';
        echo '<td>'; echo $row['size']; echo '</td>';
        echo '<td><img height="70" src="'.$app->image($row['photo'],'amazon').'"></td>';
        echo '</tr>';
    
    ?>
</table>
    <br>

    <p style="font-weight:bold">In caso di domande, richieste o suggerimenti, non esitate a contattarci tramite telefono al seguente numero 0733-471365 o via e-mail all'indirizzo support@cartechinishop.com.<br></p>

    Saluti<br>
<?php
   echo  '<img  width="130" height="30" src="https://www.pickyshop.com/it/assets/'.$logoSite.'"><br>';?>
</body>
</html>