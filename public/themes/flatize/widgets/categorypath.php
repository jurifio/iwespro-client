<?php
/**
 * @var $app CWidgetCatalogHelper
 * @var $data CWidgetDatabag
 */

use bamboo\helpers\CWidgetCatalogHelper;
use bamboo\core\theming\CWidgetDataBag;

$anchor = "";
foreach($data->multi as $val) {
    $link = $app->getLinkToCategoryPage($val);
    $name = $val->getLocalizedName();
    $anchor .= "<a href=\"" . $link . "\">" . $name . "</a> ";
}

echo $anchor;