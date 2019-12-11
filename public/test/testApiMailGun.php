<?php

require '/media/sf_sites/vendor/mailgun/vendor/autoload.php';
use Mailgun\Mailgun;
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
$mgClient = new Mailgun('key-1d5fe7e72fab58615be0d245d90e9e56');
$domain = 'iwes.pro';
$dateformat=strtotime('2019-10-22 00:03:26');
$beginDate=date("D,d M Y H:i:s -0000",$dateformat);
$endDate=date("D,d M Y H:i:s -0000");
$queryString = array(
    'begin'        => 'Fri, 23 November 2019 09:00:00 -0000',
    'end'          => $endDate,
    'ascending'    => 'yes',
    'pretty'       => 'yes',
    'recipient'    => 'gianluca@iwes.it',
    'event'        => 'delivered'
);
/*
# Make the call to the client.
$result = $mgClient->get("$domain/events", $queryString);
var_dump($result);
$messageId='message-id';
$bodyplain='body-plain';

foreach ($result->http_response_body->items as $list ) {
        echo 'oraInvio:' . date('d-m-Y H:s:i',$list->timestamp) . '<br>';
        if (!empty($list->envelope->sender)) {
            echo 'sender:' . $list->envelope->sender . '<br>';
        }
        if (!empty($list->envelope->targets)) {
            echo 'targets:' . $list->envelope->targets . '<br>';
        }
        if (!empty($list->message->headers->to)) {
            echo 'to:' . $list->message->headers->to . '<br>';
        }
        if (!empty($list->message->headers->from)) {
            echo 'from:' . $list->message->headers->from . '<br>';
        }
        if (!empty($list->message->headers->subject)) {
            echo 'oggetto:' . $list->message->headers->subject . '<br>';
        }
        if (!empty($list->message->headers->$messageId)) {
            echo 'oggetto:' . $list->message->headers->$messageId . '<br>';
        }
        if (!empty($list->message->headers->$bodyplain)) {
            echo 'oggetto:' . $list->message->headers->$bodyplain . '<br>';
        }
        //  echo "testo:".$list->message->headers->subject->body-html;

}
*/
$cartDate = new \DateTime('2017-12-16 23:34:24');
$defDate = $cartDate->format('Y-m-d H:i:s');
$firsTimeEmailSendDay='7';
$firstTimeEmailSendHour='18';
$firstEmailSendDate=date('Y-m-d',strtotime('+'.$firsTimeEmailSendDay.' day ',strtotime($defDate)));
$firstEmailSendDate=date('Y-m-d '.$firstTimeEmailSendHour.':i:s',strtotime(($firstEmailSendDate)));
//echo $firstEmailSendDate;
$validity='P3D';
$issueDate = new \DateTime();
echo $issueDate->format('Y-m-d H:i:s').'<br>';
$validUntil = new \DateInterval($validity);
$validThru = $issueDate->add($validUntil);
$validThru = date_format($validThru,'Y-m-d H:i:s');
echo $validThru;

echo '<br>';
$paymentDate = new DateTime('2019-12-11 17:59:49'); // Today
echo $paymentDate->format('d/m/Y'); // echos today!
$contractDateBegin = new DateTime();
$contractDateEnd  = new DateTime('+1 day');

if (
    $paymentDate->getTimestamp() > $contractDateBegin->getTimestamp() &&
    $paymentDate->getTimestamp() < $contractDateEnd->getTimestamp()){
    echo "is between";
}else{
    echo "NO GO!";
}




