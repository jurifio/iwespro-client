<?php
require '../../iwesStatic.php';
$shootingBookingRepo=\Monkey::app()->repoFactory->create('ShootingBooking');
$editorialPlanDetailRepo=\Monkey::app()->repoFactory->create('EditorialPlanDetail');
$today = (new DateTime())->format('Y-m-d H:i:s');
$finalDay = (new \DateTime("+2 week"))->format('Y-m-d H:i:s');


if($_POST['shootingId']){
    $shootingId=$_POST['shootingId'];
}
if($_POST['shootCount']){
    $shootCount=$_POST['shootCount'];
}
if($_POST['socialCount']){
    $socialCount=$_POST['socialCount'];
}
if($_POST['videoCount']){
    $videoCount=$_POST['videoCount'];
}

if($_POST['nameShooting']){
    $nameShooting=$_POST['nameShooting'];
}
if($_POST['nameSocial']){
    $nameSocial=$_POST['nameSocial'];
}
if($_POST['nameVideo']){
    $nameVideo=$_POST['nameVideo'];
}





try {
    $booking = \Monkey::app()->repoFactory->create('ShootingBooking')->findOneBy(['shootingId' => $shootingId]);

    $booking->status = 'c';
    $booking->update();
    $plainId='';
    $editorialDetails=$editorialPlanDetailRepo->findBy(['shootingId'=>$shootingId,'status'=>'Draft']);
    foreach ($editorialDetails as $editorial){
        $plainId=$editorial->editorialPlanId;
        $editorial->isEventVisible=1;
        $editorial->startEventDate=$today;
        $editorial->endEventDate=$finalDay;
        $editorial->update();
    }
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

    if($socialCount>0 || $socialVideo>0) {
        $subject="Iwes.pro Creazione Nuovo Piano Editoriale";
        $message ="creazione Nuovo Piano Editoriale";
        if($socialCount>0){
            $message.='<br> cliccando su questo  <a href="http://www.iwespro/imgTransfer/'.$nameSocial.'">link</a> qui  troverai il file zip contenente  le foto dei piani editoriali</br>';

        }
        if($videoCount>0){
            $message.='<br> cliccando su questo  <a href="http://www.iwespro/imgTransfer/'.$nameVideo.'">link</a> qui  troverai il file zip contenente  le foto dei piani editoriali</br>';
        }


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

}


    $result='1';
}catch(\Throwable $e){
    $result='2';
}
echo json_encode($result);


