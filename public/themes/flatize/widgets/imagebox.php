<div class="<?php echo $data->grid; ?> collect-item <?php echo $data->animation; ?>">
    <a href="<?php echo $data->href; ?>" class="collect-item-thumb"><img src="<?php echo $app->image($data->image); ?>" <?php echo $app->imageSize('img'); ?> class="img-responsive" alt="<?php tpe($data->alt); ?>"></a>
</div>