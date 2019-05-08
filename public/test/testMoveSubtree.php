<?php
require "../../iwesStatic.php";

$cm = $ninetyNineMonkey->categoryManager;

$id = $cm->categories()->add('sneakers','Sneakers',572);
$cm->categories()->add('alte','Alte',$id);
$cm->categories()->add('basse','Basse',$id);
$cm->categories()->add('running','Running',$id);
$cm->categories()->add('slip-on','Slip on',$id);

$id = $cm->categories()->add('sneakers','Sneakers',655);
$cm->categories()->add('alte','Alte',$id);
$cm->categories()->add('basse','Basse',$id);
$cm->categories()->add('running','Running',$id);
$cm->categories()->add('slip-on','Slip on',$id);

die();
/** COSTRUITE LE CATEGORIE FUTURE
$bambini = $ninetyNineMonkey->categoryManager->categories()->add('bambini','Bambini');
var_dump('$bambini',$bambini);

$bambino = $ninetyNineMonkey->categoryManager->categories()->add('bambino','Bambino',$bambini);
var_dump('$bambino',$bambino);
$bambina = $ninetyNineMonkey->categoryManager->categories()->add('bambina','Bambina',$bambini);
var_dump('$bambina',$bambina);
 **/

var_dump($ninetyNineMonkey->categoryManager->categories()->children(719));
var_dump('----');
//$ninetyNineMonkey->categoryManager->categories()->remove(706,true);
//var_dump($ninetyNineMonkey->categoryManager->categories()->children(1));

//var_dump($ninetyNineMonkey->categoryManager->categories()->getDescendantsByNodeId(1));
//$asd = $ninetyNineMonkey->categoryManager->categories()->remove(709);
//var_dump($ninetyNineMonkey->categoryManager->categories()->fullTree());

$destinazione = $ninetyNineMonkey->dbAdapter->select('ProductCategory',['id'=>719])->fetchAll()[0]; //sotto a bambini/bambino -> andrà rinominato in bambino 2-12
$bambinoOrigine = $ninetyNineMonkey->dbAdapter->select('ProductCategory',['id'=>97])->fetchAll()[0];
var_dump($destinazione);
var_dump($bambinoOrigine);

$ninetyNineMonkey->repoFactory->beginTransaction();
$ninetyNineMonkey->categoryManager->categories()->nestedSet()->moveSubreeToNodeTreeSteps($bambinoOrigine,$destinazione);

var_dump($ninetyNineMonkey->categoryManager->categories()->children(719));
$ninetyNineMonkey->repoFactory->rollback();
die();
