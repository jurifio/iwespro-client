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

if($_GET['email']){
    $email=$_GET['email'];
}


header('Content-Type: bitmap; charset=utf-8');
\Monkey::app()->vendorLibraries->load("videoEditing");
\Monkey::app()->vendorLibraries->load("amazon2723");
$config=\Monkey::app()->cfg()->fetch('miscellaneous','amazonConfiguration');
$data=[];
$i=0;

    $user=\Monkey::app()->repoFactory->create('User')->findOneBy(['email'=>$email]);
    if($user!=null) {
        $operator = $user->id;


        $editorialPlanDetails = \Monkey::app()->repoFactory->create('EditorialPlanDetail')->findBy(['socialId' => 7,'status' => 'Approved','userId' => $operator]);
        foreach ($editorialPlanDetails as $editorialPlanDetail) {
            $editorialPlanName = $editorialPlanDetail->editorialPlan->name;
            $editorialPlanDetailId=$editorialPlanDetail->id;
            $isEventVisible = $editorialPlanDetail->isEventVisible;
            $startEventDate=(new \DateTime($editorialPlanDetail->startEventDate))->format('d-m-Y H:i');
            $endEventDate=(new \DateTime($editorialPlanDetail->endEventDate))->format('d-m-Y H:i');
            $editorialPlanArgumentId=$editorialPlanDetail->editorialPlanArgument->titleArgument;
            $title=$editorialPlanDetail->title;
            $description=$editorialPlanDetail->description;
            $photoUrl=$editorialPlanDetail->photoUrl;
            $linkDestination=$editorialPlanDetail->linkDestination;
            $video=$editorialPlanDetail->video1;
            $data[$i]=['result'=>'1',
                        'editorialPlanDetailId'=>$editorialPlanDetailId,
                       'editorialPlanName'=>$editorialPlanName,
                        'startEventDate'=>$startEventDate,
                        'endEventDate'=>$endEventDate,
                        'editorialPlanDetailArgumentId'=>$editorialPlanDetail->editorialPlanArgumentId,
                        'editorialPlanArgument'=>$editorialPlanArgumentId,
                        'title'=>$title,
                        'description'=>$description,
                        'photoUrl'=>$photoUrl,
                        'linkDestination'=>$linkDestination,
                        'video'=>$video
            ];


        }

    }else{
        $data[$i]=['result'=>'0',
            'editorialPlanDetailId'=>'Non ci sono post da pubblicare',
            'editorialPlanName'=>'',
            'startEventDate'=>'',
            'endEventDate'=>'',
            'editorialPlanDetailArgumentId'=>'',
            'editorialPlanArgument'=>'',
            'title'=>'',
            'description'=>'',
            'photoUrl'=>'',
            'linkDestination'=>'',
            'video'=>''
        ];
    }




echo json_encode($data);


