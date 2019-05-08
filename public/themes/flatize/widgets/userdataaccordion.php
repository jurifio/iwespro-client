<h2><?php tpe($data->title); ?></h2>
<div class="panel-group panel-group2" id="<?php echo $data->id; ?>">
    <?php foreach($data->tabs as $tab): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title"> <a data-toggle="collapse" data-parent="#<?php echo $data->id; ?>" href="#<?php echo $tab->href; ?>" class=""><?php tpe($tab->title); ?></a> </h5>
        </div>
        <div id="<?php echo $tab->href; ?>" class="<?php echo $tab->initialPanelClass; ?>" style="<?php echo $tab->initialCss; ?>">
            <div class="panel-body">
                <?php foreach ($tab->text as $paragraph):
                    tpe($paragraph);
                endforeach; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>