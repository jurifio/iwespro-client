<?php

use bamboo\core\exceptions\BambooException;
use bamboo\core\utils\cpanel\createCPanelAccount;
use bamboo\core\utils\sftp\sftpClient;

require '../../iwesStatic.php';

try {
    if(ENV =='dev') {

        $shop=\Monkey::app()->repoFactory->create('Shop')->findOneBy(['id'=>1]);
        $root='/media/sf_sites/'.$shop->remotePath;
        $prefix='dev';
    }else{

        $shop=\Monkey::app()->repoFactory->create('Shop')->findOneBy(['id'=>1]);
        $root='/home/'.$shop->remotePath.'/public_html';
        $prefix='prod';
    }
    $localFile='setup.json';
    if(ENV=='dev') {
        $myfile = fopen("/media/sf_sites/iwespro/temp/" . $localFile,"w");
        $nameLocalFile="/media/sf_sites/iwespro/temp/" . $localFile;
    }else{
        $myfile = fopen("/home/iwespro/public_html/temp/" . $localFile,"w");
        $nameLocalFile="/home/iwespro/public_html/temp/" . $localFile;
    }
    $json=json_encode($shop);
    /* $json="<?php
     $data = system('unzip -d ".$root." /home/shared/setup/setupMonkey.zip);   ?>';";*/
    fwrite($myfile, $json);

    fclose($myfile);
    $extract=json_decode(file_get_contents($nameLocalFile),false);
    echo $extract->urlSite;
    $indexFile='index.php';
    if(ENV=='dev') {
        $myIndexfile = fopen("/media/sf_sites/iwespro/temp/" . $indexFile,"w");
        $nameIndexFile="/media/sf_sites/iwespro/temp/" . $indexFile;
    }else{
        $myIndexfile = fopen("/home/iwespro/public_html/temp/" . $indexFile,"w");
        $nameIndexFile="/home/iwespro/public_html/temp/" . $indexFile;
    }
    $codesetup="<?php
        mkdir('/home/demo2iwes/public_html/tempInstall', 0777,true);
copy('/home/shared/setup/preinstall.zip','/home/demo2iwes/public_html/preinstall.zip');
\$zip = new ZipArchive;
if (\$zip->open('preinstall.zip') === TRUE) {
    \$zip->extractTo('/home/demo2iwes/public_html/');
    \$zip->close();
    echo 'ok';
} else {
    echo 'failed';
}
?>
<a href='/setup/dist/index.php'>installa</a>";
    fwrite($myIndexfile, $codesetup);

    fclose($myIndexfile);



}

catch (Exception $e) {
    echo $e->getMessage() . "\n";
}

?>