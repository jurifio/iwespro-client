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
$fileNomePart=$productId.'-'.$productVariantId.'_s'.$position.'.mp4';
$fileNome=$tempFolder.$productId.'-'.$productVariantId.'_s'.$position.'.mp4';
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


if($res) {
    $product=\Monkey::app()->repoFactory->create('Product')->findOneBy(['id'=>$productId,'productVariantId'=>$productVariantId]);
    switch($position) {
        case "1":
            $product->dummyVideo = $remoteLinkS3;
            break;
        case "2":
            $product->dummyVideo2 = $remoteLinkS3;
            break;
        case "3":
            $product->dummyVideo3 = $remoteLinkS3;
            break;
        case "4":
            $product->dummyVideo4 = $remoteLinkS3;
            break;
    }

    $product->update();

    $title='Pubblicazione sul  Sito del prodotto  ' . $productId .'-'.$productVariantId. ' da app con link ' . $remoteLinkS3;

    $subject = "Inserimento Video Su Sito ";
    $message = $title;
    $toBoss=['gianluca@iwes.it'];
    /** @var \bamboo\domain\repositories\CEmailRepo $emailRepo */
    $emailRepo = \Monkey::app()->repoFactory->create('Email');
    $emailRepo->newMail('Iwes IT Department <it@iwes.it>',$toBoss,[],[],$subject,$message,null,null,null,'mailGun',false,null);
}else{
    $data='2';
}





echo json_encode($data);


