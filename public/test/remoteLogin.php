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

require '../../iwesStatic.php';
$userEmail=$_GET['email'];
$password=$_GET['password'];


\Monkey::app()->authManager->auth();
    $user=\Monkey::app()->repoFactory->create('User')->findOneBy(['email'=>$userEmail,'password'=>$password]);
    if ($user) {
            $userSession = \Monkey::app()->dbAdapter->select('UserSession', array('sid' => $this->session->getSid()))->fetch();
        if ($userSession['sid'] === \Monkey::app()->session->getSid()) {
            if ($userSession['expire'] > time()) {
                \Monkey::app()->session->invalidateSession();
            }
            $this->app->dbAdapter->update('UserSession', array('request' => ($userSession['request'] + 1), 'expire' => date("Y-m-d H:i:s", $this->session->expiration())), array('sid' => $this->session->getSid()));
        } else {
            $this->app->dbAdapter->insert('UserSession', array('sid' => $this->session->getSid(),'userId'=>$user->id, 'expire' => date("Y-m-d H:i:s", $this->session->expiration()), 'ip' => $this->app->router->request()->getClientIp()));
        }
        $userSession = \Monkey::app()->repoFactory->create('UserSession')->findOneBy(['sid' => $this->session->getSid()]);

        \Monkey::app()->session->setUserSession($userSession);
        \Monkey::app()->session->setSession($this->session);
    }

if( \Monkey::app()->session->getUser()->getId() != 0 ) {
    if ($this->checkPermission($this->app,'/admin/dashboard')) {
        $this->response->setBody("uh-uh, you can't come here you rascal");
        $this->response->raiseUnauthorizedAccess($this->app->baseUrl(false));
        $this->response->sendHeaders();
        return;
    } else {
        $this->app->router->response()->autoRedirectTo($this->app->baseUrl(false).'/blueseal/dashboard');
        return;
    }
}
$this->app->setLang(new CLang(1,'it'));
$this->page = new CBlueSealPage('login',$this->app);





