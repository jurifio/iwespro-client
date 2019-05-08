<nav>
    <ul class="myarea-menu">
    <?php foreach ($data->menu as $menuItem): ?>
        <li><a href="<?php echo $app->baseUrlLang()."/".$menuItem->menuItemHref; ?>"><i class="fa <?php echo $menuItem->fontAwesome; ?>"></i>&nbsp;<?php tpe($menuItem->menuItem); ?></a></li>
    <?php endforeach; ?>
    </ul>
</nav>