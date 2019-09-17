<?php
ini_set("memory_limit", "2000M");
ini_set('max_execution_time', 0);
$ttime = microtime(true);
$time = microtime(true);
use PDO;
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
/*$order=\Monkey::app()->repoFactory->create('Order')->findOneBy(['id'=>2658920]);
$address=json_decode($order->frozenShippingAddress,true);
echo $address['name'];
*/
$shopRepo = \Monkey ::app() -> repoFactory -> create('Shop') -> findBy(['hasEcommerce' => 1]);
foreach ($shopRepo as $value) {
    $res="";
    /********marketplace********/
    $db_host = $value -> dbHost;
    $db_name = $value -> dbName;
    $db_user = $value -> dbUsername;
    $db_pass = $value -> dbPassword;
    $shop = $value -> id;
    try {
        $db_con = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
        $db_con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $res .= " connessione ok <br>";
    } catch (PDOException $e) {
        $res .= $e -> getMessage();
    }
    $sql = "SELECT c.id,
                       cvhp.productId as productId,
                       cvhp.productVariantId as productVariantId,
                       round(sum(cv.cost),2) AS cost,
                       count(DISTINCT cv.id) AS visits,
                       count(DISTINCT cvho.orderId) AS orderCount,
                       ifnull(sum(DISTINCT ol.netPrice),0) AS orderValue
               FROM Campaign c
                 JOIN CampaignVisit cv ON c.id = cv.campaignId
                 JOIN CampaignVisitHasProduct cvhp ON (cv.id, cv.campaignId) = (cvhp.campaignVisitId, cvhp.campaignId)
                 LEFT JOIN (
                   CampaignVisitHasOrder cvho JOIN OrderLine ol ON cvho.orderId = ol.orderId
                 ) ON (cv.id, cv.campaignId) = (cvho.campaignVisitId, cvho.campaignId) AND
                   (cvhp.productId,cvhp.productVariantId) = (ol.productId,ol.productVariantId)
               WHERE cv.timestamp > (NOW() - INTERVAL 1 WEEK)
               GROUP BY c.id,cvhp.productId,cvhp.productVariantId
               HAVING cost > 0
               ORDER BY c.id ASC";
    $res = $db_con ->prepare($sql, []);
    $res->execute();
    echo "<table border='1'>";
    echo "<tr><td>prodotto</td><td>productVariantId</td><td>cost</td><td>visit</td><td>conteggioOrdini</td><td>valoreOrdini</td></tr>";
    foreach ($res as $one){
        echo "<tr><td>".$one['productId']."</td><td>".
            $one['productVariantId']."</td><td>".
            $one['cost']."</td><td>".
            $one['visits']."</td><td>".
            $one['orderCount']."</td><td>".
            $one['orderValue']."</td></tr>";
    }
    echo "</table>";
}