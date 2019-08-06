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

$stringApi= '[
{
"referenceId": "349900071795",
"supplierArticle": "AFS023",
"brand": "ALBERTO FERMANI",
"categories": ["Donna", "Calzature", "Stivali"],
"year": 2019,
"season": "Autunno-Inverno 19",
"var": "ROSSO",
"size": "36",
"qty": 2,
"supplierPrice": 200.0,
"marketPrice": 300.0,
"imgs": ["https://eversellstorage.blob.core.windows.net/eversell-images-demo/9bda9a31-a845-42d9-922b-5a8dc09642d0.png", "https://eversellstorage.blob.core.windows.net/eversell-images-demo/b5f94394-a7f9-448b-8243-3460eb9a9a29.png", "https://eversellstorage.blob.core.windows.net/eversell-images-demo/e8e7f3f8-0f2b-4746-899c-2942686528b7.png"],
"barcodeInt": "012345678901",
"ean": "012345678901",
"tags": ["stivaletto","calzature","stivaletto donna"],
"sizeGroup": "calzature",
"audience": "donna",
"colorDescription": "ROSSO",
"name": "Stivaletto donna rosso",
"description": "test"
}
]';
$urlInsert = "https://api.fattureincloud.it/v1/fatture/nuovo";
$options = array(
    "http" => array(
        "header" => "Content-type: text/json\r\n",
        "method" => "POST",
        "content" => $stringApi
    ),
);
$context = stream_context_create($options);
$result = json_decode(file_get_contents($urlInsert, false, $context), true);
if (array_key_exists('success', $result)) {
    $resultApi = "Risultato=" . $result['success'] . " new_id:" . $result['new_id'] . " token:" . $result['token'];
} else {
    $resultApi = "Errore=" . $result['error'] . " codice di errore:" . $result['error_code'];
}
