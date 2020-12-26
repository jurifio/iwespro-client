<?php
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
$request = '<?xml version="1.0" encoding="utf-8"?>
<GetSellerListRequest xmlns="urn:ebay:apis:eBLBaseComponents">
  <RequesterCredentials>
    <eBayAuthToken>v^1.1#i^1#r^1#p^3#I^3#f^0#t^Ul4xMF8xOjk3MDVGODY4MkI3QUI4QkZGNzlGRTAwMjQwMjk4NkI4XzBfMSNFXjI2MA==</eBayAuthToken>
  </RequesterCredentials>
  <ErrorLanguage>it_IT</ErrorLanguage>
  <WarningLevel>High</WarningLevel>
  <GranularityLevel>Fine</GranularityLevel> 
  <StartTimeFrom>2020-10-01T00:59:59.005Z</StartTimeFrom> 
  <StartTimeTo>2020-10-01T23:59:59.005Z</StartTimeTo> 
   <EndTimeFrom>2020-12-24T00:59:59.005Z</EndTimeFrom> 
  <EndTimeTo>2020-12-24T23:59:59.005Z</EndTimeTo> 
  <IncludeWatchCount>true</IncludeWatchCount> 
  <Pagination> 
    <EntriesPerPage>200</EntriesPerPage> 
  </Pagination> 
</GetSellerListRequest>
';
$devID = '9c29584f-1f9e-4c60-94dc-84f786d8670e';
$appID = 'VendiloS-c310-4f4c-88a9-27362c05ea78';
$certID = '3050bb00-db24-4842-999c-b943deb09d1a';
$siteID = 101;

$apiUrl = 'https://api.ebay.com/ws/api.dll';
$apiCall = 'GetSellerList';
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


    foreach( $ebayOrders->ItemArray->Item as $val){
        echo $val->ItemID.'<br>';
      }



