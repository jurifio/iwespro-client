<?php
use \clouSale\AmazonSellingPartnerAPI;
require '../../iwesStatic.php';

//\Monkey::app()->vendorLibraries->load('amazonapi');

require_once('/media/sf_sites/vendor/vendor/autoload.php');



$options = [
    'refresh_token' => 'Atzr|IwEBIFEh8rsv4QOPx-i4zw1WuEHIzTf7Mdrz9eE3uRsrqJjyTdJ1OtmhMQSSrkkws2hpTNow3yiDBZvpe8ZXwq3pheu7U0qyS7UYErcAeAxDnUq3BkATKAy5ziD5rubs4yFfD17yOx7FVyP4AgpNp50miQe-26xRNGyaHrKhCafeEjSFhWe5Msto9DW5fNQOdyAXOQOB2kYjATC6y1hn_OhVPBEjFZOG6GRphAwOK8j-jUiHZGNAfBGBRURoByW5LRhny1gxPRUmFDVjKIS20UJSA2CZEEap-cV6a8PujG7yDmBe4HxB9r_-XFcwjpi415IqN3w',
    'client_id' => 'amzn1.application-oa2-client.1cf3ee13dbbe435caadced510a94f1f1',
    'client_secret' => '2574f54cc10b20c7a814a2c81df7fcbd117c28ae02e3c95e42d43e04a36e4d8e',
    'region' =>  'eu-south-1',
    'access_key' => 'AKIAWP2CM7DXFLQPFIUR',
    'secret_key' => ',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',
    'endpoint' =>  'https://sts.eu-south-1.amazonaws.com',
    'role_arn' => 'arn:aws:iam::446278990062:role/PartnerRoleAPI',
];

$accessToken =   \clouSale\AmazonSellingPartnerAPI\SellingPartnerOAuth::getAccessTokenFromRefreshToken(
    $options['refresh_token'],
    $options['client_id'],
    $options['client_secret']
);
$assumedRole =   \clouSale\AmazonSellingPartnerAPI\AssumeRole::assume(
    $options['region'],
    $options['access_key'],
    $options['secret_key'],
    $options['role_arn']
);
$config =   \clouSale\AmazonSellingPartnerAPI\Configuration::getDefaultConfiguration();
$config->setHost($options['endpoint']);
$config->setAccessToken($accessToken);
$config->setAccessKey($assumedRole->getAccessKeyId());
$config->setSecretKey($assumedRole->getSecretAccessKey());
$config->setRegion($options['region']);
$config->setSecurityToken($assumedRole->getSessionToken());
$apiInstance = new \clouSale\AmazonSellingPartnerAPI\Api\CatalogApi($config);
$marketplace_id = 'APJ6JRA9NG5V4';
$asin = 'B0002ZFTJA';

$result = $apiInstance->getCatalogItem($marketplace_id, $asin);
echo $result->getPayload()->getAttributeSets()[0]->getTitle(); // Never Gonna Give You Up [Vinyl Single]


