<?php

require '../../iwesStatic.php';




    $db_host = '5.189.159.187';
    $db_name = 'pickyshopfront';
    $db_user = 'pickyshop4';
    $db_pass = 'rrtYvg6W!';

try {

    $db_con = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
    $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $res = ' connessione ok <br>';
} catch (PDOException $e) {
    $res = $e->getMessage();
}

$stmtDirtyPhoto = $db_con->prepare("select concat(dp.productId,'-',dp.productVariantId,'__',dp.brand,'-',dp.var,'-00',df.position,'.jpg') as nameFile,
        df.url as url
         From DirtyProduct dp join DirtyPhoto df on dp.id=df.dirtyProductId and dp.shopId=61 and dp.dirtyStatus='K' order by dp.productId,dp.productVariantId");
$stmtDirtyPhoto->execute();
while($rowStmtDirtyPhoto=$stmtDirtyPhoto->fetch(PDO::FETCH_ASSOC)){
//Download the file using file_get_contents.
    $downloadedFileContents = file_get_contents( str_replace(' ','%20',$rowStmtDirtyPhoto['url']));

//Check to see if file_get_contents failed.
    if($downloadedFileContents === false){
       echo'Failed to download file at: ' . $url;
    }
    if(ENV=='dev') {
        $path = '/media/sf_sites/iwespro/temp/';
    }else{
        $path = '/home/iwespro/public_html/temp/';
    }
//The path and filename that you want to save the file to.
    $fileName = $rowStmtDirtyPhoto['nameFile'];


//Save the data using file_put_contents.
    $save = file_put_contents($path.$fileName, $downloadedFileContents);

//Check to see if it failed to save or not.
    if($save === false){
        echo'Failed to save file to: ' , $fileName;
    }

};

