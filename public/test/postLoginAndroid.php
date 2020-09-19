<?php


require '../../iwesStatic.php';

if($_POST['email']){
    $email=$_POST['email'];
}
$data=[];
$user=\Monkey::app()->repoFactory->create('User')->findOneBy(['email'=>$email]);
if($user!=null){
    $userDetails=\Monkey::app()->repoFactory->create('UserDetails')->findOneBy(['userId'=>$user->id]);
    $resShop=\Monkey::app()->dbAdapter->query('select shopId as shopId from UserHasShop where userId='.$user->id,[])->fetchAll();
    foreach($resShop as $shopResult) {
        $shopId=$shopResult['shopId'];
    }
    $resEditorialPlan=\Monkey::app()->dbAdapter->query('select id as editorialPlanId from EditorialPlan where shopId='.$shopId,[])->fetchAll();
    if(count($resEditorialPlan)>0) {
        foreach ($resEditorialPlan as $resEditorial) {
            $editorialPlanId = $resEditorial['editorialPlanId'];
        }
    }else{
        $editorialPlanId ='no';
    }
    $data[0]=['name'=>'Ciao '. $userDetails->name,'shopId'=>$shopId,'editorialPlanId'=>$editorialPlanId];
}else{
    $data[0]=['name'=>'Attenzione Email utente non Riconosciuta','shopId'=>'no','editorialPlanId'=>'no'];
}


echo json_encode($data);


