<?php
require "../../iwesStatic.php";

$dba = \Monkey::app()->dbAdapter;

$query = "UPDATE ProductName SET translation = REPLACE(translation, ' !', '') WHERE translation LIKE '% !'";
$dba->query($query, []);

$query = "UPDATE ProductNameTranslation SET name = REPLACE(name, ' !', '') WHERE name LIKE '% !'";
$dba->query($query, []);

$query = "SELECT name FROM `ProductName` WHERE langId = 1 AND name like '% !'";
$res = $dba->query($query, [])->fetchAll();

$query = "SELECT id, name FROM `ProductName` WHERE langId = 1 AND name like ? and translation not like ''";

$countDeletedRows = 0;

$delete = 1;
foreach($res as $k => $v) {
    $nomark = substr($v['name'], 0, -2);
    $resMark = $dba->query($query, [$v['name']])->fetchAll();
    $resNoMark = $dba->query($query, [$nomark])->fetchAll();
    if (!count($resMark) || !count($resNoMark)) continue;
    \Monkey::dump($resMark, '$resMark');
    \Monkey::dump($resNoMark, '$resNoMark');
    $ForDeleting = (count($resMark) > count($resNoMark) ) ? $resNoMark : $resMark;
    unset($resNoMark);
    unset($resMark);
    if ($delete) {
        $ids = array_column($ForDeleting, 'id');
        \Monkey::dump($ForDeleting, 'for deleting');
        \Monkey::dump($ids, 'ids arr');
        $ids = implode(',', $ids);
        $delQuery = 'DELETE FROM ProductName WHERE id IN (?)';
        \Monkey::dump($delQuery);
        $delQuery = str_replace('?', $ids, $delQuery);
        $dba->query($delQuery, [])->countAffectedRows();
    }
    $countDeletedRows+= count($ForDeleting);
}

echo $countDeletedRows . ' sono state ' . (($delete) ? 'cancellate' : 'da cancellare');