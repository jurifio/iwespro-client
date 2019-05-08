<?php
require "../../../iwesStatic.php";

$f = fopen('valigeria.csv','r');

while(($values = fgetcsv($f, 0, ';')) !== false) {
	$path = explode('/',$values[1]);
	$name = $path[count($path)-1];
	$config = ["productDataElement"=>"Luggage"];
	//$ninetyNineMonkey->dbAdapter->insert('MarketplaceAccountCategory',[4,4,$values[0],$name,implode('_',$path),1,json_encode($config)],false,true);
}