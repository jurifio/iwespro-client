<?php


require '../../iwesStatic.php';

if($_POST['Email']){
    $email=$_POST['email'];
}
$data='';
$user=\Monkey::app()->repoFactory->create('User')->findOneBy(['email'=>$email]);
if($user!=null){
    $userDetails=\Monkey::app()->repoFactory->create('UserDetails')->findOneBy(['userId'=>$user->id]);
    $data='Ciao '. $userDetails->name;
}else{
    $data='Attenzione Email utente non Riconosciuta';
}


echo json_encode($data);


