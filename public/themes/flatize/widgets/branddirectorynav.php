<?php use bamboo\core\theming\CWidgetHelper;
        /** @var $app bamboo\core\theming\CWidgetHelper */?>
<div class="row">
    <div class="col-md-12 text-center">
        <?php foreach ($data->multi as $cat): ?>
        <a class="btn<?php if($app->computedFilter('categoryId') != null && $app->computedFilter('categoryId') == $cat->id) echo ' btn-default'; ?>" href="/it/brands/<?php echo $cat->slug . '-' . $cat->id ?>"><?php echo $cat->getLocalizedName() ?></a>
        <?php endforeach; ?>
    </div>
</div>