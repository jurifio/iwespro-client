<?php
$parents = [];
$children = [];
use bamboo\helpers\CWidgetCatalogHelper;
/** @var $app CWidgetCatalogHelper */

    $parents = $data->multi['parents'];
    $children = $data->multi['children'];

    uasort($parents, function ($a, $b) {
        return strcmp($a->slug, $b->slug);
    });


    $parentsNum = count($parents);
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
            <?php foreach($parents as $key => $val): ?>
                <div class="col-md-<?php echo $bootstrapColumnWidth; ?> menu-column">
                    <h3 class="menu-header-link"><a href="<?php echo $app->baseUrlLang().'/'.$val->slug.'-'.$val->id; ?>"><?php echo $val->getLocalizedName(); ?></a></h3>
                    <ul class="list-unstyled sub-menu mCustomScrollbar" data-mcs-theme="light" data-mcs-axis="y">
                        <?php
                        if(isset($children[$key]) && !empty($children[$key])) {
                            uasort($children[$key], function ($a, $b) {
                                return strcmp($a->slug, $b->slug);
                            });

                            foreach ($children[$key] as $child): ?>
                                <li class="dropdownli"><a
                                        href="<?php echo $app->baseUrlLang() . '/' . $child->slug . '-' . $child->id; ?>"><?php echo $child->getLocalizedName(); ?></a>
                                </li>
                            <?php endforeach;
                        }?>

                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</li>