<?php
//DELETE USER
require "../../iwesStatic.php";

$userRepo = $ninetyNineMonkey->repoFactory->create('User');
$id = [];
foreach ($id as $i) {
    try {
        $res = $userRepo->deleteUserTotalCascade($i,true);
        var_dump('fatto ' . $i);
        var_dump($res);
    } catch (Exception $e) {
        var_dump('fail' . $i);
        var_dump($e);
    }
}