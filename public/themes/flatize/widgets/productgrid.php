<?php

use bamboo\domain\entities\CProduct;
use bamboo\helpers\CWidgetCatalogHelper;

/**
 * @var $this \bamboo\core\router\CNodeView
 */
if (!isset($data->productsPerRow)) {
    $data->productsPerRow = 4;
}

$data->productsPerRow = 3;

switch ($data->productsPerRow) {
    case 2:
        $col = 6;
        break;
    case 3:
        $col = 4;
        break;
    case 4:
        $col = 3;
        break;
    case 6:
        $col = 2;
        break;
    case 12:
        $col = 1;
        break;
    default:
        $col = 3;
        $data->productsPerRow = 4;
        break;
}

if (isset($data->multi) && $data->multi->count() < 1):?>
    <div class="row">
        <div class="col-xs-12">
            <p><?php tpe($data->noProductsAvailableText); ?></p>
        </div>
    </div>
<?php endif; ?>
<div class="container-fluid">
    <div class="row product-grid-container" itemscope itemtype="http://schema.org/ItemList">
        <link itemprop="url" href="<?php echo \Monkey::app()->baseUrl(false).\Monkey::app()->router->request()->getUrlPath() ?>" />
        <?php $i = 0;
        foreach ($data->multi as $product): ?>
            <div class="itemListElement col-md-<?php echo $col ?> col-sm-6 col-xs-6" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <meta itemprop="position" content="<?php echo $i ?>"/>
                <?php
                echo $this->renderWidget('ProductCatalogDisplay', 'default', 'default', null, ['productIds' => $product->getIds(), 'position' => $i++]);
                ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>