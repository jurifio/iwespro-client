<?php
ini_set("display_errors",1);
error_reporting(~0);

require "../../BlueSeal.php";


$ninetyNineMonkey = new BlueSeal('BlueSeal','pickyshop','/data/www/redpanda');
$ninetyNineMonkey->enableDebugging();
$ninetyNineMonkey->setDefaultLanguage('it');


$root = 1;
/**
 * @var bamboo\core\auth\rbac\CRbacManager $rbac
 */
$rbac = $ninetyNineMonkey->rbacManager;
$ninetyNineMonkey->repoFactory->beginTransaction();
$root = $rbac->addPermission('root','root');
$admin = $rbac->addPermission('admin','can anything everywhere',$root);
	$blueseal = $rbac->addPermission('blueseal','can log into backoffice',$admin);
    $dashboard = $rbac->addPermission('dashboard','can see the dashboard',$admin);
    $products = $rbac->addPermission('product','can see all product related issues',$admin);
        $product0 = $rbac->addPermission('list','productList Page',$products);
        $product1 = $rbac->addPermission('add','can read the aztec code',$products);
        $product2 = $rbac->addPermission('edit','can enter the detail page',$products);
        $product3 = $rbac->addPermission('mag','can see the sku page',$products);
        $product4 = $rbac->addPermission('publish','can publish products',$products);
        $product5 = $rbac->addPermission('delete','can delete the product',$products);
    $orders = $rbac->addPermission('order','can see all brand related issues',$admin);
        $order0 = $rbac->addPermission('list','orderList Page',$orders);
        $order1 = $rbac->addPermission('add','can see an order user',$orders);
        $order2 = $rbac->addPermission('edit','can see an order and manage it',$orders);
		$friendconfirm = $rbac->addPermission('friend-confirm',"Friend orderline confirmation", $orders);
    $marketing = $rbac->addPermission('marketing', 'can manage marketing', $admin);
    $tech = $rbac->addPermission('tech', 'can manage cms settings',$admin);
    $economics = $rbac->addPermission('economics','can see economic data',$admin);
        $eproduct = $rbac->addPermission('product','can see economic product',$economics);
        $eorder = $rbac->addPermission('order','can see economic order',$economics);
        $eshipment = $rbac->addPermission('shipment','can see economic shipment',$economics);
        $euser = $rbac->addPermission('user','can see economic user',$economics);
    $shipment = $rbac->addPermission('shipment','can manage shippings',$admin);
    $content = $rbac->addPermission('content','can manage contents',$admin);
        $content0 = $rbac->addPermission('list','can see content',$content);
        $content1 = $rbac->addPermission('add','can see content',$content);
        $content2 = $rbac->addPermission('edit','can see content',$content);
        $content3 = $rbac->addPermission('delete','can see content',$content);
        $content4 = $rbac->addPermission('publish','can see content',$content);
    $user = $rbac->addPermission('user','can manage users',$admin);
        $user0 = $rbac->addPermission('list','can see user',$user);
        $user1 = $rbac->addPermission('add','can see user',$user);
        $user2 = $rbac->addPermission('edit','can see user',$user);
        $user3 = $rbac->addPermission('ban','can see user',$user);
        $user4 = $rbac->addPermission('role','can see user',$user);

$rootr = 1;
$rootr = $rbac->addRole('root','root');
$sar = $rbac->addRole('sa','has every thing', $rootr);
    $ctor = $rbac->addRole('cto','has every thing', $sar);
    $ceor = $rbac->addRole('ceo','has every thing', $sar);
        $managerr = $rbac->addRole('manager','has every thing', $ceor);
            $accountr = $rbac->addRole('account','has every thing', $managerr);
            $supportr = $rbac->addRole('support','has every thing', $managerr);
            $editorr = $rbac->addRole('editor','has every thing', $managerr);
            $warehouser  = $rbac->addRole('warehouse','has every thing', $managerr);
                $warehouse0r  = $rbac->addRole('shipping','has every thing', $warehouser);
                $warehouse1r  = $rbac->addRole('mag','has every thing', $warehouser);
            $contentr = $rbac->addRole('content','can insert content',$managerr);
        $epperò = $rbac->addRole('epperoManager','',$ceor);
            $epperò2 = $rbac->addRole('epperoEmployee','',$epperò);
        $gioielliere = $rbac->addRole('cartechiniGioielleria','',$ceor);
		$dellamartira = $rbac->addRole('dellamartira','',$ceor);
	/**  new Roles */
	$friendCeo = $rbac->addRole('friendCeo','can see his shop',$sar);
		$friendCeo = $rbac->addRole('friendWarehouse','can see his shop quantity',$friendCeo);

