<?php
use bamboo\helpers\CWidgetCatalogHelper;
use bamboo\core\theming\CWidgetDataBag;
use bamboo\core\base\CObjectCollection;

function drawChildren(CObjectCollection $objc, $depth, CWidgetCatalogHelper $app, CWidgetDataBag $data)
{ ?>
    <ul class="depth<?php echo $depth + 1 ?>">
        <?php foreach ($objc as $child) { ?>
            <li>
                <a href="<?php echo $app->hrefAddFilter($child->slug, $child->id, $data->contained); ?>"> <?php echo $child->getLocalizedName() ?></a>
                <?php if (isset($child->children) && !$child->children->isEmpty()) drawChildren($child->children, $child->depth, $app, $data); ?>
            </li>
        <?php } ?>
    </ul>
<?php } ?>

<aside class="block blk-cat">
    <h4><?php echo $data->title; ?></h4>
    <ul class="list-unstyled list-cat list-cat-long mCustomScrollbar depth0" data-mcs-theme="light" data-mcs-axis="y">
        <?php foreach ($data->multi as $cat):
            if ($cat->depth == -1 && $cat->id != 1 && $data->parent->id != 1): ?>
                <li class="parent">
                    <a href="<?php echo $app->hrefAddFilter($data->parent->slug, $data->parent->id, $data->contained); ?>"><i
                                class="fa fa-arrow-left"></i> <?php echo $data->parent->getLocalizedName() ?></a>
                </li>
            <?php elseif ($cat->depth >= 0):?>
                <li>
                    <a href="<?php echo $app->hrefAddFilter($cat->slug, $cat->id, $data->contained); ?>"> <?php echo $cat->getLocalizedName() ?></a>
                    <?php if (isset($cat->children) && !$cat->children->isEmpty()) drawChildren($cat->children, $cat->depth, $app, $data); ?>
                </li>
            <?php endif;

            endforeach; ?>
    </ul>
</aside>