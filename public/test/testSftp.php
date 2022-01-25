<?php

use bamboo\core\exceptions\BambooException;
use bamboo\core\utils\sftp\sftpClient;

require '../../iwesStatic.php';

try {
    $sftp = new sftpClient("localhost", 22);
    $sftp->login("osboxes", "osboxes.org");
  //  $sftp->uploadFile("/tmp/to_be_sent", "/Users/username/Sites/file.txt");

}
catch (Exception $e) {
    echo $e->getMessage() . "\n";
}

?>