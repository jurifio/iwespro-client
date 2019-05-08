<?php
require "../../iwesStatic.php";

$rf = \Monkey::app()->repoFactory;
$lR = $rf->create('Log');
$oR = $rf->create('Order');

$dba = \Monkey::app()->dbAdapter;

if (array_key_exists('startTime', $_GET)) {
    $timeQuery = "oh.creationDate >= ? AND";
    $timeData = [strtotime($_GET['startTime'])];
} else {
    $timeQuery = "";
    $timeData = [];
}
$query = "SELECT o.id as id, oh.status as `status`, oh.creationDate as time  FROM `Order` as o JOIN OrderHistory as oh on o.id = oh.orderId WHERE " . $timeQuery . " (oh.event like 'Change Status' OR oh.event like 'Carrello trasformato in Ordine') AND oh.status like 'ORD_%'";
\Monkey::dump($query);
$res = $dba->query($query, $timeData)->fetchAll();

$count = 0;
foreach($res as $v) {
    $log = $lR->findOneBy(['entityName' => 'Order', 'stringId' => $v['id'], 'eventValue' => $v['status']]);
    if (!$log) {
        $log = $lR->getEmptyEntity();
        $log->userId = 12853;
        $log->entityName = 'Order';
        $log->stringId = $v['id'];
        $log->eventName = 'createMissingOrder';
        $log->eventValue = $v['status'];
        $log->actionName = 'orderStatusLogWithManine';
        $log->time = $v['time'];
        $log->insert();
        $count++;
    }
}

echo 'cacati ' . $count . ' aggiornamenti di stato nella tabella dei log';