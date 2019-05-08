<div class="brand-description">
    <div class="row">
        <?php if($data->entity->logoUrl): ?>
        <div class="col-md-3">
            <img class="img-responsive" src="<?php echo $data->entity->logoUrl ?>" alt="<?php echo $data->entity->name ?>">
        </div>
        <article class="col-md-9">
            <h3><?php echo $data->entity->name ?></h3>
            <p><?php tpe($data->entity->description) ?></p>
        </article>
        <?php else: ?>
        <article class="col-md-12">
            <h3><?php echo $data->entity->name ?></h3>
            <p><?php tpe($data->entity->description) ?></p>
        </article>
        <?php endif; ?>
    </div>

</div>
