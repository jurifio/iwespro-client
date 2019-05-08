<?php $i = 0; foreach($data->multi as $item): ?>
    <div class="item" id="item<?php $i++; echo $i; ?>"><img src="<?php echo $app->image($item->image); ?>" class="img-responsive" alt="photo">
        <div class="item-caption">
            <div class="item-caption-inner">
                <div class="item-caption-wrap">
                    <p class="item-cat"><a href="<?php echo $item->href; ?>"><?php tpe($item->introduction); ?></a></p>
                    <h2><?php tpe($item->headline); ?></h2>
                    <a href="<?php echo $item->href ?>" class="btn btn-white hidden-xs"><?php echo $item->button; ?></a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>