<div class="page-top-in" style="background:url(<?php echo $app->parse($data->background); ?>);">
    <h1><span><?php echo $app->parse($data->title, $app->user()->getGender()); ?></span></h1>
    <p><?php echo $app->parse($data->subtitle); ?></p>
</div>