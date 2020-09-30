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
$fileNomePart=$productId.'-'.$productVariantId.'_fb_'.$position.'.mp4';
$fileNome=$tempFolder.$productId.'-'.$productVariantId.'_fb_'.$position.'.mp4';
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


    $image->s3Upload($bucket,$fileNome,$folder);
    sleep(2);

    fclose($file1);
    unlink($fileNome);


    $res=true;
} catch (RedPandaAssetException $e) {
    $this->app->router->response()->raiseProcessingError();
    return 'Impossibile Caricare il File Video';
    $res=false;
}







echo json_encode($data);


