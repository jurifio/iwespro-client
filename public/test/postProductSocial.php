<?php

use bamboo\core\exceptions\RedPandaAssetException;
use bamboo\core\exceptions\RedPandaException;
use bamboo\core\utils\amazonPhotoManager\ImageManager;
use bamboo\core\utils\amazonPhotoManager\S3Manager;
use bamboo\domain\repositories\CProductHasShootingRepo;

require '../../iwesStatic.php';

if($_POST['productId']){
    $productId=$_POST['productId'];
}
if($_POST['productVariantId']){
    $productVariantId=$_POST['productVariantId'];
}
if($_POST['shopId']){
    $productVariantId=$_POST['shopId'];
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
\Monkey::app()->cfg()->fetch('miscellaneous','amazonConfiguration');
$tempFolder = \Monkey::app()->rootPath() . \Monkey::app()->cfg()->fetch('paths','tempFolder') . '-plandetail' . "/";
$fileNomePart=$productId.'-'.$produtVariantId.'_s'.$position.'.jpg';
$fileNome=$tempFolder.$productId.'-'.$produtVariantId.'_s'.$position.'.jpg';
$file=fopen($fileNome,'wb');
fwrite($file,$binary);
fclose($file);
$remoteLinkS3="https://iwes-editorial.s3-eu-west-1.amazonaws.com/plandetail-images/".$fileNomePart;
$image = new ImageManager(new S3Manager($config['credential']),\Monkey::app(), $tempFolder);

$numPhoto = count($_FILES['file']['name']);

for($i = 0; $i < $numPhoto; $i++) {
    if (!move_uploaded_file($_FILES['file']['tmp_name'][$i],$tempFolder . $_FILES['file']['name'][$i])) {
        throw new RedPandaException('Cannot move the uploaded Files');
    }

    $fileName['name'] = explode('_',$_FILES['file']['name'][$i])[0];
    // $fileName['extension'] = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);


    try {
        $res = $image->processImageEditorialUploadPhoto($_FILES['file']['name'][$i],$fileName,$config['bucket'] . '-editorial','plandetail-images');
    } catch (RedPandaAssetException $e) {
        $this->app->router->response()->raiseProcessingError();
        return 'Dimensioni della foto errate: il rapporto deve esser 9:16';
    }

    unlink($tempFolder . $_FILES['file']['name'][$i]);
}
if($res) {
    $editorialPlan = \Monkey::app()->repoFactory->create('EditorialPlan')->findOneBy(['id' => $editorialPlanId]);
    $editorialPlanName = $editorialPlan->name;


    $today = (new DateTime())->format('Y-m-d H:i:s');
    $finalDay = (new \DateTime("+2 week"))->format('Y-m-d H:i:s');

    $editorialPlanDetail = \Monkey::app()->repoFactory->create('EditorialPlanDetail')->getEmptyEntity();
    $editorialPlanDetail->editorialPlanId = $editorialPlanId;
    $editorialPlanDetail->startEventDate = $today;
    $editorialPlanDetail->endEventDate = $finalDay;
    $editorialPlanDetail->socialId = 1;
    $editorialPlanDetail->editorialPlanArgumentId = 8;
    $editorilaPlanDetail->title = 'Richiesta post  per  ' . $editorialPlanName . ' da app su scatto Social ' . $fileNomePart;
    $editorilaPlanDetail->description = 'Richiesta post  per  ' . $editorialPlanName . ' da app su scatto Social ' . $fileNomePart;
    $editorialPlanDetail->photoUrl = $remoteLinkS3;
    $editorialPlanDetail->status = 'Draft';
    $editorialPlanDetail->insert();
}else{
    $data='2';
}





echo json_encode($data);


