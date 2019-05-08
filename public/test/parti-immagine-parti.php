<?php
require "../../iwesStatic.php";

$db = $ninetyNineMonkey->dbAdapter;
$db->query("UPDATE Job SET manualStart = 1 WHERE id = 59 AND isRunning = 0",[]);
sleep(60);
$a = $db->query("SELECT isRunning from Job WHERE id = 59",[])->fetchAll()[0];
if($a['isRunning'] == 1){
    die('Sta girando');
}else {
    die('qualcosa non è andato bene');
}
