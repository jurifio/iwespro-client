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
    Ho il piacere di comunicarTi che il Tuo oggetto è stato venduto.<br>
    Ti prego di <a href="https://www.iwes.pro/blueseal/friend/ordini" target="_blank">confermare le righe dell'ordine</a> (previo login) e preparare il pacco per la spedizione.<br>

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
            echo '</tr>';
            array_push($checkParallal,$line['shopId']);
            $order=$orderRepo->findOneBy(['id'=>$line['orderId']]);
            }
        $checkOrigin=[];
        foreach($checkParallal as $check){
            if ($check==$order->remoteShopSellerId) {
                array_push($checkOrigin, '1');
            }else{
                array_push($checkOrigin, '0');
            }

        }
        $address=json_decode($order->frozenShippingAddress,true);
        $findCountry=\Monkey::app()->repoFactory->create('Country')->findOneBy(['id'=>$address['countryId']]);
        if($findCountry!=null){
            $country=$findCountry->name;
        }else{
            $country='';
        }
        ?>
    </table>
    <br>
    <a href="https://www.iwes.pro/blueseal/friend/ordini" target="_blank">Affrettati a confermare</a> e riceverai notifica del pagamento del prodotto e la prenotazione del corriere per il ritiro.<br>
    <br>
    Indirizzo di spedizione del prodotto:<br>
    <br>
    <p style="font-weight:bold"><?php echo $address['name'].' '.$address['surname'];?><br>
    <?php echo $address['Company'];?><br></p>
   <?php echo $address['address'];?><br>
    <?php echo $address['postcode'].' ' .$address['city'].' '.$address['province']?><br>
    <?php echo $country;?><br>
<br>
<?php   if (in_array('0', $checkOrigin, true)){
    "<p style='font-weight:bold'>Prego utilizzare un nastro neutro per il confezionamento del pacco<br></p>";
}
?>

<p style="font-weight:bold"><br></p>
    <p style="font-weight:bold">In caso di domande, richieste o suggerimenti, non esitate a contattarci tramite telefono al seguente numero 0733-471365 o via e-mail all'indirizzo friends@iwes.it<br></p>

    Saluti<br>

    <img src="https://www.pickyshop.com/it/assets/logowide.png"><br>
    Friends Support
</body>
</html>