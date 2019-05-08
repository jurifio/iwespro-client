<h2 class="title"><span><?php echo $data->title; ?></span></h2>

<!-- Nav tabs -->
<ul class="nav nav-tabs pro-tabs text-center animation">
    <?php for($i=0,$class=" class=\"active\"";$data->multi->current();$data->multi->next(),$i++) : ?>
        <?php echo ($i==0) ? "<li".$class.">" : "<li>" ?><a href="#1" class="tab-handle <?php echo $data->multi->current()->defaulttab; ?>" id="tab-<?php echo $data->multi->current()->handle; ?>" data-xhr="<?php echo $app->urlForXhr() ?>" data-address="<?php echo $data->multi->current()->address; ?>"><?php echo $data->multi->current()->label; ?></a></li>
    <?php endfor; ?>
</ul>

<!-- Tab panes -->
<div class="tab-content" id="tab-content"></div>