<?php



require '../../iwesStatic.php';
//load the image
$img = imagecreatefromjpeg("/media/sf_sites/iwespro/temp/188892-6207842-1_S004_013.jpg");
$width=imagesx($img);
$height=imagesy($img);
if($width>$height){
    $type='o';
}else{
    $type='v';
}
if($type=='v'){


    //imagecopy($targetImage, $img, 0, 0, $b_lft, $b_top, imagesx($targetImage), imagesy($targetImage));
    /*header("Content-Type: image/jpeg");
    imagejpeg($targetImage);*/
    $ratioHeight=$height/1500;
    $newHeight=$height/$ratioHeight;
    $newWidth=$width/$ratioHeight;
    $newImage=imagescale($img,$newWidth,$newHeight);


    $destination1 = imagecreatetruecolor(1125, 1500);
    /*
    $dst_x=(1125-imagesx($targetImage))/2;
    $dst_y=1500-imagesy($targetImage)-173;*/
    $dst_x=(1125-$newWidth)/2;
    $dst_y=(1500-$newHeight)/2;


    $color = imagecolorallocate($destination1, 255, 255, 255);
// fill entire image
    imagefill($destination1, 0, 0, $color);
    imagecopy($destination1, $newImage, $dst_x, $dst_y, 0, 0,$newWidth, $newHeight);
    header("Content-Type: image/jpeg");
    imagejpeg($destination1);


}else {

    $ratioWidth=$width/1025;
    $newHeight=$height/$ratioWidth;
    $newWidth=$width/$ratioWidth;
    $newImage=imagescale($img,$newWidth,$newHeight);


    $destination1 = imagecreatetruecolor(1125, 1500);
    /*
    $dst_x=(1125-imagesx($targetImage))/2;
    $dst_y=1500-imagesy($targetImage)-173;*/

    $dst_x=(1125-$newWidth)/2;
    $dst_y=750-($newHeight/2);

    $color = imagecolorallocate($destination1, 255, 255, 255);
// fill entire image
    imagefill($destination1, 0, 0, $color);
    imagecopy($destination1, $newImage, $dst_x, $dst_y, 0, 0,$newWidth, $newHeight);
    header("Content-Type: image/jpeg");
    imagejpeg($destination1);
}