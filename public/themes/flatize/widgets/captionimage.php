<!-- caption image -->
<div class="<?php echo $data->grid; ?> <?php echo $data->animation; ?>">
    <div class="cat-item">
        <figure class="animation animated fadeInUp img-holder">
            <a href="<?php echo $app->baseUrl(); ?>/<?php echo $data->href; ?>"><img class="img-responsive xhttp-loading-icon" alt="" src="/<?php echo $app->lang(); ?>/assets/xhttp-loading-icon.gif" data-src="<?php echo $app->image($data->image); ?>"></a>
            <figcaption>
                <div class="cat-description">
                    <h3><?php tpe($data->captionTitle); ?></h3>
                    <a href="<?php echo $app->baseUrl(); ?>/<?php echo $data->captionHref; ?>"><?php tpe($data->captionText); ?></a>
                </div>
            </figcaption>
        </figure>
    </div>
</div>