<?php
require "../../iwesStatic.php";

use bamboo\core\events\EGenericEvent;
use bamboo\ecommerce\domain\repositories\COrderRepo;
use bamboo\core\theming\nestedCategory\CCategoryManager;

$emails = $ninetyNineMonkey->dbAdapter->query("select email,
									 nome,
									 cognome
							  from ( SELECT u.email as email,
							  				ud.name as nome,
							  				ud.surname as cognome
					                 from User u,
				                          UserDetails ud
					                 where u.id = ud.userId and u.isActive = 1 and u.isDeleted = 0
					                 UNION
					                 select email as email,
					                  		'' as nome,
					                  		'' as cognome
			                         from NewsletterUser) a GROUP BY email order by email",[])->fetchAll();;

$rows= [];
foreach($emails as $email){
	if(empty($email['email'])) continue;
	if(strpos($email['email'],'_e_') === 0){
		$email['email'] = substr($email['email'],3);
	}elseif(strpos($email['email'],'_') === 0){
		$email['email'] = substr($email['email'],1);
	}elseif(strpos($email['email'],'e_') === 0){
		$email['email'] = substr($email['email'],2);
	}elseif(strpos($email['email'],'ebay_') === 0){
		$email['email'] = substr($email['email'],5);
	}
	$rows[] = implode(';',$email);
}
$f = fopen('export_email.csv','w+');
$all = implode("\n", $rows);
fwrite($f,$all);
fflush($f);
fclose($f);

echo '<a href="export_email.csv">scarica email</a><br>';