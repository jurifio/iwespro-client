<?php



require '../../iwesStatic.php';
//load the image
$img = imagecreatefromjpeg("/media/sf_sites/iwespro/temp/71201-6207145__what-for - wf012 - black__210000234064_010.jpg");
$x=imagesx($img);
$y=imagesy($img);
$ratioHeight = $y / 1500;
$newHeight = $y / $ratioHeight;
$newWidth = $x / $ratioHeight;
$newImage = imagescale($img,$newWidth,$newHeight);

$rgb = imagecolorat($img, 0, 0);

$colors = imagecolorsforindex($img, $rgb);

var_dump($colors);
$rgb = imagecolorat($img, 0, 0);

$colors = imagecolorsforindex($img, $rgb);

var_dump($colors);

/*
// fill entire image
       /* imagefill($destination1,0,0,$color);
        imagecopy($destination1,$newImage,$dst_x,$dst_y,0,0,$newWidth,$newHeight);*/
      /*  header("Content-Type: image/jpeg");
        imagejpeg($newImage);*/
