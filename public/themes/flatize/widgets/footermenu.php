<div class="<?php echo $data->columnWidthCss; ?>">
    <h2><?php echo $data->title; ?></h2>
    <ul class="list-unstyled">
        <?php foreach ($data->multi as $link): ?>
        <li><a href="<?php echo $link->href; ?>"><?php tpe($link->name); ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>