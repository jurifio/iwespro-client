<?php

use bamboo\core\exceptions\BambooException;
use bamboo\core\utils\cpanel\createCPanelAccount;

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
}

catch (Exception $e) {
    echo $e->getMessage() . "\n";
}

?>