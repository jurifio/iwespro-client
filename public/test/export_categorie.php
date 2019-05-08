<?php
require "../../iwesStatic.php";

use bamboo\core\events\EGenericEvent;
use bamboo\ecommerce\domain\repositories\COrderRepo;
use bamboo\core\theming\nestedCategory\CCategoryManager;



/** @var COrderRepo $orderRepo */
$categories = $ninetyNineMonkey->dbAdapter->select("ProductCategory")->fetchAll();
/** @var CCategoryManager $man */
$man = $ninetyNineMonkey->categoryManager;

$rows = [];
$head = [];
$head[] = 'id interno';
$head[] = 'path';
$head[] = 'id esterno';
$head[] = 'path esterno';
$rows[] = implode(';',$head);
foreach($categories as $cat){
    $row = [];
    $row[] = $cat['id'];
    $paths = [];
    foreach($man->categories()->getPath($cat['id']) as $asd){
        $paths[] = $asd['slug'];
    }
    $row[] = implode('->',$paths);
    $row[] = " ";
    $row[] = " ";
    $rows[] = implode(';',$row);
}
$f = fopen('lookup_categorie.csv','w+');
$all = implode("\n", $rows);
fwrite($f,$all);
fflush($f);
fclose($f);

echo '<a href="lookup_categorie.csv">scarica lookup categorie</a><br>';