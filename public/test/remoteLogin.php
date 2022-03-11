<?php

use bamboo\blueseal\business\CBlueSealPage;
use bamboo\core\exceptions\BambooException;
use bamboo\core\intl\CLang;
use bamboo\blueseal\business\CBlueSealSidebar;
use bamboo\core\exceptions\RedPandaConfigException;
use bamboo\core\router\ARootController;
use bamboo\core\router\CInternalRequest;
use bamboo\core\router\CRouter;
use bamboo\core\session\CSession;
use bamboo\core\Application;
use bamboo\blueseal\controllers\CBlueSealLoginController;

require '../../iwesStatic.php';
$userEmail=$_GET['email'];
$password=$_GET['password'];
$session=\Monkey::app()->getSession()->getSid();

\Monkey::app()->authManager->auth();
$user=\Monkey::app()->repoFactory->create('User')->findOneBy(['email'=>$userEmail,'password'=>$password]);
if ($user) {
    $userSession = \Monkey::app()->dbAdapter->select('UserSession', array('sid' => \Monkey::app()->getSession()->getSid()))->fetch();
    if ($userSession['sid'] === \Monkey::app()->getSession()->getSid()) {
        date("Y-m-d H:i:s", Monkey::app()->getSession()->expiration());
        if ($userSession['expire'] > time()) {
            \Monkey::app()->sessionManager->invalidateSession();
        }
        \Monkey::app()->dbAdapter->update('UserSession', array('userId'=>$user->id, 'expire' => date("Y-m-d H:i:s", Monkey::app()->getSession()->expiration())), array('sid' => \Monkey::app()->getSession()->getSid()));
    } else {
        \Monkey::app()->dbAdapter->insert('UserSession', array('sid' => \Monkey::app()->getSession()->getSid(),'userId'=>$user->id, 'expire' => date("Y-m-d H:i:s", Monkey::app()->getSession()->expiration())));
    }
    $userSession = \Monkey::app()->repoFactory->create('UserSession')->findOneBy(['sid' => $session]);

    \Monkey::app()->getSession()->setUserSession($userSession);
    \Monkey::app()->setSession(\Monkey::app()->getSession());
}

if( $session != 0 ) {

        return \Monkey::app()->router->response()->autoRedirectTo('/blueseal/importatori/dizionari/brand');

}else{
    return \Monkey::app()->router->response()->autoRedirectTo(\Monkey::app()->baseUrl(false).'/blueseal/');
}