$rbac->assignPermToRole($dellamartira,$friendconfirm);
$rbac->assignPermToRole($epperò2,$friendconfirm);
$rbac->assignPermToRole($gioielliere,$friendconfirm);

$rbac->assignPermToRole($contentr,$content);

$rbac->assignPermToRole($warehouse0r,$shipment);

$rbac->assignPermToRole($warehouse1r,$product3);
$rbac->assignPermToRole($warehouse1r,$product0);

$rbac->assignPermToRole($warehouser,$eproduct);

$rbac->assignPermToRole($editorr,$product0);
$rbac->assignPermToRole($editorr,$product1);
$rbac->assignPermToRole($editorr,$product2);
$rbac->assignPermToRole($editorr,$product5);

$rbac->assignPermToRole($supportr,$orders);
$rbac->assignPermToRole($supportr,$product0);
$rbac->assignPermToRole($supportr,$shipment);
$rbac->assignPermToRole($supportr,$euser);
$rbac->assignPermToRole($supportr,$user0);
$rbac->assignPermToRole($supportr,$user1);
$rbac->assignPermToRole($supportr,$user2);
$rbac->assignPermToRole($supportr,$user3);

$rbac->assignPermToRole($accountr,$economics);
$rbac->assignPermToRole($accountr,$marketing);

$rbac->assignPermToRole($managerr,$products);
$rbac->assignPermToRole($managerr,$orders);
$rbac->assignPermToRole($managerr,$marketing);
$rbac->assignPermToRole($managerr,$user);
$rbac->assignPermToRole($managerr,$economics);
$rbac->assignPermToRole($managerr,$shipment);
$rbac->assignPermToRole($managerr,$content);

$rbac->assignPermToRole($ctor,$products);
$rbac->assignPermToRole($ctor,$orders);
$rbac->assignPermToRole($ctor,$marketing);
$rbac->assignPermToRole($ctor,$user);
$rbac->assignPermToRole($ctor,$economics);
$rbac->assignPermToRole($ctor,$shipment);
$rbac->assignPermToRole($ctor,$content);
$rbac->assignPermToRole($ctor,$tech);


$rbac->assignPermToRole($epperò2,$product0);
$rbac->assignPermToRole($epperò2,$product3);
$rbac->assignPermToRole($epperò,$product2);

$rbac->assignPermToRole($gioielliere,$product0);
$rbac->assignPermToRole($gioielliere,$product3);


$rbac->assignPermToRole($sar,$dashboard);
$rbac->assignPermToRole($ctor,$dashboard);
$rbac->assignPermToRole($ceor,$dashboard);
$rbac->assignPermToRole($managerr,$dashboard);
$rbac->assignPermToRole($accountr,$dashboard);
$rbac->assignPermToRole($supportr,$dashboard);
$rbac->assignPermToRole($editorr,$dashboard);
$rbac->assignPermToRole($warehouser,$dashboard);
$rbac->assignPermToRole($warehouse0r,$dashboard);
$rbac->assignPermToRole($warehouse1r,$dashboard);
$rbac->assignPermToRole($contentr,$dashboard);
$rbac->assignPermToRole($epperò2,$dashboard);
$rbac->assignPermToRole($gioielliere,$dashboard);

$usersIn = [10948,
10949,
10952,
10953,
10954,
10955,
10959,
10962,
10963];

foreach($usersIn as $user){
    $rbac->assignRoleToUser($managerr,$user);
}


$rbac->assignRoleToUser($gioielliere,11022);
$rbac->assignRoleToUser($gioielliere,11006);

$rbac->assignRoleToUser($epperò,10964);

$rbac->assignRoleToUser($sar , 11018);
$rbac->assignRoleToUser($sar,2);

echo 'committo';

$ninetyNineMonkey->repoFactory->commit();
