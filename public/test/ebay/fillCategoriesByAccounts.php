<?php
require "ebayconfig.php";
try{

//$accountId = ['id' => 21, 'marketplaceId' => 3];
$marketplaceAccount = \Monkey::app()->repoFactory->create('MarketplaceAccount')->findOneBy($accountId);
$c = new \bamboo\core\ebay\api\trading\call\CEbayGetCategoriesCall($marketplaceAccount->config, []);

$c->getMainRequestElement()->getRequesterCredentials()->getEBayAuthToken()->setValue($marketplaceAccount->config['userToken']);
$c->getMainRequestElement()->getDetailLevel()->setValue('ReturnAll');
$c->getMainRequestElement()->getViewAllNodes()->setValue(true);
set_time_limit(0);
file_put_contents($ninetyNineMonkey->rootPath() . '/temp/response.xml', $c->call()->getRawResponse());
}catch(Throwable $e) {
    die(var_dump($e));
}
var_dump('chiamata fatta');
$c->parseResponse();
var_dump('risposta parsata');
var_dump(memory_get_peak_usage());
//$c->parseResponse(file_get_contents($ninetyNineMonkey->rootPath().'/temp/response.xml'));

$allCats = [];
$repo = \Monkey::app()->repoFactory->create('MarketplaceAccountCategory');
try {
    \Monkey::app()->repoFactory->beginTransaction();
    foreach ($c->getMainResponseElement()->getCategoryArray()->getCategory() as $category) {
        /** @var \bamboo\core\ebay\api\trading\types\CEbayCategoryType $category */
        if ($category->getLeafCategory() == 'true') {
            $marketplaceCategory = $repo->getEmptyEntity();
            $marketplaceCategory->marketplaceCategoryId = (string)$category->getCategoryID();
            $marketplaceCategory->name = (string)$category->getCategoryName();
            $marketplaceCategory->marketplaceId = $marketplaceAccount->marketplaceId;
            $marketplaceCategory->marketplaceAccountId = $marketplaceAccount->id;
            $marketplaceCategory->insert();
        }
        $marketplaceCategoryId = (string)$category->getCategoryID();
        $marketplaceCategoryName = (string)$category->getCategoryName();
        $marketplaceCategoryParentId = (string)$category->getCategoryParentID()[0];
        $allCats[$marketplaceCategoryId] = ['name' => $marketplaceCategoryName, 'parent' => $marketplaceCategoryParentId];
    }
    \Monkey::app()->repoFactory->commit();
} catch (Throwable $e) {
    \Monkey::app()->repoFactory->rollback();
    die(var_dump($e));
}
var_dump('inserite foglie');
unset($c);
try {
    \Monkey::app()->repoFactory->beginTransaction();
    $set = $ninetyNineMonkey->dbAdapter->query("SELECT * FROM MarketplaceAccountCategory WHERE marketplaceId = ? AND marketplaceAccountId = ? AND path IS NULL", [$marketplaceAccount->marketplaceId, $marketplaceAccount->id]);
    $x = $set->fetchAll();
    foreach($x as $value) {
        $item = $ninetyNineMonkey->repoFactory->create('MarketplaceAccountCategory')->findOneBy($value);
        $item->path = implode('_', recursion($item->marketplaceCategoryId, $allCats));
        $item->update();
    }
    \Monkey::app()->repoFactory->commit();
} catch (Throwable $e) {
    \Monkey::app()->repoFactory->rollback();
    die(var_dump($e));
}
var_dump('aggiornate con padri');
function recursion($id, $allCats, $parents = [])
{
    if (!empty($allCats[$id]['parent']) && $allCats[$id]['parent'] != $id) {
        $parents[] = $allCats[$id]['name'];
        return recursion($allCats[$id]['parent'], $allCats, $parents);
    } else {
        $parents[] = $allCats[$id]['name'];
        return $parents;
    }
}