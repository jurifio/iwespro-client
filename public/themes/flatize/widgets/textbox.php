<div class="col-md-2 hidden-sm hidden-xs menu-column">
    <h3><?php tpe($data->title); ?></h3>
    <ul class="list-unstyled sub-menu list-md-pro">
        <li class="product">
            <div class="product-thumb-info">
                <div class="product-thumb-info-image">
                    <a href="<?php echo $app->baseUrlLang().$data->href; ?>"><img class="img-responsive" width="330" alt="" src="<?php echo $app->image($data->image); ?>"></a>
                </div>

                <div class="product-thumb-info-content">
                    <h4><a href="<?php echo $data->href; ?>"><?php tpe($data->subtitle); ?></a></h4>
                    <?php tpe($data->text); ?>
                </div>
            </div>
        </li>
    </ul>
</div>