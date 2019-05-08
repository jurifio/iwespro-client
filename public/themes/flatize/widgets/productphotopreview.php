<?php
/**
 * @var $app CWidgetHelper
 * @var $data CWidgetDatabag
 */
use bamboo\core\theming\CWidgetHelper;
use bamboo\core\theming\CWidgetDataBag;

?>
<div class="product-preview">
    <div class="flexslider">
        <ul class="slides">
            <?php
            $i = 0;
            $data->entity->productPhoto->reorder('order');
            foreach($data->entity->productPhoto as $photo):
                if($photo->size !=  1124) continue;
                ?>
            <li data-thumb="<?php echo $app->image($data->entity->productBrand->slug."/".$photo->name,'amazon')?>">
                <figure>
                    <img class="img-responsive" data-position="<?php echo $photo->order; ?>" src="<?php echo $app->image($data->entity->productBrand->slug."/".$photo->name,'amazon')?>" />
                </figure>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>