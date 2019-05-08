<?php
/** @var $app bamboo\core\theming\CWidgetHelper
 * @var $data bamboo\core\theming\CWidgetDataBag */
$active = 0;
foreach ($data->multi as $single) {
    if($single->isActive == 1) $active++;
    if ($single->lang == $app->lang()) {
        $curLang = $single->name;
    }
}
$data->multi->rewind();
if($active >= 2):  ?>

    <li class="dropdown langs">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i> <?php echo ucfirst($curLang); ?><span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <?php foreach ($data->multi as $single): ?>
                <?php if ($single->lang != $app->lang() && $single->isActive == 1): ?>
                    <li><a href="<?php echo $app->baseUrl(); ?>/<?php echo $single->lang.'/' ?>" style="font-size:.73em !important"><i class="fa fa-globe"></i> <?php echo ucfirst($single->name); ?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </li>
<?php endif; ?>