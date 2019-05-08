<?php
use bamboo\core\theming\CMailerHelper;
use bamboo\domain\repositories\CProductSkuRepo;
use bamboo\domain\repositories\CProductRepo;
use bamboo\domain\entities\CUserAddress;
/** @var $app CMailerHelper */
/** @var CProductSkuRepo $skuRepo */
$skuRepo = $app->getRepo('ProductSku');
/** @var CProductRepo $productRepo */
$productRepo = $app->getRepo('Product');
?>
<html lang="<?php echo $app->lang(); ?>">
<head>
    <style type="text/css"><?php echo $css; ?></style>
</head>
<body>
<?php echo '<br>'.$data->newOrder.': '.$orderId ?>
<?php echo '<br>'.$data->fromUser.': '.$order->user->id ?>
<?php echo '<br>------------'?>
<?php foreach($order->orderLine as $line): ?>
    <?php echo '<br>id Linea: '.$line->id ?>

    <?php echo '<br>Brand: '.$line->productSku->product->productBrand->name ?>
    <?php echo '<br>Prodotto: '.$line->productSku->product->getName() ?>
    <?php echo '<br>Cpf: '.$line->productSku->product->itemno; ?>
    <?php echo '<br>Variante: '.$line->productSku->product->productVariant->name; ?>
    <?php echo '<br>Sku: '.$line->productSku->printPublicSku() ?>
    <?php echo '<br>Taglia: '.$line->productSku->productSize->name ?>
    <?php echo '<br>Shop: '.$line->productSku->shop->name ?>

    <?php echo '<br>image'; ?>
    <?php echo '<br><img src="'.$app->image($line->productSku->product->getPhoto(1,281),"amazon").'">' ?>
    <?php echo '<br>------------'; ?>
<?php endforeach; ?>
<?php echo '<br>Metodo Pagamento: '.$order->orderPaymentMethod->name ?>
<?php echo '<br>Totale Ordine: '.$order->grossTotal ?>
<?php echo '<br>Totale Da Pagare: '.$order->netTotal ?>

<?php $bill = CUserAddress::defrost($order->frozenBillingAddress); ?>
<?php echo '<br>'; ?>
<?php echo '<br>Indirizzo di Fatturazione'; ?>
<?php echo '<br>Nome: '.$bill->name ; ?>
<?php echo '<br>Cognome: '.$bill->surname ; ?>
<?php echo '<br>Azienda: '.$bill->company ; ?>
<?php echo '<br>Indirizzo: '.$bill->address ; ?>
<?php echo '<br>Segue: '.$bill->extra; ?>
<?php echo '<br>Provincia: '.$bill->province; ?>
<?php echo '<br>Città: '.$bill->city; ?>
<?php echo '<br>CAP: '.$bill->postcode; ?>
<?php echo '<br>Stato: '.$bill->country->name; ?>
<?php echo '<br>Telefono: '.$bill->phone; ?>
<?php $ship = CUserAddress::defrost($order->frozenShippingAddress);
if($ship == false) $ship = $bill;
else $ship->setEntityManager($app->application()->entityManagerFactory->create('UserAddress'));
?>
<?php echo '<br>'; ?>
<?php echo '<br>Indirizzo di Spedizione'; ?>
<?php echo '<br>Nome: '.$ship->name ; ?>
<?php echo '<br>Cognome: '.$ship->surname ; ?>
<?php echo '<br>Azienda: '.$ship->company ; ?>
<?php echo '<br>Indirizzo: '.$ship->address ; ?>
<?php echo '<br>Segue: '.$ship->extra; ?>
<?php echo '<br>Provincia: '.$ship->province; ?>
<?php echo '<br>Città: '.$ship->city; ?>
<?php echo '<br>CAP: '.$ship->postcode; ?>
<?php echo '<br>Stato: '.$ship->country->name; ?>
<?php echo '<br>Telefono: '.$ship->phone; ?>

<?php foreach ($data->content as $paragraph):
    echo $app->parse($paragraph);
endforeach; ?>
</body>
</html>