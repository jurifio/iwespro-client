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
$api_uid = '34021';
$api_key = '443884d05056b5f0831446538c6e840f';
$yearNow=date('Y');
$insertJson = '{
  "api_uid": "34021",
  "api_key": "443884d05056b5f0831446538c6e840f",
  "anno": 2019,
   "data_inizio": "01/01/'.$yearNow.'",
  "data_fine": "31/12/'.$yearNow.'",
  "cliente": "",
  "fornitore": "",
  "id_cliente": "",
  "id_fornitore": "",
  "saldato": "",
  "oggetto": "",
  "ogni_ddt": "",
  "PA": false,
  "PA_tipo_cliente": "",
  "pagina": 1
}';
$urlInsert = "https://api.fattureincloud.it:443/v1/fatture/lista";
$options = array(
    "http" => array(
        "header" => "Content-type: text/json\r\n",
        "method" => "POST",
        "content" => $insertJson
    ),
);
$context = stream_context_create($options);
$result = json_decode(file_get_contents($urlInsert, false, $context));
var_dump($result);
foreach($result->lista_documenti as $val){
    if($val->tipo=='fatture') {
        echo $val->nome . '<br>';
        $newdate=str_replace('/','-',$val->data);
        $date = new \DateTime($newdate);
        echo $date->format('Y-m-d H:i:s').'<br>';
        echo $val->importo_netto . '<br>';
        echo $val->numero . '<br>';
        echo $val->id;
    }


}


$insertJsonDet = '{
  "api_uid": "34021",
  "api_key": "443884d05056b5f0831446538c6e840f",
  "id": "44323912"
 
}';
$urlInsertDet = "https://api.fattureincloud.it:443/v1/acquisti/dettagli";
$optionsDet = array(
    "http" => array(
        "header" => "Content-type: text/json\r\n",
        "method" => "POST",
        "content" => $insertJsonDet
    ),
);
$contextDet = stream_context_create($optionsDet);
$resultDet = json_decode(file_get_contents($urlInsertDet,false,$contextDet));
$invoice=$resultDet->dettagli_documento->numero_fattura.'del '.$resultDet->dettagli_documento->data;



