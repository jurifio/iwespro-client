<?php
use bamboo\helpers\CWidgetCatalogHelper;
/** @var CWidgetCatalogHelper $app */
?>

<div class="toolbar clearfix">
    <div class="pull-left">
        <?php tpe($data->filterLabel); ?>
        <?php foreach($data->mainCategories as $categoryFilter): ?>
        <a href="<?php echo $app->hrefAddFilter($categoryFilter->slug,$categoryFilter->id,'category'); ?>"> <span class="label label-catalog-filters"><?php echo $categoryFilter->title ?></span></a>
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