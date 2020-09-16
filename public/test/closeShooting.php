<?php
require '../../iwesStatic.php';
$shootingBookingRepo=\Monkey::app()->repoFactory->create('ShootingBooking');


if($_POST['shootingId']){
    $shootingId=$_POST['shootingId'];
}
try {
    $booking = \Monkey::app()->repoFactory->create('ShootingBooking')->findOneBy(['shootingId' => $shootingId]);

    $booking->status = 'c';
    $booking->update();
    $result='1';
}catch(\Throwable $e){
    $result='2';
}
echo json_encode($result);


