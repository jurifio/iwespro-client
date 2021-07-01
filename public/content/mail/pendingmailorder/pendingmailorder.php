<?php
use bamboo\core\theming\CMailerHelper;
use bamboo\core\base\CLogger;
use bamboo\core\application;

/** @var CMailerHelper $app */ ?>
<html lang="<?php echo $app->lang(); ?>">
<head>
    <meta charset="UTF-8" />
    <style type="text/css"><?php echo $css; ?></style>
</head>
<body>
<img width="600"  src="https://www.iwes.pro/it/assets/logoiwes.png"><br>
Ciao,<br>
Ho il piacere di comunicarTi che sono stati venduti i seguenti oggetti<br>
Ti prego gestire le seguenti righe di ordine per i rispetti fornitori.<br>

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
                  echo '<a href="https://www.iwes.pro/blueseal/ordini/aggiungi?order='.$line['orderId'].'" target="_blank">Elabora  gli ordini </a>';
                $logoSite=$findShopParallel->logoSite;
            } else {
                echo '<a href="https://www.iwes.pro/blueseal/ordini/aggiungi?order='.$line['orderId'].'" target="_blank">Elabora  gli ordini </a>';
            }
        }else{
            echo '<a href="https://www.iwes.pro/blueseal/ordini/aggiungi?order='.$line['orderId'].'" target="_blank">Elabora  gli ordini </a>';
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
Affrettati a gestire gli ordini.<br>



<p style="font-weight:bold"><br></p>
<p style="font-weight:bold"><br>

<?php

echo '<img width="130" height="30" src="https://www.iwes.pro/it/assets/logoiwes.png"><br>';?>
Friends Support
</body>
</html>
