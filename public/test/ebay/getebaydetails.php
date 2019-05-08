<?php
require "ebayconfig.php";

$marketplaceAccount = \Monkey::app()->repoFactory->create('MarketplaceAccount')->findOneBy(['id'=>17,'marketplaceId'=>3]);
/** @var $c \bamboo\core\ebay\api\trading\call\CEbayGeteBayDetailsCall */
$c = new \bamboo\core\ebay\api\trading\call\CEbayGeteBayDetailsCall($marketplaceAccount->config,[]);

$c->getMainRequestElement()->getRequesterCredentials()->getEBayAuthToken()->setValue($marketplaceAccount->config['userToken']);
$c->getMainRequestElement()->setDetailName(new \bamboo\core\ebay\api\trading\types\simple\CEbayStringType('ShippingServiceDetails'));
file_put_contents($ninetyNineMonkey->rootPath().'/temp/request.xml',$c->getRawRequest());
file_put_contents($ninetyNineMonkey->rootPath().'/temp/response.xml',$c->call()->getRawResponse());
die();