<?php

require '../../iwesStatic.php';
\Monkey::app()->vendorLibraries->load('amazonapi');

$config = [
    //Guzzle configuration
    'http' => [
        'verify' => false,    //<--- NOT SAFE FOR PRODUCTION
        'debug' => true       //<--- NOT SAFE FOR PRODUCTION
    ],

    //LWA: Keys needed to obtain access token from Login With Amazon Service
    'refresh_token' => 'Atzr|IwEBIFEh8rsv4QOPx-i4zw1WuEHIzTf7Mdrz9eE3uRsrqJjyTdJ1OtmhMQSSrkkws2hpTNow3yiDBZvpe8ZXwq3pheu7U0qyS7UYErcAeAxDnUq3BkATKAy5ziD5rubs4yFfD17yOx7FVyP4AgpNp50miQe-26xRNGyaHrKhCafeEjSFhWe5Msto9DW5fNQOdyAXOQOB2kYjATC6y1hn_OhVPBEjFZOG6GRphAwOK8j-jUiHZGNAfBGBRURoByW5LRhny1gxPRUmFDVjKIS20UJSA2CZEEap-cV6a8PujG7yDmBe4HxB9r_-XFcwjpi415IqN3w',
    'client_id' => 'amzn1.application-oa2-client.1cf3ee13dbbe435caadced510a94f1f1',
    'client_secret' => '2574f54cc10b20c7a814a2c81df7fcbd117c28ae02e3c95e42d43e04a36e4d8e',

    //STS: Keys of the IAM role which are needed to generate Secure Session
    // (a.k.a Secure token) for accessing and assuming the IAM role
    'access_key' => 'AKIAWP2CM7DXOW6TRZXL',
    'secret_key' => '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',
    'role_arn' => 'arn:aws:iam::446278990062:user/PartnerRoleAPI' ,

    //API: Actual configuration related to the SP API :)
    'region' => 'eu-west-1',
    'host' => 'sellingpartnerapi-eu.amazon.com'
];
//eu-west-1
//AKIAWP2CM7DXFLQPFIUR
$urlInsert = "https://api.amazon.com/auth/o2/token";
$data = array("grant_type" => "refresh_token","refresh_token" => "Atzr|IwEBIFEh8rsv4QOPx-i4zw1WuEHIzTf7Mdrz9eE3uRsrqJjyTdJ1OtmhMQSSrkkws2hpTNow3yiDBZvpe8ZXwq3pheu7U0qyS7UYErcAeAxDnUq3BkATKAy5ziD5rubs4yFfD17yOx7FVyP4AgpNp50miQe-26xRNGyaHrKhCafeEjSFhWe5Msto9DW5fNQOdyAXOQOB2kYjATC6y1hn_OhVPBEjFZOG6GRphAwOK8j-jUiHZGNAfBGBRURoByW5LRhny1gxPRUmFDVjKIS20UJSA2CZEEap-cV6a8PujG7yDmBe4HxB9r_-XFcwjpi415IqN3w","client_id"=>"amzn1.application-oa2-client.1cf3ee13dbbe435caadced510a94f1f1","client_secret" => "2574f54cc10b20c7a814a2c81df7fcbd117c28ae02e3c95e42d43e04a36e4d8e");
$data1 = array("grant_type" => "refresh_token","lwa_access_token" => "Atzr|IwEBIFEh8rsv4QOPx-i4zw1WuEHIzTf7Mdrz9eE3uRsrqJjyTdJ1OtmhMQSSrkkws2hpTNow3yiDBZvpe8ZXwq3pheu7U0qyS7UYErcAeAxDnUq3BkATKAy5ziD5rubs4yFfD17yOx7FVyP4AgpNp50miQe-26xRNGyaHrKhCafeEjSFhWe5Msto9DW5fNQOdyAXOQOB2kYjATC6y1hn_OhVPBEjFZOG6GRphAwOK8j-jUiHZGNAfBGBRURoByW5LRhny1gxPRUmFDVjKIS20UJSA2CZEEap-cV6a8PujG7yDmBe4HxB9r_-XFcwjpi415IqN3w","client_id"=>"amzn1.application-oa2-client.1cf3ee13dbbe435caadced510a94f1f1","client_secret" => "2574f54cc10b20c7a814a2c81df7fcbd117c28ae02e3c95e42d43e04a36e4d8e");
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
$token='Atzr|IwEBIIShU9Sik7v3c947K12dzLh34leDHuIxIKmhGAlmzBm2Id-ucw5x4Ugpti0IU1M3oLJwBLkPi00qY-IONqll04Nr8YVVF8ZEdkVaBiUnXEizDGmIPV8aPP0A9SG3jEaE6hxNYU3QH7muWUg1pEoZI1CHWX0DAT5_BhWYhEcdPmupiMvEaioNgYkDwyZsjLcO3jIABh1M5CwLscwJT9UWv13AKjz2CtbpVutOnWR1Aj8eVoJvghW6HZmgcwL-vhcL9aqAfV-9TYJNwlqOhtRW3nUPdRTY0iURX7Me1y8HF8CfVq2yOwCg-ZWGT_2Z0wWhPCU';
$stsCredentials='AKIAWP2CM7DXOW6TRZXL,l5lWa7yTLurvmqdeHEhv5Sa1HzH84nCPfLCVDyji';
$arraySalt=[];
$arraySalt=['lwa_access_token'=>[$token,'expiresOn'=>$res->expires_in],'sts_credentials'=>['access_key'=>'AKIAWP2CM7DXOW6TRZXL','secret_key'=>'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','expiresOn'=>$res->expires_in,'token'=>'Atzr|IwEBIIShU9Sik7v3c947K12dzLh34leDHuIxIKmhGAlmzBm2Id-ucw5x4Ugpti0IU1M3oLJwBLkPi00qY-IONqll04Nr8YVVF8ZEdkVaBiUnXEizDGmIPV8aPP0A9SG3jEaE6hxNYU3QH7muWUg1pEoZI1CHWX0DAT5_BhWYhEcdPmupiMvEaioNgYkDwyZsjLcO3jIABh1M5CwLscwJT9UWv13AKjz2CtbpVutOnWR1Aj8eVoJvghW6HZmgcwL-vhcL9aqAfV-9TYJNwlqOhtRW3nUPdRTY0iURX7Me1y8HF8CfVq2yOwCg-ZWGT_2Z0wWhPCU']];
if (ENV == 'dev') {
    $fp = fopen('/media/sf_sites/iwespro/aws-token/aws-token','w');
    file_put_contents('/media/sf_sites/iwespro/aws-token/aws-token',json_encode($arraySalt));
}else{
    $fp = fopen('/home/iwespro/public_html/aws-token/aws-token','w');
    file_put_contents('/home/iwespro/public_html/aws-token/aws-token',json_encode($arraySalt));
}
fclose($fp);
//Create token storage which will store the temporary tokens

if (ENV == 'dev') {
    $tokenStorage = new DoubleBreak\Spapi\SimpleTokenStorage('/media/sf_sites/iwespro/aws-token/aws-token');
}else{
    $tokenStorage = new DoubleBreak\Spapi\SimpleTokenStorage('/home/iwespro/public_html/aws-token/aws-token');
}

//Create the request signer which will be automatically used to sign all of the
//requests to the API
$signer = new DoubleBreak\Spapi\Signer();

//Create Credentials service and call getCredentials() to obtain
//all the tokens needed under the hood
$credentials = new DoubleBreak\Spapi\Credentials($tokenStorage, $signer, $config);
$cred = $credentials->getCredentials();



/** The application logic implementation **/


//Create SP API Catalog client and execute one ot its REST methods.
$catalogClient = new DoubleBreak\Spapi\Api\CatalogItems($cred, $config);

//Check the catalog info for B074Z9QH5F ASIN
$result = $catalogClient->getCatalogItem('B074Z9QH5F', [
    'MarketplaceId' => 'A1PA6795UKMFR9',
])['payload'];


print_r($result);





