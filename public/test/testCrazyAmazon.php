<?php

require '../../iwesStatic.php';
use Aws\S3\S3Client;
use Aws\Common\Credentials\Credentials;
\Monkey::app()->vendorLibraries->load('amazonsapi');

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
    'role_arn' => 'arn:aws:iam::446278990062:role/PartnerRoleAPI' ,

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

$nextToken= $res->refresh_token;
$token='Atzr|IwEBIFEh8rsv4QOPx-i4zw1WuEHIzTf7Mdrz9eE3uRsrqJjyTdJ1OtmhMQSSrkkws2hpTNow3yiDBZvpe8ZXwq3pheu7U0qyS7UYErcAeAxDnUq3BkATKAy5ziD5rubs4yFfD17yOx7FVyP4AgpNp50miQe-26xRNGyaHrKhCafeEjSFhWe5Msto9DW5fNQOdyAXOQOB2kYjATC6y1hn_OhVPBEjFZOG6GRphAwOK8j-jUiHZGNAfBGBRURoByW5LRhny1gxPRUmFDVjKIS20UJSA2CZEEap-cV6a8PujG7yDmBe4HxB9r_-XFcwjpi415IqN3w","client_id"=>"amzn1.application-oa2-client.1cf3ee13dbbe435caadced510a94f1f1","client_secret" => "2574f54cc10b20c7a814a2c81df7fcbd117c28ae02e3c95e42d43e04a36e4d8e';
$options = [
    'refresh_token' => $res->refresh_token,
    'client_id' => 'amzn1.application-oa2-client.1cf3ee13dbbe435caadced510a94f1f1',
    'client_secret' => '2574f54cc10b20c7a814a2c81df7fcbd117c28ae02e3c95e42d43e04a36e4d8e',
    'region' =>  'eu-west-1',
    'access_key' => 'AKIAWP2CM7DXOW6TRZXL',
    'secret_key' => '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',
    'endpoint' =>  'https://sellingpartnerapi-eu.amazon.com',
    'role_arn' => 'arn:aws:iam::446278990062:user/PartnerRoleAPI',
    'marketplaceId' =>'APJ6JRA9NG5V4'
];


//$credentials = new Credentials('AKIAWP2CM7DXOW6TRZXL', 'l5lWa7yTLurvmqdeHEhv5Sa1HzH84nCPfLCVDyji');


// crea access token
$accessToken = \ClouSale\AmazonSellingPartnerAPI\SellingPartnerOAuth::getAccessTokenFromRefreshToken(
    $options['refresh_token'],
    $options['client_id'],
    $options['client_secret']
);
//imposta configurzione
$config =   \ClouSale\AmazonSellingPartnerAPI\Configuration::getDefaultConfiguration();
$config->setHost($options['endpoint']);
$config->setAccessToken($accessToken);
$config->setAccessKey($options['access_key']);
$config->setSecretKey($options['secret_key']);
$config->setRegion($options['region']);

//crea prenotazoine feedDocumentId e importa il payload
$apiInstance =  new \ClouSale\AmazonSellingPartnerAPI\Api\FeedsApi(
// If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
// This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \ClouSale\AmazonSellingPartnerAPI\Models\Feeds\CreateFeedDocumentSpecification(["content_type"=>"text/xml; charset=UTF-8"]); // \Swagger\Client\Models\CreateFeedDocumentSpecification |

try {
    $result = $apiInstance->createFeedDocument($body);
    $decodeResult=json_decode($result,true);
   // echo 'feedDocumentId: '.$decodeResult[0]payload->container->feed_document_id.'<br>';
    /*
    echo 'feedDocumentId: '.$decodeResult['payload']['feedDocumentId'].'<br>';
    echo 'url: '.$decodeResult['payload']['url'].'<br>';
    echo 'standard: '.$decodeResult['payload']['encryptionDetails']['standard'].'<br>';
    echo 'encryptionDetails initializationVector: '.$decodeResult['payload']['encryptionDetails']['initializationVector'].'<br>';
    echo 'encryptionDetails key: '.$decodeResult['payload']['encryptionDetails']['key'].'<br>';
    */
    $feedDocumentId=$decodeResult['payload']['feedDocumentId'];
    $url=$decodeResult['payload']['url'];
    $standard=$decodeResult['payload']['encryptionDetails']['standard'];
    $initializationVector=$decodeResult['payload']['encryptionDetails']['initializationVector'];
    $key=$decodeResult['payload']['encryptionDetails']['key'];
    $payload=$decodeResult['payload'];

} catch (Exception $e) {
    echo 'Exception when calling FeedsApi->createFeedDocument: ', $e->getMessage(), PHP_EOL;
}

// crea feed in xml e cripta e upload
$feedContentFilePath = '/media/sf_sites/iwespro/temp/productFeed_1_2021-03-23_111325.xml';

$result = (new  \ClouSale\AmazonSellingPartnerAPI\Helpers\Feeder())->uploadFeedDocument($payload,"text/xml; charset=UTF-8",$feedContentFilePath);
echo $feedDocumentId.'<br>';
$resultDocumentResult = new \ClouSale\AmazonSellingPartnerAPI\Models\Feeds\createFeedDocumentResult(['feed_document_id'=>$feedDocumentId,'url'=>$url,'encryption_details'=>$decodeResult['payload']['encryptionDetails']]);
$resDocResult=json_decode($resultDocumentResult,true);


$apiInstance =  new \ClouSale\AmazonSellingPartnerAPI\Api\FeedsApi(
// If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
// This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \ClouSale\AmazonSellingPartnerAPI\Models\Feeds\CreateFeedSpecification(['feed_type'=>'POST_PRODUCT_DATA','marketplace_ids'=>['APJ6JRA9NG5V4','A13V1IB3VIYZZH','A1RKKUPIHCS9HS','A1805IZSGTT6HS','A1PA6795UKMFR9','A1F83G8C2ARO7P'],'input_feed_document_id'=>$feedDocumentId]);
//$body = new \ClouSale\AmazonSellingPartnerAPI\Models\Feeds\CreateFeedSpecification(['feed_type'=>'POST_PRODUCT_DATA','marketplace_ids'=>['APJ6JRA9NG5V4'],'input_feed_document_id'=>$feedDocumentId]);
try {
   // $resultp=new \ClouSale\AmazonSellingPartnerAPI\Models\Feeds\Feed(['feed_type'=>'POST_PRODUCT_DATA','marketplace_ids'=>['APJ6JRA9NG5V4','A13V1IB3VIYZZH','A1RKKUPIHCS9HS','A1805IZSGTT6HS','A1PA6795UKMFR9','A1F83G8C2ARO7P'],'input_feed_document_id'=>$feedDocumentId]);
    $resultp = $apiInstance->createFeed($body);
    $decodeResult=json_decode($resultp,true);
    /*$feedDocumentId=$decodeResult['payload']['feedDocumentId'];
    $url=$decodeResult['payload']['url'];
    $standard=$decodeResult['payload']['encryptionDetails']['standard'];
    $initializationVector=$decodeResult['payload']['encryptionDetails']['initializationVector'];
    $key=$decodeResult['payload']['encryptionDetails']['key'];
    $payload=$decodeResult['payload'];*/

} catch (Exception $e) {
    echo 'Exception when calling FeedsApi->createFeed: ', $e->getMessage(), PHP_EOL;
}








//pubblica su s3 file


// risposta di caricamento  e aggiornamento database


//





