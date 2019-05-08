<li class="dropdown"><a href="<?php echo $data->href; ?>" class="dropdown-toggle<?php echo isset($data->plusClass) ? " ".$data->plusClass: "" ?>" data-toggle="dropdown"><?php tpe($data->name); ?></a>
    <ul class="dropdown-menu">
        <?php foreach ($data->multi as $link): ?>
            <li><a href="<?php echo $link->href; ?>"><?php tpe($link->name); ?></a></li>
        <?php endforeach; ?>
    </ul>
</li>