<?php



require '../../iwesStatic.php';
//load the image
$img = imagecreatefromjpeg("/media/sf_sites/iwespro/temp/188514-6174969__cartechini-collections-840022-preto-0002.jpg");

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
        $targetImage = imagecreatetruecolor( imagesx($img)-($b_lft+$b_rt), imagesy($img)-($b_top+$b_btm));
        $width=imagesx($img)-($b_lft+$b_rt);
        $height=imagesy($img)-($b_top+$b_btm);

        imagecopy($targetImage, $img, 0, 0, $b_lft, $b_top, imagesx($targetImage), imagesy($targetImage));
        /*header("Content-Type: image/jpeg");
        imagejpeg($targetImage);*/
        $ratioHeight=$height/1300;
        $newHeight=$height/$ratioHeight;
        $newWidth=$width/$ratioHeight;
        $newImage=imagescale($targetImage,$newWidth,$newHeight);


        $destination1 = imagecreatetruecolor(1125, 1500);
        /*
        $dst_x=(1125-imagesx($targetImage))/2;
        $dst_y=1500-imagesy($targetImage)-173;*/
        $dst_x=(1125-$newWidth)/2;
        $dst_y=(1500-$newHeight)-130;

        $color = imagecolorallocate($targetImage, 255, 255, 255);
// fill entire image
        imagefill($destination1, 0, 0, $color);
        imagecopy($destination1, $newImage, $dst_x, $dst_y, 0, 0,$newWidth, $newHeight);
        header("Content-Type: image/jpeg");
        imagejpeg($destination1);


    }else{
        $ratio=imagesx($targetImage)/1025;

        $newheight=imagesy($targetImage)*$ratio;

        $finalImage=imagecreatetruecolor( 1025, $newheight);
        imagecopyresized($finalImage,$targetImage,0,0,0,0,1025,$newheight,imagesx($targetImage), imagesy($targetImage));
        $destination1 = imagecreatetruecolor(1125, 1500);
        $dest_y=1500-$newheight-122;
        $dest_x=1125-imagesx($finalImage)-20;



        $color = imagecolorallocate($finalImage, 255, 255, 255);
// fill entire image
        imagefill($destination1, 0, 0, $color);
        imagecopyresized($destination1, $finalImage, $dest_x,$dest_y,0, 0,imagesx($finalImage), $newheight, imagesx($finalImage), $newheight);


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

