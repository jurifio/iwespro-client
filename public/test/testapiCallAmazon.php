<?php

require '../../iwesStatic.php';
\Monkey::app()->vendorLibraries->load('amazonapi');
//require_once('/media/sf_sites/vendor/vendor/autoload.php');
$urlInsert = "https://api.amazon.com/auth/o2/token";
$data = array("grant_type" => "refresh_token","refresh_token" => "Atzr|IwEBIFEh8rsv4QOPx-i4zw1WuEHIzTf7Mdrz9eE3uRsrqJjyTdJ1OtmhMQSSrkkws2hpTNow3yiDBZvpe8ZXwq3pheu7U0qyS7UYErcAeAxDnUq3BkATKAy5ziD5rubs4yFfD17yOx7FVyP4AgpNp50miQe-26xRNGyaHrKhCafeEjSFhWe5Msto9DW5fNQOdyAXOQOB2kYjATC6y1hn_OhVPBEjFZOG6GRphAwOK8j-jUiHZGNAfBGBRURoByW5LRhny1gxPRUmFDVjKIS20UJSA2CZEEap-cV6a8PujG7yDmBe4HxB9r_-XFcwjpi415IqN3w","client_id"=>"amzn1.application-oa2-client.1cf3ee13dbbe435caadced510a94f1f1","client_secret" => "2574f54cc10b20c7a814a2c81df7fcbd117c28ae02e3c95e42d43e04a36e4d8e");

$postdata = json_encode($data);

$ch = curl_init($urlInsert);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$result = curl_exec($ch);
curl_close($ch);
$res=json_decode($result);
$nextToken= $res->access_token;


$options = [
    'refresh_token' => $res->refresh_token,
    'client_id' => 'amzn1.application-oa2-client.1cf3ee13dbbe435caadced510a94f1f1',
    'client_secret' => '2574f54cc10b20c7a814a2c81df7fcbd117c28ae02e3c95e42d43e04a36e4d8e',
    'region' =>  'eu-west-1',
    'access_key' => 'AKIAWP2CM7DXFLQPFIUR',
    'secret_key' => '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',
    'endpoint' =>  'https://sandobox.sellingpartnerapi-eu.amazon.com',
    'role_arn' => 'arn:aws:iam::446278990062:role/PartnerRoleAPI',
    'marketplaceId' =>'APJ6JRA9NG5V4'
];




$config =  \ClouSale\AmazonSellingPartnerAPI\Configuration::getDefaultConfiguration();
$config->setHost($options['endpoint']);
$config->setAccessToken($nextToken);
$config->setAccessKey( $options['access_key']);
$config->setSecretKey( $options['secret_key']);
$config->setRegion($options['region']);
$apiInstance = new \ClouSale\AmazonSellingPartnerAPI\Api\CatalogApi($config);
$marketplace_id = 'APJ6JRA9NG5V4';
$asin = 'B0002ZFTJA';

$result = $apiInstance->getCatalogItem($marketplace_id, $asin);
echo $result->getPayload()->getAttributeSets()[0]->getTitle(); // Never Gonna Give You Up [Vinyl Single]






