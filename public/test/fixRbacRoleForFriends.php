<?php
require "../../iwesStatic.php";
die();
$rbac = $ninetyNineMonkey->rbacManager;
$ninetyNineMonkey->repoFactory->beginTransaction();
$oldRoles = [13,14,15,16,17,18];

$allShops = $rbac->addPermission('allShops','can see all shops of marketplace',2);

$managerr = $rbac->addRole('shopManager','has every thing', 4);
	$accountr = $rbac->addRole('shopAccount','has every thing', $managerr);
	$supportr = $rbac->addRole('shopSupport','has every thing', $managerr);
	$editorr = $rbac->addRole('shopEditor','has every thing', $managerr);
	$warehouser  = $rbac->addRole('shopWarehouse','has every thing', $managerr);
		$warehouse0r  = $rbac->addRole('shopShipping','has every thing', $warehouser);
		$warehouse1r  = $rbac->addRole('shopMag','has every thing', $warehouser);
	$contentr = $rbac->addRole('shopContent','can insert content',$managerr);

$rbac->assignPermToRole($contentr,23);
$rbac->assignPermToRole($contentr,36);
$rbac->assignPermToRole($contentr,3);

$rbac->assignPermToRole($warehouse0r,22);
$rbac->assignPermToRole($warehouse0r,36);
$rbac->assignPermToRole($warehouse0r,3);

$rbac->assignPermToRole($warehouse1r,5);
$rbac->assignPermToRole($warehouse1r,8);
$rbac->assignPermToRole($warehouse1r,36);
$rbac->assignPermToRole($warehouse1r,3);

$rbac->assignPermToRole($warehouser,18);

$rbac->assignPermToRole($editorr,5);
$rbac->assignPermToRole($editorr,6);
$rbac->assignPermToRole($editorr,7);
$rbac->assignPermToRole($editorr,10);
$rbac->assignPermToRole($editorr,36);
$rbac->assignPermToRole($editorr,3);

$rbac->assignPermToRole($supportr,19);
$rbac->assignPermToRole($supportr,5);
$rbac->assignPermToRole($supportr,22);
$rbac->assignPermToRole($supportr,21);
$rbac->assignPermToRole($supportr,30);
$rbac->assignPermToRole($supportr,31);
$rbac->assignPermToRole($supportr,32);
$rbac->assignPermToRole($supportr,33);
$rbac->assignPermToRole($supportr,36);
$rbac->assignPermToRole($supportr,3);

$rbac->assignPermToRole($accountr,17);
$rbac->assignPermToRole($accountr,15);
$rbac->assignPermToRole($accountr,36);
$rbac->assignPermToRole($accountr,3);

$rbac->assignPermToRole($managerr,4);
$rbac->assignPermToRole($managerr,19);
$rbac->assignPermToRole($managerr,15);
$rbac->assignPermToRole($managerr,29);
$rbac->assignPermToRole($managerr,23);

$rbac->assignPermToRole(3,36);

$rbac->assignPermToRole(6,$allShops);
$rbac->assignPermToRole(7,$allShops);
$rbac->assignPermToRole(8,$allShops);
$rbac->assignPermToRole(10,$allShops);
$rbac->assignPermToRole(11,$allShops);
$rbac->assignPermToRole(12,$allShops);

foreach ($oldRoles as $oldRole) {
	foreach($ninetyNineMonkey->dbAdapter->select("UserHasRbacRole",["rbacRoleId"=>$oldRole]) as $join) {
		$rbac->assignRoleToUser($friendCeo,$join['userId']);
	}
	$rbac->roles()->remove($oldRole);
}
$ninetyNineMonkey->repoFactory->commit();
die();
