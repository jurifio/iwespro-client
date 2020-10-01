<?php
require '../../iwesStatic.php';
$shootingBookingRepo = \Monkey::app()->repoFactory->create('ShootingBooking');
$shootingRepo = \Monkey::app()->repoFactory->create('Shooting');
$shootingDocumentRepo = \Monkey::app()->repoFactory->create('Document');
$userRepo = \Monkey::app()->repoFactory->create('User');

if ($_POST['email']) {
    $email = $_POST['email'];
}
if ($_POST['Calzature']) {
    $Calzature = $_POST['Calzature'];
} else {
    $Calzature = 0;
}
$user = $userRepo->findOneBy(['email' => $email]);
$resShop = \Monkey::app()->dbAdapter->query('select shopId as shopId from UserHasShop where userId=' . $user->id,[])->fetchAll();
foreach ($resShop as $shopResult) {
    $shopId = $shopResult['shopId'];
}
$resultOpenShooting = \Monkey::app()->dbAdapter->query('select max(shootingId)  as lastShootingId from ShootingBooking where shopId=' . $shopId . ' and status=\'a\'',[])->fetchAll();

    foreach ($resultOpenShooting as $resu) {
        $resShooting = $resu['lastShootingId'];
    }
if($resShooting==null){
    $resultDocument = \Monkey::app()->dbAdapter->query('select max(id)+1 as newId,  concat("sa",max(id)+1) as lastId from Document',[])->fetchAll();
    foreach ($resultDocument as $res) {
        $numberDocument = $res['newId'];
        $lastId = $res['lastId'];
    }
    $currentYear = (new DateTime())->format('Y');
    $totPieces = $Calzature;


    $shop = \Monkey::app()->repoFactory->create('Shop')->findOneBy(['id' => $shopId]);

    $document = $shootingDocumentRepo->getEmptyEntity();
    $document->userId = $user->id;
    $document->shopRecipientId = $shop->billingAddressBookId;
    $document->number = $numberDocument;
    $document->invoiceTypeId = 11;
    $document->paymentDate = '0000-00-00 00:00:00';
    $document->paydAmount = '0.00';
    $document->totalWithVat = 0;
    $document->year = $currentYear;
    $document->insert();


    $dateNow = (new DateTime())->format('Y-m-d H:i:s');
    $shooting = $shootingRepo->getEmptyEntity();
    $shooting->date = $dateNow;
    $shooting->friendDdt = $numberDocument;
    $shooting->note = 'DDT Inserito da App';
    $shooting->year = $currentYear;
    $shooting->pieces = $totPieces;
    $shooting->insert();
    $resShooting = \Monkey::app()->dbAdapter->query('select max(id) as lastShootingId from Shooting',[])->fetchAll();
    foreach ($resShooting as $resu) {
        $resShooting = $resu['lastShootingId'];
    }


    $shootingBooking = $shootingBookingRepo->getEmptyEntity();

    $shootingBooking->date = $dateNow;
    $shootingBooking->bookingDate = $dateNow;
    $shootingBooking->status = 'a';
    $shootingBooking->shopId = $shopId;
    $shootingBooking->shootingId = $resShooting;
    $shootingBooking->lastSelection = $dateNow;
    $shootingBooking->lastSelection = $dateNow;
    $shootingBooking->insert();


}

echo json_encode($resShooting);


