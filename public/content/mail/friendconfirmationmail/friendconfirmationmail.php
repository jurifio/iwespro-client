<?php
use bamboo\core\theming\CMailerHelper;
/** @var CMailerHelper $app */ ?>
<html lang="<?php echo $app->lang(); ?>">
<head>
    <meta charset="UTF-8" />
    <style type="text/css"><?php echo $css; ?></style>
</head>
<body>
<img width="600"  src="https://www.iwes.pro/it/assets/logoiwes.png"><br>
Ciao,<br>
Ho il piacere di comunicarTi che il Tuo oggetto è stato venduto.<br>
Ti prego di confermare le righe dell'ordine (previo login) e preparare il pacco per la spedizione.<br>

<br>
<table>
    <?php
    $extId = isset($lines[0]['extId']);

    echo '<head>';
    echo '<th>Ordine-Riga</th>';
    echo '<th>Nome Prodotto</th>';
    if($extId) {
        echo '<th>Codice Friend</th>';
    }
    echo '<th>Codice Prodotto Fornitore</th>';
    echo '<th>Colore</th>';
    echo '<th>Brand</th>';
    echo '<th>Taglia</th>';
    echo '<th>Prezzo Friend</th>';
    echo '<th>Anteprima</th>';
    echo '<th>Indirizzo di Spedizione</th>';
    echo '<th>Tipologia di Nastro</th>';
    echo '<th>Azione</th>';
    echo '<th>Sito</th>';
    $checkParallal=[];
    $orderRepo=\Monkey::app()->repoFactory->create('Order');
    foreach($lines as $line){
        echo '<tr>';
        echo '<td>'.$line['orderId'].'-'.$line['orderLineId'].'</td>';
        echo '<td>'.$line['productNameTranslation'].'</td>';
        if($extId) {
            echo '<td>'; echo $line['extId']; echo '</td>';
        }
        echo '<td>'; echo $line['itemno']; echo '</td>';
        echo '<td>'; echo $line['var']; echo '</td>';
        echo '<td>'; echo $line['brand']; echo '</td>';
        echo '<td>'; echo $line['size']; echo '</td>';
        echo '<td>'; echo $line['friendRevenue']; echo '</td>';
        echo '<td><img height="70" src="'.$app->image($line['photo'],'amazon').'"></td>';
        array_push($checkParallal,$line['shopId']);
        $order=$orderRepo->findOneBy(['id'=>$line['orderId']]);
        $checkOrigin=[];
        foreach($checkParallal as $check){
            if ($check==$order->remoteShopSellerId) {
                array_push($checkOrigin, '1');
            }else{
                array_push($checkOrigin, '0');
            }

        }
        echo '<td>';
        $address=json_decode($order->frozenShippingAddress,true);
        $findCountry=\Monkey::app()->repoFactory->create('Country')->findOneBy(['id'=>$address['countryId']]);
        if($findCountry!=null){
            $country=$findCountry->name;
        }else{
            $country='';
        }
        ?>
        <?php if($order->isShippingToIwes==null) { ?>
            <br>
            <p style="font-weight:bold"><?php echo $address['name'] . ' ' . $address['surname']; ?><br>
                <?php if (isset ($address['Company'])) {
                    echo $address['Company'] . '<br>';
                }
                ?>
            </p>
            <?php echo $address['address']; ?><br>
            <?php echo $address['postcode'] . ' ' . $address['city'] . ' ' . $address['province'] ?><br>
            <?php echo $country; ?><br>
            <br>
            <?php echo '</td>';
        }else{?>
            <br>
            <p style="font-weight:bold">Iwes  International Web Ecommerce Services snc<br>
            </p>
            via Cesare Pavese , 1 <br>
            62012 Civitanova Marche (MC)<br>
            ITALIA<br>
            <br>
            </td>
        <? }
        echo '<td>';
        if (in_array('0', $checkOrigin, true)) {
            "<p style='font-weight:bold'>Prego utilizzare un nastro neutro per il confezionamento del pacco<br></p>";
        }
        echo '</td>';
        echo '<td>';
        $logoSite='logoiwes.png';
        if($line['remoteShopSellerId']!=44) {
            $findShopParallel = \Monkey::app()->repoFactory->create('Shop')->findOneBy(['id' => $line['shopId']]);
            if ($findShopParallel->hasEcommerce == 1) {
                echo '<a href="' . $findShopParallel->urlSite . '/blueseal/friend/ordini" target="_blank">confermare la riga </a>';
                $logoSite=$findShopParallel->logoSite;
            } else {
                echo '<a href="https://www.iwes.pro/blueseal/friend/ordini" target="_blank">confermare la riga </a>';
            }
        }else{
            echo '<a href="https://www.iwes.pro/blueseal/friend/ordini" target="_blank">confermare la riga </a>';
            $logoSite='logowidePickyshop.png';
        }
        echo '</td>';
        echo '<td>';
        echo '<img width="135" height="30" src="https://www.iwes.pro/it/assets/'.$logoSite.'"><br>';
        echo '</td>';
        echo '</tr>';
    }
    ?>


</table>
<br>
Affrettati a confermare le richieste  e riceverai notifica del pagamento dei prodotti e la prenotazione del corriere per il ritiro.<br>



<p style="font-weight:bold"><br></p>
<p style="font-weight:bold">In caso di domande, richieste o suggerimenti, non esitate a contattarci tramite telefono al seguente numero 0733-471365 o via e-mail all'indirizzo friends@iwes.it<br></p>

Saluti<br>

<?php

echo '<img width="130" height="30" src="https://www.iwes.pro/it/assets/logoiwes.png"><br>';?>
Friends Support
</body>
</html>
