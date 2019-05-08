<?php
/** @var \bamboo\core\theming\CWidgetHelper $app */
$parentsNum = count($data->multi);
$bootstrapColumnWidth = 12;
$imageColumnWidth = 12;
if ($parentsNum > 0) {
    $bootstrapColumnWidth = floor(12 / $parentsNum);
    if ($bootstrapColumnWidth > 3) {
        $bootstrapColumnWidth = 3;
    }
    $imageColumnWidth = 12 - ($bootstrapColumnWidth * $parentsNum);
}
?>
<li class="dropdown megamenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php tpe($data->label); ?></a>
    <div class="dropdown-menu">
        <div class="mega-menu-content">
            <div class="row">
                <?php foreach ($data->multi as $column): ?>
                    <div class="col-md-<?php echo $bootstrapColumnWidth; ?> menu-column">
                        <a href="<?php echo $app->baseUrlLang() . '/brands/' . $column['category']->slug . '-' . $column['category']->id ?>">
                            <h3 class="menu-header-link"><?php echo $column['category']->getLocalizedName() ?></h3>
                        </a>
                        <ul class="list-unstyled sub-menu mCustomScrollbar" data-mcs-theme="light" data-mcs-axis="y">
                            <li class="dropdownli"><a class="pickyGold"
                                                      href="<?php echo $app->baseUrlLang() . '/brands/' . $column['category']->slug . '-' . $column['category']->id ?>"><?php tpe($data->allBrands) ?></a>
                            </li>
                            <?php foreach ($column['brands'] as $brand): ?>
                                <li class="dropdownli"><a
                                            href="<?php echo $app->baseUrlLang() . '/' . $brand->slug . '-b' . $brand->id . '/' . $column['category']->slug . '-' . $column['category']->id; ?>"><?php echo $brand->name; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
                <?php if ($imageColumnWidth > 0): ?>
                    <div class="col-md-<?php echo $imageColumnWidth; ?> menu-column menu-image">
                        <div class="pull-right" style="text-align: right;">
                            <img src="/<?php echo $app->lang(); ?>/assets/<?php echo $data->image; ?>"
                                 class="img-responsive"/>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</li>