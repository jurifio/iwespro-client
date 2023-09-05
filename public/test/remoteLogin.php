<?php

use bamboo\blueseal\business\CBlueSealPage;
use bamboo\core\base\CCookie;
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
//\Monkey::app()->authManager->auth();


$user=\Monkey::app()->repoFactory->create('User')->findOneBy(['email'=>$userEmail]);
if ($user) {
    $userSession = \Monkey::app()->dbAdapter->select('UserSession', array('sid' => $session))->fetch();
    if ($userSession['sid'] === $session) {
        date("Y-m-d H:i:s", \Monkey::app()->getSession()->expiration());
        if ($userSession['expire'] > time()) {
            \Monkey::app()->sessionManager->invalidateSession();
        }
        \Monkey::app()->dbAdapter->update('UserSession', array('userId'=>$user->id, 'expire' => date("Y-m-d H:i:s", Monkey::app()->getSession()->expiration())), array('sid' => $session));
    } else {
        \Monkey::app()->dbAdapter->insert('UserSession', array('sid' => $session,'userId'=>$user->id, 'expire' => date("Y-m-d H:i:s", Monkey::app()->getSession()->expiration())));
    }

    $userSession = \Monkey::app()->repoFactory->create('UserSession')->findOneBy(['sid' => $session]);

    \Monkey::app()->getSession()->setUserSession($userSession);
    $newSession=\Monkey::app()->getSession();
    \Monkey::app()->setSession($newSession);

    $value = $user->username.':'.$password;
    $value = base64_encode($user->username).":".base64_encode(".dev.iwes.pro").':'.base64_encode($userSession->expire).':'.base64_encode("/").':'.base64_encode((string)"true");


    //$value="17370:f8525c01aff7c6c4120b0394b338ae83de43aeec5fd0122d88f843b2f07aca2085ea4e8139ede09857a4f00fdaf1d21b1959105887664136bf9d57ce7826f7ea:756c53912af1ca42279d61a19dffc71fdacc6b084c28f29a6124b8de86e19c7b:ZGV2Lml3ZXMucHJv:MTY3ODgyMTczMQ==:Lw==:MQ==:MQ==";

}
$hasPermission=false;

//https://dev.iwes.pro/test/remoteLogin.php?email=jurif@hotmail.com&password=$2y$10$1vsXNObIwJNkuhzo0jpUeOmmiVtnayAl8aa5Wdb.xsQG5WeX9xnY6
//setcookie("auth", $value, time()+3600*24*3, "/", ".dev.iwes.pro", true);


//https://dev.iwes.pro/test/remoteLogin.php?email=jurif@hotmail.com&password=$2y$10$1vsXNObIwJNkuhzo0jpUeOmmiVtnayAl8aa5Wdb.xsQG5WeX9xnY6
//\Monkey::app()->authManager->deleteAuthTokensForUser($user->id);
$cookieData=$user->id.":".\Monkey::app()->authManager->persistAuthToken($user->id, \Monkey::app()->authManager->getToken()->getToken());

//$cookieData = $user->id . ':' .\Monkey::app()->authManager->getToken()->getToken();
$cookieData = $user->id.":";
$mac='';
$mac = hash_hmac('sha256', $cookieData, Monkey::app()->authManager->getSecret());
$cookieData .= ':' . $mac;
$secureCookie = true ;
$test=\Monkey::app()->router->request()->getHttp('host');
\Monkey::app()->authManager->prepareAuthCookie($test, time() + (60 * 60 * 24 * 365), '/', $secureCookie, true);
if (empty(Monkey::app()->router->request()->getRequestData('remember'))) {
    //$this->cookie->setExpire(0);
}
$jwtCookie = new CCookie('auth', \Monkey::app());
$jwtCookie->prepare($test, time() + (60 * 60 * 24 * 365), '/', $secureCookie, true);
$jwtCookie->set('auth', $cookieData);
//setcookie('auth', $cookieData , time() + (60 * 60 * 24 * 3), '/', 'dev.iwes.pro', $secureCookie, true);
$userNew=Monkey::app()->authManager->login(['id' => $user->id]);
Monkey::app()->setUser($userNew);


Monkey::app()->authManager->auth();
if( \Monkey::app()->getUser()->getId() != 0 ) {
    if (checkPermission(\Monkey::app(),'/admin/dashboard')) {
        $this->response->setBody("uh-uh, you can't come here you rascal");
        $this->response->raiseUnauthorizedAccess($this->app->baseUrl(false));
        $this->response->sendHeaders();
        return;
    } else {
        Monkey::app()->router->response()->autoRedirectTo(Monkey::app()->baseUrl(false).'/blueseal/dashboard');
        return;
    }
}
Monkey::app()->setLang(new CLang(1,'it'));
$page = new CBlueSealPage('login',Monkey::app());
return \Monkey::app()->router->response()->autoRedirectTo(\Monkey::app()->baseUrl(false).'/blueseal/dashboard');


function checkPermission($permissionPath,string $string){
    $hasPermission = true;
    try{
        $id = \Monkey::app()->rbacManager->perms()->pathId($permissionPath);
        if(\Monkey::app()->getUser()->hasPermission($id)) $hasPermission = true;
    }catch (\Throwable $e){

    }
    return $hasPermission;
}





