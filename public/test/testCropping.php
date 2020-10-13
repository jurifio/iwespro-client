<?php



require '../../iwesStatic.php';
//load the image
$img = imagecreatefromjpeg("/media/sf_sites/iwespro/temp/188815-6207155__what-for-wf166-black__210000234236-0003.jpg");

//find the size of the borders
$b_top = 0;
$b_btm = 0;
$b_lft = 0;
$b_rt = 0;

//top
for(; $b_top < imagesy($img); ++$b_top) {
    for($x = 0; $x < imagesx($img); ++$x) {
        if(imagecolorat($img, $x, $b_top) != 0xFFFFFF) {
            break 2; //out of the 'top' loop
        }
    }
}

//bottom
for(; $b_btm < imagesy($img); ++$b_btm) {
    for($x = 0; $x < imagesx($img); ++$x) {
        if(imagecolorat($img, $x, imagesy($img) - $b_btm-1) != 0xFFFFFF) {
            break 2; //out of the 'bottom' loop
        }
    }
}

//left
for(; $b_lft < imagesx($img); ++$b_lft) {
    for($y = 0; $y < imagesy($img); ++$y) {
        if(imagecolorat($img, $b_lft, $y) != 0xFFFFFF) {
            break 2; //out of the 'left' loop
        }
    }
}

//right
for(; $b_rt < imagesx($img); ++$b_rt) {
    for($y = 0; $y < imagesy($img); ++$y) {
        if(imagecolorat($img, imagesx($img) - $b_rt-1, $y) != 0xFFFFFF) {
            break 2; //out of the 'right' loop
        }
    }
}

//copy the contents, excluding the border
$newimg = imagecreatetruecolor(
    imagesx($img)-($b_lft+$b_rt), imagesy($img)-($b_top+$b_btm));

//copy the contents, excluding the border
$targetImage = imagecreatetruecolor( imagesx($img)-($b_lft+$b_rt), imagesy($img)-($b_top+$b_btm));
$width=imagesx($img)-($b_lft+$b_rt);
$height=imagesy($img)-($b_top+$b_btm);
imagecopy($targetImage, $img, 0, 0, $b_lft, $b_top, imagesx($targetImage), imagesy($targetImage));
if($height>($width+($height/100*21.5))){
     $type='v';
}else{
    $type='o';
}




    if($type=='v'){
        $newwidth=(1300*$width)/$height;
        $finalImage=imagecreatetruecolor( $newwidth, 1300);
        imagecopyresized($finalImage,$targetImage,0,0,0,0,$newwidth,1300,imagesx($targetImage), imagesy($targetImage));
        $destination1 = imagecreatetruecolor(1125, 1500);
        $dest_y=1500-1300-122;
        $dest_x=1125-$newwidth-20;



        $color = imagecolorallocate($finalImage, 255, 255, 255);
// fill entire image
        imagefill($destination1, 0, 0, $color);
        imagecopyresized($destination1, $finalImage, 0,0,0, 0,1125, 1500, imagesx($finalImage), imagesy($finalImage));


//finally, output the image
        header("Content-Type: image/jpeg");
        imagejpeg($destination1);


    }else{
        $newheight=(1025*$height)/$width;
        $finalImage=imagecreatetruecolor( 1025, $newheight);
        imagecopyresized($finalImage,$targetImage,0,0,0,0,1025,$newheight,imagesx($targetImage), imagesy($targetImage));
        $destination1 = imagecreatetruecolor(1125, 1500);
        $dest_y=1500-$newheight-122;
        $dest_x=1125-1025-20;



        $color = imagecolorallocate($finalImage, 255, 255, 255);
// fill entire image
        imagefill($destination1, 0, 0, $color);
        imagecopyresized($destination1, $finalImage, 0,0,0, 0,1125, 1500, imagesx($finalImage), imagesy($finalImage));


//finally, output the image
        header("Content-Type: image/jpeg");
        imagejpeg($destination1);
    }
/*header("Content-Type: image/jpeg");
imagejpeg($targetImage);
$destination1 = imagecreatetruecolor(1125, 1500);

$dst_x=(1125-imagesx($targetImage))/2;
$dst_y=(1500-imagesy($targetImage))/2;


$color = imagecolorallocate($targetImage, 255, 255, 255);
// fill entire image
imagefill($destination1, 0, 0, $color);
imagecopyresized($destination1, $targetImage, $dst_x, $dst_y, 0, 0,$width, $height, imagesx($targetImage), imagesy($targetImage));


//finally, output the image
header("Content-Type: image/jpeg");
imagejpeg($destination1);


//dimensione foto a

