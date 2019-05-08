<div class="<?php echo $data->grid; ?> <?php echo $data->animation; ?>">
    <div class="cat-item cat-item-side-image">
        <figure class="animation animated fadeInUp img-holder">
            <a href="<?php echo $app->baseUrlLang(); ?>/<?php echo $data->href; ?>"><img class="img-responsive xhttp-loading-icon" alt="Loading..." src="/<?php echo $app->lang(); ?>/assets/xhttp-loader-icon.gif" data-src="<?php echo $app->image($data->image); ?>"></a>
        </figure>
    </div>
    <div class="cat-item cat-description-side cat-item-side-text">
        <h1 class="black"><?php tpe($data->captionTitle); ?></h1>
        <p style="font-size:12px;"><?php tpe($data->captionText); ?></p>
    </div>
</div>