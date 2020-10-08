<?php

use bamboo\core\db\pandaorm\repositories\ARepo;
use bamboo\core\exceptions\RedPandaAssetException;
use bamboo\core\exceptions\RedPandaException;
use bamboo\core\utils\amazonPhotoManager\ImageEditor;
use bamboo\core\utils\amazonPhotoManager\ImageManager;
use bamboo\core\utils\amazonPhotoManager\S3Manager;
use bamboo\domain\entities\CEditorialPlanSocial;
use bamboo\domain\repositories\CProductHasShootingRepo;
use FFMpeg;
require '../../iwesStatic.php';

if($_GET['email']){
    $email=$_GET['email'];
}


header('Content-Type: bitmap; charset=utf-8');
\Monkey::app()->vendorLibraries->load("videoEditing");
\Monkey::app()->vendorLibraries->load("amazon2723");
\Monkey::app()->vendorLibraries->load("amazon2723");
$config=\Monkey::app()->cfg()->fetch('miscellaneous','amazonConfiguration');
$data=[];

    $user=\Monkey::app()->repoFactory->create('User')->findOneBy(['email'=>$email]);
    if(count($user)>0) {
        $operator = $user->id;
$i=0;

        $editorialPlanDetails = \Monkey::app()->repoFactory->create('EditorialPlanDetail')->findBy(['socialId' => 7,'status' => 'Approved','userId' => $operator]);
        foreach ($editorialPlanDetails as $editorialPlanDetail) {
            $editorialPlanName = $editorialPlanDetail->editorialPlan->name;
            $editorialPlanDetailId=$editorialPlanDetail->id;
            $isEventVisible = $editorialPlanDetail->isEventVisible;
            $startEventDate=(new \DateTime($editorialPlanDetail->startEventDate))->format('d-m-Y H:i');
            $endEventDate=(new \DateTime($editorialPlanDetail->endEventDate))->format('d-m-Y H:i');
            $editorialPlanArgumentId=$editorialPlanDetail->editorialPlanArgumentId;
            $title=$editorialPlanDetail->title;
            $description=$editorialPlanDetail->description;
            $photoUrl=$editorialPlanDetail->photoUrl;
            $linkDestination=$editorialPlanDetail->linkDestination;
            $video=$editorialPlanDetail->video1;
            $data[$i]=['result'=>'1',
                       'editorialPlanName'=>$editorialPlanName,
                        'startEventDate'=>$startEventDate,
                        'endEventDate'=>$endEventDate,
                        'editorialPlanArgumentId'=>$editorialPlanArgumentId,
                        'title'=>$title,
                        'description'=>$description,
                        'photoUrl'=>$photoUrl,
                        'linkDestination'=>$linkDestination,
                        'video'=>$video
            ];


        }

    }else{
        $data=['result'=>'0'];
    }




echo json_encode($data);


