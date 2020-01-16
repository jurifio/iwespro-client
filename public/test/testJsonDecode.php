<?php
use bamboo\domain\entities\CMarketplaceAccount;

$ttime = microtime(true);
$time = microtime(true);
require '../../iwesStatic.php';

//$marketplaceAccountRepo = \Monkey::app()->repoFactory->create('MarketplaceAccount');
//$marketplaceAccounts = $marketplaceAccountRepo->findOneBy(['id'=>32,'marketplaceId'=>9]);
$marketplaceAccount = \Monkey::app()->repoFactory->create('MarketplaceAccount')->findOneBy(['id' => '32','marketplaceId' => '9']);

$marketplaceConfig = json_decode($marketplaceAccount->config,false);




    $rows=[];
    $productBrands=[];
    $shops=[];

    $filter=json_decode($marketplaceAccount->config['ruleOption'],false);

