<?php if ($data->multi->count() == 0) return; ?>
<h6 class="title" style="margin-bottom:0"><span><?php tpe($data->title); ?></span></h6>
<div class="row">
    <div class="owl-product-slide owl-carousel product-slide owl-tabbed-products" style="padding-top:0" itemscope itemtype="http://schema.org/ItemList">
        <?php $i = 0; foreach ($data->multi as $product): ?>
            <div class="col-md-12 animation" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <meta itemprop="position" content="<?php echo $i++ ?>"/>
                <?php echo $this->renderWidget('ProductCatalogDisplay', 'slider', 'default', null, ['productIds' => $product->getIds()]); ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>