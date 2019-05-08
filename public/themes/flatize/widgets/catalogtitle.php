<?php
    /** @var \bamboo\domain\entities\CProductCategory $cat */
    /** @var \bamboo\helpers\CWidgetCatalogHelper $app */
    $cat = $cat->productCategory;
    $objectArray = $cat->getObjectPathArray();
?>
<div class="page-top-in">
    <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        <?php $i = 0;
        foreach($objectArray as $category):
            $i++;
            if($category->id == 1): ?>
                <li itemprop="itemListElement" itemscope
                    itemtype="http://schema.org/ListItem">
                    <a itemscope itemtype="http://schema.org/Thing"
                       itemprop="item" href="<?php echo $app->baseUrlLang(); ?>">
                        <span itemprop="name">Home</span>
                    </a>
                    <meta itemprop="position" content="<?php echo $i; ?>" />
                </li>
        <?php else: ?>
            <li itemprop="itemListElement" itemscope
                       itemtype="http://schema.org/ListItem">
                <a itemscope itemtype="http://schema.org/Thing"
                   itemprop="item" href="<?php echo $app->getLinkToCategoryPage($category); ?>">
                    <span itemprop="name"><?php echo $category->getLocalizedName(); ?></span>
                </a>
                <meta itemprop="position" content="<?php echo $i; ?>" />
            </li>
        <?php
            endif;
        endforeach; ?>
    </ol>
    <p><?php if(isset($cat->description)) echo $cat->description; ?></p>
</div>