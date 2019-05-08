<h2><?php tpe($data->title); ?></h2>
<?php foreach ($data->text as $paragraph): ?>
    <?php echo $app->parse(t($paragraph)); ?>
<?php endforeach; ?>