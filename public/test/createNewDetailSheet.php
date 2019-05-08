<?php
use bamboo\core\utils\slugify\CSlugify;
require "../../iwesStatic.php";

/**
 * @var bamboo\core\auth\rbac\CRbacManager $rbac
 *
 *
*/
;
$bs = $ninetyNineMonkey;

function insertNewPrototype($name, $labels)
{
    global $bs;

    $slug = new CSlugify();

    $psp = $bs->repoFactory->create('ProductSheetPrototype');
    $pdl = $bs->repoFactory->create('ProductDetailLabel');
    $pdlt = $bs->repoFactory->create('ProductDetailLabelTranslation');
    $psph = $bs->repoFactory->create('ProductSheetPrototypeHasProductDetailLabel');

    $checkName = $psp->findOneBy(['name' => $name]);
    if ($checkName) throw new Exception("Il nome del prototipo esiste già: " . $name . ". il nuovo prototipo non verrà inserito");

    try {
        $bs->repoFactory->beginTransaction();

        $pspe = $psp->getEmptyEntity();
        $pspe->name = $name;
        $pspe->group = '';
        $pspId = $pspe->insert();

        $pdlId = $bs->dbAdapter->query('SELECT max(`id`) as max FROM `ProductDetailLabel`', [])->fetchAll()[0]['max'] + 1;
        $detailIds = [];
        foreach ($labels as $k => $v) {
            $pdle = $pdl->getEmptyEntity();
            $pdle->id = $pdlId;
            $pdle->slug = $slug->slugify($v[1]);
            $pdle->order = $k + 1;
            $pdle->insert();

            foreach($v as $lid => $dName) {
                $pdlte = $pdlt->getEmptyEntity();
                $pdlte->productDetailLabelid = $pdlId;
                $pdlte->langId = $lid;
                $pdlte->name = $dName;
                $pdlte->insert();
            }
            $detailIds[] = $pdlId++;
        }

        foreach($detailIds as $v) {
            $psphe = $psph->getEmptyEntity();
            $psphe->productSheetPrototypeId = $pspId;
            $psphe->productDetailLabelId = $v;
            $psphe->insert();
        }

        $bs->repoFactory->commit();
        echo $name . ' è stato creato<br />';

    } catch (Exception $e) {
        $bs->repoFactory->rollback();
        throw new Exception($e->getMessage());
    }

}

$name = 'Occhiali';

/*$newSheet = [
    [1 => 'Materiale 1'],
    [1 => 'Materiale 2'],
    [1 => 'Chiusura 1'],
    [1 => 'Chiusura 2'],
    [1 => 'Accessorio 1'],
    [1 => 'N. Tasche Esterne'],
    [1 => 'Cappuccio'],
    [1 => 'Comp. Materiale 1'],
    [1 => 'Comp. Materiale 2'],
    [1 => 'Vestibilità'],
    [1 => 'Taglia Misurata'],
    [1 => 'Lunghezza'],
    [1 => 'Larghezza Spalla'],
    [1 => 'Lunghezza Maniche'],
    [1 => 'Made In']
];*/
$newSheet = [
    [1 => 'Materiale 1'],
    [1 => 'Materiale 2'],
    [1 => 'Accessorio 1'],
    [1 => 'Accessorio 2'],
    [1 => 'Lunghezza Montatura'],
    [1 => 'Altezza Montatura'],
    [1 => 'Lunghezza Ponte'],
    [1 => 'Lunghezza Lenti'],
    [1 => 'Altezza Lenti'],
    [1 => 'Lunghezza Aste'],
    [1 => 'Protezione UVA'],
    [1 => 'Made In']
];

insertNewPrototype($name, $newSheet);