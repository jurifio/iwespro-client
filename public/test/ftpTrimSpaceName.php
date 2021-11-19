<?php

use bamboo\core\base\CFTPClient;

require '../../iwesStatic.php';





$ftpDestDir = '/shootImport/newage2/todo/stylecommerce/';
$ftp_server = 'fiber.office.iwes.it';
$ftp_server_port = "21";
$ftp_user_name = 'admin';
$ftp_user_pass = "geh22fed";

// setto la connessione al ftp
$conn_id = ftp_connect($ftp_server, $ftp_server_port);
// Eseguo il login con  username e password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
if ((!$conn_id) || (!$login_result)) {
    echo "Fail</br>";
} else {
    echo "Success</br>";
    // enabling passive mode
    ftp_pasv($conn_id,true);
    // prendo il contenuto di tutta la directory sul server
    $files = ftp_nlist($conn_id,$ftpDestDir);
    foreach ($files as $file) {
        $oldFileName = $file;
        $newFileName = str_replace(' ','',$oldFileName);

        if (ftp_rename($conn_id,$oldFileNam,$newFileName)) {
            echo 'file ' . $oldFileName . ' rinominato in  ' . $newFileName;
        } else {
            echo 'file ' . $oldFileName . ' non rinominato';
        }

    }
}






