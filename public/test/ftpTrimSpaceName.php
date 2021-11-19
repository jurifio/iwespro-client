<?php

use bamboo\core\base\CFTPClient;

require '../../iwesStatic.php';




$ftpDestination = new CFTPClient(\Monkey::app(),[
    'host' => 'fiber.office.iwes.it',
    'user' => 'admin',
    'pass' => 'geh22fed',
    'port' => '21',
    'timeout' => '10',
    'mode' => '2'
]);
$ftpDestDir = '/shootImport/newage2/todo2/prova';
$ftpDestination->changeDir($ftpDestDir);
$files=$ftpDestination->nList($ftpDestDir);

foreach ($files as $file) {
$oldFileName=$file;
$newFileName=str_replace(' ','',$oldFileName);

if($ftpDestination->rename($oldFileNam,$newFileName)){
    echo 'file '.$oldFileName. ' rinominato in  '. $newFileName;
}else{
    echo 'file '.$oldFileName. ' non rinominato';
}

}






