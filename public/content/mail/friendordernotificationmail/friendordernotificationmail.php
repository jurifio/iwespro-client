<?php
use bamboo\core\theming\CMailerHelper;
/** @var CMailerHelper $app */ ?>
<html lang="<?php echo $app->lang(); ?>">
<head>
    <meta charset="UTF-8" />
    <style type="text/css"><?php echo $css; ?></style>
</head>
<body>
<img src="https://www.pickyshop.com/it/assets/logowide.png"><br>
Ciao,<br>
    grazie per aver confermati gli ordini per un totale di <?php echo $total ?>.<br />
    Ti prego di preparare i prodotti per la spedizione <br />

    <br />
    <table>
        <?php
        $orderRepo=\Monkey::app()->repoFactory->create('Order');
        $extId = isset($lines[0]['extId']);
        ?>
        <thead>
            <tr>
                <th>Ordine-Riga</th>
                <th>Nome Prodotto</th>
                <?php
                if($extId) {
                    echo '<th>Codice Friend</th>';
                } ?>
                <th>Codice Prodotto Fornitore</th>
                <th>Colore</th>
                <th>Brand</th>
                <th>Taglia</th>
                <th>Prezzo Friend</th>
                <th>Anteprima</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $checkParallal=[];
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
        </tbody>
    </table>
    <br>
    <br>
    Indirizzo di spedizione del prodotto:<br>
<br>
<p style="font-weight:bold"><?php echo $address['name'].' '.$address['surname'];?><br>
    <?php if (isset ($address['Company'])){
    echo $address['Company'].'<br>';
}
?>
</p>
<?php echo $address['address'];?><br>
<?php echo $address['postcode'].' ' .$address['city'].' '.$address['province']?><br>
<?php echo $country;?><br>
<br>
<?php   if (in_array('0', $checkOrigin, true)){
"<p style='font-weight:bold'>Prego utilizzare un nastro neutro per il confezionamento del pacco<br></p>";
}
?>
    <p style="font-weight:bold">In caso di domande, richieste o suggerimenti, non esitate a contattarci tramite telefono al seguente numero 0733-471365 o via e-mail all'indirizzo friends@iwes.it<br></p>

    Saluti<br>
    <img src="https://www.pickyshop.com/it/assets/logowide.png"><br>
    Friends Support
</body>
</html>