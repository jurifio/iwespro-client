<?php


require '../../iwesStatic.php';

if($_POST['email']){
    $email=$_POST['email'];
}
$data='';
$foison=\Monkey::app()->repoFactory->create('Foison')->findOneBy(['email'=>$email]);
if($foison!=null){

    $data='Ciao '. $foison->name.'-no-no';
}else{
    $data='Attenzione Email utente non Riconosciuta-no-no';
}


echo json_encode($data);


