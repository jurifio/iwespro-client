<?php
require '../../iwesStatic.php';
$editorialPlanDetailRepo=\Monkey::app()->repoFactory->create('EditorialPlanDetail');
$today = (new DateTime())->format('Y-m-d H:i:s');
$finalDay = (new \DateTime("+2 week"))->format('Y-m-d H:i:s');


if($_POST['editorialplanDetailId']){
    $editorialPlanDetailId=$_POST['editorialplanDetailId'];
}
if($_POST['editorialPlanName']){
    $editorialPlanName=$_POST['editorialPlanName'];
}

if($_POST['title']){
    $title=$_POST['title'];
}






try {

    $editorialDetails=$editorialPlanDetailRepo->findOneBy(['id'=>$editorialPlanDetailId]);
    $editorialDetails->status='Published';
    $editorialPlanId=$editorialDetails->editorialPlanId;
    $editorialDetails->update();
    $editorialPlan = \Monkey::app()->repoFactory->create('EditorialPlan')->findOneBy(['id' => $editorialPlanId]);
    $editorialPlanName = $editorialPlan->name;
    /** @var aRepo $ePlanSocialRepo */
    $ePlanSocialRepo = \Monkey::app()->repoFactory->create('EditorialPlanSocial');
    /** @var CEditorialPlanSocial $editorialPlanSocial */
    $editorialPlanSocial=$ePlanSocialRepo->findAll();
    $shopId = $editorialPlan->shop->id;
    $shopEmail = $editorialPlan->shop->referrerEmails;
    $to = $shopEmail;
    $contractId=$editorialPlan->contractId;
    $contractsRepo=\Monkey::app()->repoFactory->create('Contracts');
    $contracts=$contractsRepo->findOneBy(['id'=>$editorialPlan->contractId]);


        $subject="Iwes.pro Pubblicazione Post Su Instagram di ".$editorialPlanName;
        $message ="Pubblicazione Post Su Instagram post <br>";
        $message.=$title;


    if (count($contracts) > 0) {

        $foisonId = $contracts->foisonId;
        $foison = \Monkey::app()->repoFactory->create('Foison')->findOneBy(['id' => $foisonId]);
        if ($foison != null) {
            $userEditor = [$foison->email];
            /** @var \bamboo\domain\repositories\CEmailRepo $emailRepo */
            $emailRepo = \Monkey::app()->repoFactory->create('Email');
            if (!is_array($to)) {

                $to = [$to];
            }
            $to[] = ['gianluca@iwes.it'];
            $userEditor = ['jurif@iwes.it'];
            $emailRepo = \Monkey::app()->repoFactory->create('Email');
            $emailRepo->newMail('Iwes IT Department <it@iwes.it>',$to,$userEditor,[],$subject,$message,null,null,null,'mailGun',false,null);
        }
    }
    $toBoss = ['gianluca@iwes.it'];
    /** @var \bamboo\domain\repositories\CEmailRepo $emailRepo */
    $emailRepo = \Monkey::app()->repoFactory->create('Email');
    $emailRepo->newMail('Iwes IT Department <it@iwes.it>',$toBoss,[],[],$subject,$message,null,null,null,'mailGun',false,null);




    $result='1';
}catch(\Throwable $e){
    $result='2';
}
echo json_encode($result);


