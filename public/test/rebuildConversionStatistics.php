<?php
require "../../iwesStatic.php";


try {

    $orders = \Monkey::app()->repoFactory->create('Order')->findBySql("Select distinct id from `Order` o where o.status like 'ORD%' and o.orderDate > str_to_date('01 10 2016', '%D %m %Y')");

    foreach ($orders as $order) {
        var_dump($order);
        runOne($order);
    }
} catch (Throwable $e) {
    var_dump($e);
    die();
}

function timee($time = null)
{
    if(is_null($time)) $time = time();
    return date('Y-m-d H:i:s',$time);
}


function runOne($order) {
    var_dump('working '.$order->id);
    $sids = [];
    foreach ($order->userSession as $userSession) {
        $sids[] = $userSession->sid;
    }
    foreach ($order->user->userSession as $userSession) {
        $sids[] = $userSession->sid;
    }
    if(empty($sids)) {
        var_dump('Ricerca Sid'.' Nessun Sid associato a questo ordine '.$order->id);
        $sids[] = 'nessunissimo';
    }
    $params = array_unique($sids);
    $sids = [];
    foreach ($params as $sid) $sids[] = '?';

    $c = new \DateTime($order->orderDate);
    $c->sub(new \DateInterval('P31D'));

    $sql = "SELECT DISTINCT id 
                    FROM ActivityLog 
                    WHERE hasCampaignData = 1 AND 
                    (sid IN (".implode(',', $sids).") OR
                     userId = {$order->user->id}) and
                    creationDate > '".timee($c->getTimestamp())."' AND 
                    creationDate < '".$order->orderDate."' 
                    ORDER BY creationDate DESC;";

    $sources = \Monkey::app()->repoFactory->create('ActivityLog')->findBySql($sql, $params);
    try {
        $seenSources = [];
        $campaignVisitsHasOrder = \Monkey::app()->repoFactory->create('CampaignVisitHasOrder')->findBy(['orderId'=>$order->id]);
        foreach ($campaignVisitsHasOrder as $campaignVisitHasOrder) {
            $seenSources[] = $campaignVisitHasOrder->campaignId;
        }
        $seenSources = array_unique($seenSources);
        //$this->report('runConversions', 'sources: ' . count($sources));
        \Monkey::app()->repoFactory->beginTransaction();
        foreach ($sources as $source) {
            $campaign = \Monkey::app()->repoFactory->create('Campaign')->readCampaignData($source->vars);

            if(array_search($campaign->id,$seenSources) === false) {
                $seenSources[] = $campaign->id;
            } else continue;
            $campaignVisit = \Monkey::app()->repoFactory->create('CampaignVisit')->findOneBy([
                "campaignId" => $campaign->id,
                "timestamp" => $source->creationDate
            ]);
            if(is_null($campaignVisit)) {
                $campaignVisit = \Monkey::app()->repoFactory->create('CampaignVisit')->getEmptyEntity();
                $campaignVisit->campaignId = $campaign->id;
                $campaignVisit->timestamp = $source->creationDate;
                $campaignVisit->id = $campaignVisit->insert();
            }
            $campaignVisitHasOrder = \Monkey::app()->repoFactory->create('CampaignVisitHasOrder')->getEmptyEntity();
            $campaignVisitHasOrder->campaignVisitId = $campaignVisit->id;
            $campaignVisitHasOrder->campaignId = $campaign->id;

            $campaignVisitHasOrder->orderId = $order->id;
            $campaignVisitHasOrder->insert();
        }
        //$this->report('runConversions', 'conversion registered');
        \Monkey::app()->repoFactory->commit();
    } catch (\Throwable $e) {
        \Monkey::app()->repoFactory->rollback();
        throw $e;
    }
}