<div class="<?php echo $data->columnWidthCss; ?> text-right">
    <!--<link itemprop="url" href="<?php echo \Monkey::app()->baseUrl(false); ?>"> -->
    <ul class="list-inline social-list">
        <?php foreach ($data->multi as $social): ?>
            <li><a data-toggle="tooltip"
                   data-placement="top"
                   itemprop="sameAs"
                   rel="noopener"
                   title="<?php echo $social->name; ?>"
                   href="<?php echo $social->href; ?>">
                    <i class="fa <?php echo $social->icon; ?>"></i>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>