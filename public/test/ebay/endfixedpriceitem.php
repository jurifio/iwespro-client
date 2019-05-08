<?php
require "ebayconfig.php";

$ninetyNineMonkey->eventManager->trigger(new \bamboo\core\events\EGenericEvent('product.stock.change',['productKeys'=>'49-1248']));

//README USATO PER FARE TROVA E SOSTITUISCI
//var $pattern = '^([\s]+)\$this->([a-zA-Z0-9]+) = ([\$0-9a-zA-Z]+);$';
//var $replace = '$1\$this->set("$2",$3);';