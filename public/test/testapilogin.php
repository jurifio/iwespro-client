<?php
ini_set("memory_limit", "2000M");
ini_set('max_execution_time', 0);
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

$stringApi = '[
{
"redirectUrl": "https://dev.iwes.pro/blueseal/prodotti/redirect-normalizzazione-prodotti",
"shopId": "1",
"userId": "17370"
}
]';
$urlInsert = "https://dev.iwes.pro/api/loginredirect?&id=1&password=Iwesiwesiwes19!";
$options = array(
    "https" => array(
        "header" => "Content-type: text/json\r\n",
        "method" => "POST",
        "content" => $stringApi
    ),
);
if (ENV == 'dev') {
    $pathlocal = '/media/sf_sites/iwespro/temp-json/';
    $save_to = '/media/sf_sites/iwespro/temp-json/';
    $save_to_dir = '/media/sf_sites/iwespro/temp-json/';

} else {
    $pathlocal = '/home/iwespro/public_html/temp-json/';
    $save_to = '/home/iwespro/public_html/temp-json/';
    $save_to_dir = '/home/iwespro/public_html/temp-json/';

}


//Initiate cURL.
$ch = curl_init($urlInsert);

//The JSON data.
$jsonData = array(
    'username' => 'MyUsername',
    'password' => 'MyPassword'
);

//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);

//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $stringApi);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

//Execute the request
$result = curl_exec($ch);
