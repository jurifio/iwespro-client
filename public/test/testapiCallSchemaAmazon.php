<?php

require '../../iwesStatic.php';
\Monkey::app()->vendorLibraries->load('amazonsapi');
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
$nextToken= $res->refresh_token;


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


$config = Swagger\Client\Configuration::getDefaultConfiguration();
$config->setAccessToken($nextToken); //access token of Selling Partner
$config->setApiKey("accessKey", $options['access_key']); // Access Key of IAM
$config->setApiKey("secretKey",  $options['secret_key']); // Secret Key of IAM
$config->setApiKey("region", $options['region']); //region of MarketPlace country
$apiInstance = new Swagger\Client\Api\DefaultApi(
// If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
// This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$max_results_per_page = 100; // int | The maximum number of results to return per page.
$financial_event_group_started_before = new \DateTime("2020-10-01T19:20:30+01:00"); // \DateTime | A date used for selecting financial event groups that opened before (but not at) a specified date and time, in ISO 8601 format. The date-time  must be later than FinancialEventGroupStartedAfter and no later than two minutes before the request was submitted. If FinancialEventGroupStartedAfter and FinancialEventGroupStartedBefore are more than 180 days apart, no financial event groups are returned.
$financial_event_group_started_after = new \DateTime("2021-01-01T19:20:30+01:00"); // \DateTime | A date used for selecting financial event groups that opened after (or at) a specified date and time, in ISO 8601 format. The date-time must be no later than two minutes before the request was submitted.
$next_token = $nextToken; // string | A string token returned in the response of your previous request.

try {
    $result = $apiInstance->listFinancialEventGroups($max_results_per_page, $financial_event_group_started_before, $financial_event_group_started_after, $next_token);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->listFinancialEventGroups: ', $e->getMessage(), PHP_EOL;
}





