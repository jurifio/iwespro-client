<?php
require "../../../iwesStatic.php";
$ninetyNineMonkey->authManager->auth();

//$f = fopen('shopalikeCatDe.csv', 'r');
while (($row = fgets($f)) !== false) {
    $values = explode(' > ',$row);
    $name = "";
    foreach ($values as $key => $val) {
        $name = trim($val);
    }
    $params = [
        'marketplaceId' => 5,
        'marketplaceAccountId' =>25,
        'marketplaceCategoryId' => $name,
        'name' => trim($name),
        'path' => trim(implode('_',$values)),
        'isRelevant' => 1,
    ];
    $ninetyNineMonkey->dbAdapter->insert('MarketplaceAccountCategory', $params,false,true);
}