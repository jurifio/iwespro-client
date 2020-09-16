<?php
require '../../iwesStatic.php';
$shootingBookingRepo=\Monkey::app()->repoFactory->create('ShootingBooking');
$shootingRepo=\Monkey::app()->repoFactory->create('Shooting');
$shootingDocumentRepo=\Monkey::app()->repoFactory->create('Document');
$userRepo=\Monkey::app()->repoFactory->create('User');

if($_GET['email']){
    $email=$_GET['email'];
}
if($_GET['Calzature']){
    $Calzature=$_GET['Calzature'];
}else{
    $Calzature=0;
}
if($_GET['Borse']){
    $Borse=$_GET['Borse'];
}else{
    $Borse=0;
}
if($_GET['Accessori']){
    $Accessori=$_GET['Accessori'];
}else{
    $Accessori=0;
}
if($_GET['AbbD']){
    $AbbD=$_GET['AbbD'];
}else{
    $AbbD=0;
}
if($_GET['AbbU']){
    $AbbU=$_GET['AbbU'];
}else{
    $AbbU=0;
}
if($_GET['AbbB2']){
    $AbbB2=$_GET['AbbB2'];
}else{
    $AbbB2=0;
}
if($_GET['AbbB']){
    $AbbB=$_GET['AbbB'];
}else{
    $AbbB=0;
}
if($_GET['CurvD']){
    $CurvD=$_GET['CurvD'];
}else{
    $CurvD=0;
}
if($_GET['CurvU']){
    $CurvU=$_GET['CurvU'];
}else{
    $CurvU=0;
}
$resultDocument=\Monkey::app()->dbAdapter->query('select max(id)+1 as newId,  concat("sa",max(id)+1) as lastId from Document',[])->fetchAll();
foreach($resultDocument as $res) {
    $numberDocument=$res['lastId'];
    $lastId=$res['newId'];
}
$currentYear=(new DateTime())->format('Y');
$totPieces=$Calzature+$Borse+$Accessori+$AbbD+$AbbU+$AbbB+$AbbB2+$CurvD+$CurvU;
$user=$userRepo->findOneBy(['email'=>$email]);
$resShop=\Monkey::app()->dbAdapter->query('select shopId as shopId from UserHasShop where userId='.$user->id,[])->fetchAll();
foreach($resShop as $shopResult) {
    $shopId=$shopResult['shopId'];
}


$shop=\Monkey::app()->repoFactory->create('Shop')->findOneBy(['id'=>$shopId]);
$document=$shootingDocumentRepo->getEmptyEntity();
$document->userId=$user->id;
$document->shopRecipientId=$shop->billingAddressBookId;
$document->number=$numberDocument;
$document->invoiceTypeId=11;
$document->paymentDate='0000-00-00 00:00:00';
$document->paydAmount='0.00';
$document->totalWithVat=0;
$document->year=$currentYear;
$document->insert();




$dateNow=(new DateTime())->format('Y-m-d H:i:s');
$shooting=$shootingRepo->getEmptyEntity();
$shooting->date=$dateNow;
$shooting->friendDdt=$lastId;
$shooting->note='DDT Inserito da App';
$shooting->year=$currentYear;
$shooting->pieces=$totPieces;
$shooting->insert();
$resShooting=\Monkey::app()->dbAdapter->query('select max(id) as lastShootingId from Shooting',[])->fetchAll();
foreach($resShooting as $resu) {
    $resShooting=$resu['lastShootingId'];
}


$shootingBooking=$shootingBookingRepo->getEmptyEntity();

$shootingBooking->date=$dateNow;
$shootingBooking->bookingDate=$dateNow;
$shootingBooking->status='a';
$shootingBooking->shopId=$shopId;
$shootingBooking->shootingId=$resShooting;
$shootingBooking->lastSelection=$dateNow;
$shootingBooking->lastSelection=$dateNow;
$shootingBooking->insert();
echo json_encode($resShooting);


