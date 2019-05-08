<div class="page-top-in">
    <?php if(isset($data->img) && !empty($data->img)): ?>
        <img src="<?php echo $app->image($data->img) ?>" class="img-circle">
    <?php endif; ?>
    <h2><span><?php echo $app->parse(t($data->title), $app->user()->getGender()); ?></span></h2>
    <p><?php tpe($data->text); ?></p>
</div>