<?php
require "../../iwesStatic.php";
try {
    $order = \Monkey::app()->repoFactory->create('Order')->findOneByStringId($_GET['order']);
    $gateway = \Monkey::app()->orderManager->getPaymentGateway($order);
    echo $gateway->getUrl($order);
} catch(Throwable $e) {
    echo 'ERRORE<br />';
    var_dump($e);
}
