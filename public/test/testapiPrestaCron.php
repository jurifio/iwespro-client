<?php

use bamboo\core\exceptions\BambooException;

ini_set("memory_limit","2000M");
ini_set('max_execution_time',0);
$ttime = microtime(true);
$time = microtime(true);
require '../../iwesStatic.php';
var_dump('Applicazione  \t\t\t\t' . (microtime(true) - $time));

$monkey = \Monkey::app();
$time = microtime(true);
$monkey->dbAdapter;
var_dump("dbAdapter \t\t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->cacheService;
var_dump("cacheService \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->sessionManager;
var_dump("sessionManager \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->authManager;
var_dump("authManager \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->entityManagerFactory;
var_dump("entityManagerFactory \t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->repoFactory;
var_dump("repoFactory \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->eventManager;
var_dump("eventManager \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);



echo "inizio chiamata ordine<br>----------------------------------------------------------------<br><br>";
$request='<?xml version="1.0" encoding="utf-8"?>
<GetOrdersRequest xmlns="urn:ebay:apis:eBLBaseComponents">
 <RequesterCredentials>
    <eBayAuthToken>AgAAAA**AQAAAA**aAAAAA**11TMXA**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6AFlIekDZKGpw2dj6x9nY+seQ**2noBAA**AAMAAA**e4WFyEzST7194ENmESCHB2uW8jxU5xxolrf7Nzy/8LOnKXWp5+PXmWQ6D7kl6eETCU9wshzpVtNTheq7+Wj99W19oACUqe2fTQgzWPiS1o0UlUgUvcdx8nvsVRBbZN/fuSSd12v+bZ9P7gukf09DSHq6wXuhmLxkx8nlrBmHXUBLgYT4e9tMkrGwASQq3uEdoHuUlihbwQxsOqLNv1U9yz0OO30FY7xvOvHR137Lz5CVW9q2IdjSsY45MmAMU8UbMsebDVruoKU59rRTk1kRqrzypuZXB8oo0qq2HNgPzHDBzr70S63ZVfg5QOMunvAIQOfTRGTjy4Jcl/YnIOsZclQRQbPLngZemCouDL+HoybdDKxtq/sSAVBV3EurGYGBYgsRVPv7WBmaPW1LJ5IfQhOosV3Tq9b7CDWupzzxFO9S5lpg4VGts+lsy04dEo5eMUgjWKeofdtMdkOSu2WaEDrFpR4L+kVYcZytqmDFipHZ4crpFhW++gzQthXtOi5wYyhjvEzf6Y82aD9tS9io/TYAiHhzUZhNOv3ofZQRyuJ5rkNwTqbaiqJuQJ7ZLtwnKO+o6cYi7QyJ928t8UEgmzoxvaA5pX1qmUbryz9b8lnPpUeVImOcxPKms8QS6/yL+Hj9iSXBADvcSGvU0lM4Rj6KRTPRsehSCIcWd2pQZ3SE++7ql13AHEyiwlHzvM+h+XM6yEpo40yo7EcwjNSWxqcsh6J+Hg4IJuFDlS5zW21mnz/0mBIaX7r8efcUnR+v</eBayAuthToken>
  </RequesterCredentials>
  <WarningLevel>High</WarningLevel>
  <CreateTimeFrom>2019-10-01T20:34:44.000Z</CreateTimeFrom>
  <CreateTimeTo>2020-10-30T20:34:44.000Z</CreateTimeTo>
  <OrderRole>Seller</OrderRole>
</GetOrdersRequest>';


$devID = '9c29584f-1f9e-4c60-94dc-84f786d8670e';
$appID = 'VendiloS-c310-4f4c-88a9-27362c05ea78';
$certID = '3050bb00-db24-4842-999c-b943deb09d1a';
$siteID = 0;

$apiUrl = 'https://api.ebay.com/ws/api.dll';
$apiCall = 'GetOrders';
$compatibilityLevel = 741;

$runame = 'Vendilo_SpA-VendiloS-c310-4-prlqnbrjv';
$loginURL = 'https://signin.ebay.it/ws/eBayISAPI.dll';

$headers = array(
    // Regulates versioning of the XML interface for the API
    'X-EBAY-API-COMPATIBILITY-LEVEL: ' . $compatibilityLevel,
    // Set the keys
    'X-EBAY-API-DEV-NAME: ' . $devID,
    'X-EBAY-API-APP-NAME: ' . $appID,
    'X-EBAY-API-CERT-NAME: ' . $certID,
    // The name of the call we are requesting
    'X-EBAY-API-CALL-NAME: ' . $apiCall,
    // SiteID must also be set in the Request's XML
    // SiteID = 0 (US) - UK = 3, Canada = 2, Australia = 15, ....
    // SiteID Indicates the eBay site to associate the call with
    'X-EBAY-API-SITEID: ' . $siteID
);
$connection = curl_init();
curl_setopt($connection,CURLOPT_URL,$apiUrl);

curl_setopt($connection,CURLINFO_HEADER_OUT,true);
// Stop CURL from verifying the peer's certificate
curl_setopt($connection,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($connection,CURLOPT_SSL_VERIFYHOST,0);

// Set the headers (Different headers depending on the api call !)

curl_setopt($connection,CURLOPT_HTTPHEADER,$headers);

curl_setopt($connection,CURLOPT_POST,1);

// Set the XML body of the request
curl_setopt($connection,CURLOPT_POSTFIELDS,$request);

// Set it to return the transfer as a string from curl_exec
curl_setopt($connection,CURLOPT_RETURNTRANSFER,1);

// Send the Request
$response = curl_exec($connection);
$ebayOrders = new \SimpleXMLElement($response);

            $ordersArray = $ebayOrders->OrderArray;
            foreach ($ordersArray as $orders) {
                foreach ($orders as $order) {
                    $orderId = $order->OrderID;
                    $orderStatus = $order->OrderStatus;
                    $amountPaid = $order->AmountPaid;
                    $orderPaymentMethodId = 0;
                    switch (true) {
                        case $order->CheckoutStatus->PaymentMethod = 'PayPal':
                            $orderPaymentMethodId = 1;
                            break;
                        case $order->CheckoutStatus->PaymentMethod = 'MoneyXferAccepted':
                            $orderPaymentMethodId = 3;
                            break;
                        case $order->CheckoutStatus->PaymentMethod = 'CreditCard':
                            $orderPaymentMethodId = 2;
                            break;
                        case $order->CheckoutStatus->PaymentMethod = 'COD':
                            $orderPaymentMethodId = 5;
                            break;
                    }
                    $carrierId = 0;
                    switch (true) {
                        case $order->ShippingDetails->ShippingServiceOptions->ShippingService = 'IT_ExpressCourier':
                            $carrierId = 1;
                            break;
                        case $order->ShippingDetails->ShippingServiceOptions->ShippingService = 'MoneyXferAccepted':
                            $carrierId = 3;
                            break;
                        case $order->ShippingDetails->ShippingServiceOptions->ShippingService = 'CreditCard':
                            $carrierId = 2;
                            break;
                        case $order->ShippingDetails->ShippingServiceOptions->ShippingService = 'COD':
                            $carrierId = 5;
                            break;
                    }
                    echo $orderId . '-' . $orderStatus . '-EUR' . $amountPaid . '<br>';
                    echo 'tipo pagamento ' . $orderPaymentMethodId . 'stato pagamento ' . $order->CheckoutStatus->Status;
                }
            }



