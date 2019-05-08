<?php
require "../../iwesStatic.php";

$app = \Monkey::app();
$email = $app->router->request()->getRequestData('email');
$newPass = $app->router->request()->getRequestData('pass');

if (!$newPass || !$email) echo "<strong>email e password sono obbligatori</strong>";
$user = $app->repoFactory->create('User')->findOneBy(['email' => $email]);
if ($user) {
    try {
        $user->password = password_hash($newPass, PASSWORD_BCRYPT);
        $user->update();
        echo "password aggiornata";
    } catch(\bamboo\core\exceptions\BambooException $e) {
        echo $e->getMessage();
    }
} else {
    echo "utente non trovato";
}