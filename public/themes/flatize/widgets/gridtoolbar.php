<?php
use bamboo\helpers\CWidgetCatalogHelper;
/** @var CWidgetCatalogHelper $app */
$activeFilters = $app->getActiveCatalogFilters();
if (isset($activeFilters['rootCategory'])) {
    unset($activeFilters['rootCategory']);
}
?>

<div class="toolbar clearfix">
    <div class="catalog-filters pull-left">
        <a href="#1"><?php tpe($data->filterLabel); ?></a>
        <?php foreach($activeFilters as $filterType => $activeFilter): ?>
        <a href="<?php echo $app->removeFilterFromCatalogUrl($filterType); ?>"> <span class="label label-catalog-filters"><?php echo $activeFilter['label'] ?> <i class="fa fa-close"></i></span></a>
        <?php endforeach; ?>
    </div>
    <div class="dropdown pull-right">
        <a href="" class="dropdown-toggle" data-toggle="dropdown"><?php tpe($data->sortLabel); ?><span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo $app->concatWithUrl('sortby','creation-desc')?>"> <?php tpe($data->latestLabel); ?></a></li>
            <li><a href="<?php echo $app->concatWithUrl('sortby','price-desc')?>"> <?php tpe($data->highPriceLabel); ?></a></li>
            <li><a href="<?php echo $app->concatWithUrl('sortby','price-asc')?>"> <?php tpe($data->lowPriceLabel); ?></a></li>
        </ul>
    </div>
    <div class="dropdown pull-right" style="margin-right:10px;">
        <a href="" class="dropdown-toggle" data-toggle="dropdown"><?php tpe($data->showLabel); ?><span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        <?php foreach($data->limits as $limit): ?>
            <li><a <?php ?> href="<?php echo $app->concatWithUrl('nelem',$limit); ?>"> <?php echo $limit ?> </a></li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>