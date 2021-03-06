<?php

use bamboo\core\exceptions\BambooException;


ini_set("memory_limit","2000M");
ini_set('max_execution_time',0);
$ttime = microtime(true);
$time = microtime(true);
require '../../iwesStatic.php';
\Monkey::app()->vendorLibraries->load("woocommerce");
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

use Automattic\WooCommerce\Client;
use Automattic\WooCommerce\HttpClient\HttpClientException;

$woocommerce = new Client(
    'http://www.soniafedeliparrucchieria.it/',
    'ck_bf857ee767ad48d531aa47971c8f431cecffb871',
    'cs_95770adaf9a657c856ce7ba9ef0cfe6c8980847d',
    [
        'wp_api' => true,
        'version' => 'wc/v3',
        'query_string_auth' => true
    ]
);

try {
    $page = 10;
    $i = 1;
    $countProduct = 0;
    for ($i = 1; $i < $page; $i++) {
        // Array of response results.
        $results = $woocommerce->get('products',array('page' => $i,'per_page' => 100));
            var_dump($results);
        foreach ($results as $result) {
            $countProduct++;
            echo $result->name . '<br>';
            foreach ($result->categories as $category)
                echo $category->name;
        }

    }
    echo $countProduct;


    // Example: ['customers' => [[ 'id' => 8, 'created_at' => '2015-05-06T17:43:51Z', 'email' => ...
    /*
    echo '<pre><code>' . print_r( $results, true ) . '</code><pre>'; // JSON output.

    // Last request data.
    $lastRequest = $woocommerce->http->getRequest();
    echo '<pre><code>' . print_r( $lastRequest->getUrl(), true ) . '</code><pre>'; // Requested URL (string).
    echo '<pre><code>' . print_r( $lastRequest->getMethod(), true ) . '</code><pre>'; // Request method (string).
    echo '<pre><code>' . print_r( $lastRequest->getParameters(), true ) . '</code><pre>'; // Request parameters (array).
    echo '<pre><code>' . print_r( $lastRequest->getHeaders(), true ) . '</code><pre>'; // Request headers (array).
    echo '<pre><code>' . print_r( $lastRequest->getBody(), true ) . '</code><pre>'; // Request body (JSON).

    // Last response data.
    $lastResponse = $woocommerce->http->getResponse();
    echo '<pre><code>' . print_r( $lastResponse->getCode(), true ) . '</code><pre>'; // Response code (int).
    echo '<pre><code>' . print_r( $lastResponse->getHeaders(), true ) . '</code><pre>'; // Response headers (array).
    echo '<pre><code>' . print_r( $lastResponse->getBody(), true ) . '</code><pre>'; // Response body (JSON).
*/
} catch (HttpClientException $e) {
    echo '<pre><code>' . print_r($e->getMessage(),true) . '</code><pre>'; // Error message.
    echo '<pre><code>' . print_r($e->getRequest(),true) . '</code><pre>'; // Last request data.
    echo '<pre><code>' . print_r($e->getResponse(),true) . '</code><pre>'; // Last response data.
}




