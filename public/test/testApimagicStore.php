<?php

ini_set("memory_limit","2000M");
ini_set('max_execution_time',0);
ini_set('display_errors', 0);
set_time_limit(900);
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
//connessione
//\Monkey::app()->vendorLibraries->load('stomp');
$queue = '/queue/tester'; /* connection */
try {
    $stomp = new Stomp('ssl://prodclone.magicapp.net:8444',
        'tester',
        'cartne01',
        array('host' => 'epa-sandbox',
            'heart-beat' => '0,20000'));
} catch (Exception $e) {
    die('Connection failed: ' . $e->getMessage());
}
/* subscribe to messages from the queue */
try {
    $stomp->subscribe($queue,array('prefetch-count' => 1,'ack' => 'client'));
} catch (Exception $e) {
    die('Subscribe failed: ' . $e->getMessage());
}
/* read a frame */
while (true) {
    try {
        $frame = $stomp->readFrame();
        if ($frame != null) {
            echo "Received message with body '$frame->body' on ";
            echo date('l jS \of F Y h:i:s A');
            echo "<br>";
            /* acknowledge that the frame was received */
            $stomp->ack($frame);
        } else {
            echo "Failed to receive a message<br>";
        }
        ob_flush();
        flush();
    } catch (Exception $e) {
        echo "Exception '$e' on ";
        echo date('l jS \of F Y h:i:s A');
        echo "<br>";
    }
}


unset($stomp);



/* close connection */


/////////////////
/*
$urlInsert = "https://sandbox.magicapp.net/epa-webapp/api/products/msoepatest04$1/metadata/ ";
$options = array(
    "http" => array(
        "header" => "Content-type: text/json\r\n",
        "method" => "POST",
        "content" => $insertJson
    ),
);
$context = stream_context_create($options);
$result = json_decode(file_get_contents($urlInsert,false,$context),true);
if (array_key_exists('success',$result)) {
    $resultApi = "Risultato=" . $result['success'] . " new_id:" . $result['new_id'] . " token:" . $result['token'];
} else {
    $resultApi = "Errore=" . $result['error'] . " codice di errore:" . $result['error_code'];
}
*/