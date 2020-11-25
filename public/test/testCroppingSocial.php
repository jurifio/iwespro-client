<?php


require '../../iwesStatic.php';
//load the image
//$img = imagecreatefromjpeg("/media/sf_sites/iwespro/temp/163171-5450668__doria-maria - ma - antracite_011.jpg");
$image = new Imagick("/media/sf_sites/iwespro/temp/163171-5450668__doria-maria - ma - antracite_011.jpg");
$firstPixel = imagecolorat($image,0,0);
$colors = imagecolorsforindex($image,$firstPixel);
$imagesx=imagesx($image)
//detect different color y
$red = $colors['red'];
$green = $colors['green'];
$blue = $colors['blue'];
$alpha = $colors['alpha'];
$xl = 0;
$y = 0;
for ($xl = 0; $xl < 1125; $xl++) {
    $analPixel = imagecolorat($image,$x,0);
    $analColors = imagecolorsforindex($image,$analPixel);
    $analRed = $analColors['red'];
    $analGreen = $analColors['green'];
    $analBlue = $analColors['blue'];
    $analAlpha = $analColors['alpha'];
    $analTotal($red - $analRed) + ($green - $analGreen) + ($blu - $analBlue) / 3;
    if ($analTotal > 20) {
        break;
    }
}

header("Content-Type: image/" . $image->getImageFormat());
echo $image;