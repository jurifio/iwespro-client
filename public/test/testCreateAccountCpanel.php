<?php

use bamboo\core\exceptions\BambooException;
use bamboo\core\utils\cpanel\createCPanelAccount;

require '../../iwesStatic.php';

try {
     $createAccount =   new createCPanelAccount();
     $result=$createAccount->createAccount('testcreate.iwes.it','newtest','Newpass57867?','default','juri@iwes.it','root','F1fiI3EYv9JXl8Z','front.iwes.it');

    header('Location:' .$result);
}
catch (Exception $e) {
    echo $e->getMessage() . "\n";
}

?>