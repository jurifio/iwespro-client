<?php
require "ebayconfig.php";

$marketplaceAccount = \Monkey::app()->repoFactory->create('MarketplaceAccount')->findOneBy(['id'=>17,'marketplaceId'=>3]);
$c = new \bamboo\core\ebay\api\trading\call\CEbayGetCategoriesCall($marketplaceAccount->config,[]);

$c->getMainRequestElement()->getRequesterCredentials()->getEBayAuthToken()->setValue($marketplaceAccount->config['userToken']);
$c->getMainRequestElement()->getDetailLevel()->setValue('ReturnAll');
$c->getMainRequestElement()->getViewAllNodes()->setValue(false);

file_put_contents($ninetyNineMonkey->rootPath().'/temp/response.xml',$c->call()->getRawResponse());
unset($c);
$c = new \bamboo\core\ebay\api\trading\call\CEbayGetCategoriesCall($marketplaceAccount->config,[]);
try{
    set_time_limit(600);
    $c->parseResponse(file_get_contents($ninetyNineMonkey->rootPath().'/temp/response.xml'));
    $repo = \Monkey::app()->repoFactory->create('MarketplaceAccountCategory');
    \Monkey::app()->repoFactory->beginTransaction();
    foreach($c->getMainResponseElement()->getCategoryArray()->getCategory() as $category) {
        /** @var \bamboo\core\ebay\api\trading\types\CEbayCategoryType $category */
        $marketplaceCategory = $repo->getEmptyEntity();
        $marketplaceCategory->marketplaceCategoryId = (string) $category->getCategoryID();
        $marketplaceCategory->name = (string) $category->getCategoryName();
        $marketplaceCategory->marketplaceId = $marketplaceAccount->marketplaceId;
        $marketplaceCategory->marketplaceAccountId = $marketplaceAccount->id;
        $marketplaceCategory->insert();
    }
    \Monkey::app()->repoFactory->commit();
} catch (Throwable $e) {
    \Monkey::app()->repoFactory->rollback();
    die(var_dump($e));
}
