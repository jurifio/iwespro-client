<div class="page-top-in">
    <?php if(isset($data->img) && !empty($data->img)): ?>
        <img src="<?php echo $app->image($app->parse($data->img, $app->user()->getGender())); ?>" class="img-circle" width="40" align="left" style="margin-right:10px;">
    <?php endif; ?>
    <h2><span><?php echo $app->parse(t($data->title), $app->user()->getGender()); ?></span></h2>
    <p><?php tpe($data->text); ?></p>
</div>