<?php

use bamboo\core\db\pandaorm\repositories\ARepo;
use bamboo\core\exceptions\RedPandaAssetException;
use bamboo\core\exceptions\RedPandaException;
use bamboo\core\utils\amazonPhotoManager\ImageEditor;
use bamboo\core\utils\amazonPhotoManager\ImageManager;
use bamboo\core\utils\amazonPhotoManager\S3Manager;
use bamboo\domain\entities\CEditorialPlanSocial;
use bamboo\domain\repositories\CProductHasShootingRepo;

require '../../iwesStatic.php';

if($_POST['productId']){
    $productId=$_POST['productId'];
}
if($_POST['productVariantId']){
    $productVariantId=$_POST['productVariantId'];
}
if($_POST['shopId']){
    $shopId=$_POST['shopId'];
}
if($_POST['shootingId']){
    $shootingId=$_POST['shootingId'];
}
if($_POST['editorialPlanId']){
    $editorialPlanId=$_POST['editorialPlanId'];
}
if($_POST['position']){
    $position=$_POST['position'];
}
if($_POST['image']){
    $imagePost=$_POST['image'];
}

$binary=base64_decode($imagePost);
$data='1';
header('Content-Type: bitmap; charset=utf-8');
\Monkey::app()->vendorLibraries->load("amazon2723");
$config=\Monkey::app()->cfg()->fetch('miscellaneous','amazonConfiguration');
$tempFolder = \Monkey::app()->rootPath() . \Monkey::app()->cfg()->fetch('paths','tempFolder') . '-plandetail' . "/";
$fileNomePart=$productId.'-'.$productVariantId.'_s'.$position.'.jpg';
$fileNome=$tempFolder.$productId.'-'.$productVariantId.'_s'.$position.'.jpg';
$file=fopen($fileNome,'wb');
fwrite($file,$binary);
fclose($file);
$remoteLinkS3="https://iwes-editorial.s3-eu-west-1.amazonaws.com/plandetail-images/".$fileNomePart;
$image = new ImageManager(new S3Manager($config['credential']),\Monkey::app(), $tempFolder);




    //$fileName['name'] = explode('_',$_FILES['file']['name'][$i])[0];
    // $fileName['extension'] = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);


    try {
        $bucket=$config['bucket'] . '-editorial';
        $folder='plandetail-images';
        $file1 = fopen($fileNome,'r');
        if ($file1) {
            $image1 = new ImageEditor();
            $jpg = $image1->load($fileNome);

            if ($jpg!==false) {


                $files =$fileNomePart;
                $image1->resizeToWidth('600');
                $image1->save($fileNome);
                $image->s3Upload($bucket,$files,$folder);
                sleep(2);
            }
            fclose($file1);
                 unlink($fileNome);

            }
        $res=true;
    } catch (RedPandaAssetException $e) {
        $this->app->router->response()->raiseProcessingError();
        return 'Dimensioni della foto errate: il rapporto deve esser 9:16';
        $res=false;
    }


if($res) {
    $editorialPlan = \Monkey::app()->repoFactory->create('EditorialPlan')->findOneBy(['id' => $editorialPlanId]);
    $editorialPlanName = $editorialPlan->name;

$title='Richiesta post  per  ' . $editorialPlanName . ' da app su scatto Social ' . $fileNomePart;

    $today = (new DateTime())->format('Y-m-d H:i:s');
    $finalDay = (new \DateTime("+2 week"))->format('Y-m-d H:i:s');

    $editorialPlanDetail = \Monkey::app()->repoFactory->create('EditorialPlanDetail')->getEmptyEntity();
    $editorialPlanDetail->editorialPlanId = $editorialPlanId;
    $editorialPlanDetail->startEventDate = $today;
    $editorialPlanDetail->endEventDate = $finalDay;
    $editorialPlanDetail->socialId = 1;
    $editorialPlanDetail->editorialPlanArgumentId = 8;
    $editorialPlanDetail->title = $title;
    $editorialPlanDetail->description = 'Richiesta post  per  ' . $editorialPlanName . ' da app su scatto Social ' . $fileNomePart;
    $editorialPlanDetail->photoUrl = $remoteLinkS3;
    $editorialPlanDetail->status = 'Draft';
    $editorialPlanDetail->insert();

    if (ENV == 'dev') return false;
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
    $subject = "Creazione Nuovo Dettaglio Piano Editoriale";
    $message = "Creazione Nuovo dettaglio Piano Editoriale<p>";
    if(count($contracts)>0) {

        $foisonId = $contracts->foisonId;
        $foison = \Monkey::app()->repoFactory->create('Foison')->findOneBy(['id' => $foisonId]);
        if ($foison != null) {
        $userEditor=[$foison->email];
            /** @var \bamboo\domain\repositories\CEmailRepo $emailRepo */
            $emailRepo = \Monkey::app()->repoFactory->create('Email');
            if (!is_array($to)) {
                $to = [$to];
            }
            $emailRepo->newMail('Iwes IT Department <it@iwes.it>',$to,$userEditor,[],$subject,$message,null,null,null,'mailGun',false,null);
        }
    }
}else{
    $data='2';
}





echo json_encode($data);


