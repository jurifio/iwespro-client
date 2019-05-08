<?php
use bamboo\helpers\CWidgetCatalogHelper;
use bamboo\core\theming\CWidgetDataBag;
/** @var CWidgetCatalogHelper $app */
/** @var CWidgetDataBag $data */
$customClass = null;
if ($data->contained == 'size') {
    $customClass = 'sizeFilter';
}
$filters = $app->getActiveCatalogFilters();
$activeFilters = [];
foreach ($filters as $filter) {
    $activeFilters[] = $filter['label'];
}

$ac = $data->multi->getArrayCopy();
usort($ac,function($a, $b) {
    $al = ($a instanceof \bamboo\core\db\pandaorm\entities\ILocalizedEntity) ? strtolower($a->getLocalizedName()) : strtolower($a->name);
    $bl = ($b instanceof \bamboo\core\db\pandaorm\entities\ILocalizedEntity) ? strtolower($b->getLocalizedName()) : strtolower($b->name);
    if ($al == $bl) {
        return 0;
    }
    return ($al > $bl) ? +1 : -1;
});
$data->multi = new ArrayIterator($ac);
?>
<aside class="block blk-cat">
    <h4><?php echo $data->title; ?></h4>
    <ul class="list-unstyled list-cat list-cat-long sub-menu mCustomScrollbar <?php echo $customClass; ?>" data-mcs-theme="light" data-mcs-axis="y">
    <?php
    foreach ($data->multi as $filter) {
        if ($filter->getEntityTable() === 'Tag' && $filter->isPublic == 0) {
            continue;
        }

        if($filter instanceof \bamboo\core\db\pandaorm\entities\ILocalizedEntity) {
            $name = $filter->getLocalizedName();
            $slug = $filter->getLocalizedSlug();
        } else {
            $name = $filter->name;
            $slug = $filter->slug;
        }

        $link = $app->hrefAddFilter($slug,$filter->id,$data->contained);
        $class = "class='selected'";

        ?><li <?php echo (in_array($slug,$activeFilters)) ? $class : null; ?>><a href="<?php echo $link; ?>"> <?php echo ucfirst($name); ?></a></li><?php
    } ?>
    </ul>
</aside>