<br /><br />
<div class="row">
    <?php
    /** @var $app bamboo\helpers\CWidgetCatalogHelper */
    $k = 3;
    $t = 0;
    $l = '#';
    $perColumn = ceil(count($data->multi) / $k);
    ?>
    <?php for ($z = 0; $z < $k; $z++):
        ?>
        <div class="col-md-4 col-sm-12">
            <?php for ($i = 0;$i < $perColumn && isset($data->multi[$t]);$i++, $t++): ?>
            <?php
                $now = $data->multi[$t];
                if ($now->slug[0] != $l) {
                    $l = $now->slug[0];
                    echo '</ul>';
                    echo "<h3>{$l}</h3>";
                    echo '<ul class="list-unstyled list-cat">';
                } ?>
                <?php if ($z!=0 && $i== 0) {
                    echo '<ul class="list-unstyled list-cat">';
                    $newCol = false;
                }
                ?>
                <li><a href="<?php echo $app->hrefCustomFilters(["brand"=>["slug"=>$now->slug,"id"=>$now->id],"category"=>[]]); ?>"><?php echo $now->name; ?></a></li>
                <?php endfor; ?>
        </div>
    <?php endfor; ?>
</div>