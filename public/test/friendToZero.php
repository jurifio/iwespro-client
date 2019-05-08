<?php
require "../../iwesStatic.php";
/** @var \bamboo\domain\repositories\CStorehouseOperationRepo $soR */
$soR = \Monkey::app()->repoFactory->create('StorehouseOperation');
\Monkey::app()->authManager->auth();
echo '<p>UTENTE:' . \Monkey::app()->getUser()->id . '</p>';
$sugar = 41;
$dba = \Monkey::app()->dbAdapter;
\Monkey::app()->repoFactory->beginTransaction();
try {
    var_dump($soR->AllSkusByFriendToZero($sugar));
    \Monkey::app()->repoFactory->commit();
} catch(\bamboo\core\exceptions\BambooException $e) {
    \Monkey::app()->repoFactory->rollback();
    echo $e->getMessage();
}