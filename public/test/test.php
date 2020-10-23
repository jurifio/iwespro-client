<?php
ini_set("memory_limit", "2000M");
ini_set('max_execution_time', 0);
$ttime = microtime(true);
$time = microtime(true);
require '../../iwesStatic.php';
var_dump('Applicazione  \t\t\t\t' . (microtime(true) - $time));

$monkey = \Monkey::app();
$time = microtime(true);
$monkey->dbAdapter;
var_dump("dbAdapter \t\t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->cacheService;
var_dump("cacheService \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->sessionManager;
var_dump("sessionManager \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->authManager;
var_dump("authManager \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->entityManagerFactory;
var_dump("entityManagerFactory \t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->repoFactory;
var_dump("repoFactory \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->eventManager;
var_dump("eventManager \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
if (ENV == 'dev') {
    $ftp_server = 'ftp.iwes.pro';
    $pathlocal = '/media/sf_sites/iwespro/temp-remaster/';
    $save_to = '/home/iwespro/public_html/imgTransfer';
    $save_to_dir = '/media/sf_sites/iwespro/temp-remaster';
    $path = '/public_html/imgTransfer/';
    $remotepathTodo = 'shootImport/newage2/topublish_dev/';
    $remotepathOriginal = '/shootImport/newage2/original_dev/';
    $remotepathToRename = '/shootImport/newage2/torename_dev/';

} else {
    $ftp_server = 'ftp.iwes.pro';
    $pathlocal = '/home/iwespro/public_html/temp-remaster/';
    $save_to = '/home/iwespro/public_html/temp-remaster/';
    $save_to_dir = '/home/iwespro/public_html/temp-remaster';
    $path = '/public_html/imgTransfer/';
    $remotepathTodo = 'shootImport/newage2/topublish/';
    $remotepathOriginal = '/shootImport/newage2/original/';
    $remotepathToRename = '/shootImport/newage2/torename/';
}
$ftp_server_port = "21";
$ftp_user_name = 'iwespro';
$ftp_user_pass = "Cartne01!";
$shops = \Monkey::app()->repoFactory->create('Shop')->findAll();

// setto la connessione al ftp
$conn_id = ftp_connect($ftp_server,$ftp_server_port);
// Eseguo il login con  username e password
$login_result = ftp_login($conn_id,$ftp_user_name,$ftp_user_pass);

// check connessione e risultato del login
if ((!$conn_id) || (!$login_result)) {
    echo "Fail</br>";
} else {
    echo "Success</br>";
    // enabling passive mode
    ftp_pasv($conn_id,false);
    // prendo il contenuto di tutta la directory sul server
    $buff = ftp_rawlist($conn_id, '/');

// close the connection
    ftp_close($conn_id);

// output the buffer
    // output $contents
    $response = [];
    $response ['data'] = [];
    $i = 1;
    $shopName = '';
    foreach ($buff as $item) {
        $item = trim($item,'/');
        $item = '/' . $item;
        if ($item === '/') {

            return true;

        }
        $result = in_array($item, ftp_nlist($conn_id, dirname($item)));
        if ($result == true) {
            $pathArr = explode(DIRECTORY_SEPARATOR,$item);
            $filenametoextrat = end($pathArr);
            foreach ($shops as $shop) {
                $shopToFind = 'shop_' . $shop->id . '_';
                if (strpos($filenametoextrat,$shopToFind) !== false) {
                    $shopName = $shop->name;
                    break;
                }
            }
        }


        $row = [];
        $row["DT_RowId"] = 'row__' . $i;
        $row["id"] = $i;
        $row['file'] = '<i class="fa fa-file-archive-o" aria-hidden="true"></i> '. $filenametoextrat;
        $row['shopName']=$shopName;
        $response['data'][] = $row;
    }
}

return json_encode($response);