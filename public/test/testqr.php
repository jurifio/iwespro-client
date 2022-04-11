<?php

use bamboo\core\exceptions\BambooException;

use Zxing\QrReader;
require '../../iwesStatic.php';
$postImage=$_POST['saveFilePic'];
$image_parts = explode(";base64,", $_POST['saveFilePic']);
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];
$image_base64 = base64_decode($image_parts[1]);
$tempFolder = \Monkey::app()->rootPath().\Monkey::app()->cfg()->fetch('paths', 'tempFolder').'-blog/';
$file = $tempFolder.'phototest.png';
file_put_contents($file, $image_base64);


\Monkey::app()->vendorLibraries->load('qrreader');
$image = "ReactNative.png";

$qrcode = new QrReader($file);
$text = $qrcode->text();
echo $text;
?>








