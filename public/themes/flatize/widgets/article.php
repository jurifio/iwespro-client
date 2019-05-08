<?php
use bamboo\core\theming\CWidgetHelper;

/** @var $app CWidgetHelper */
?>
<!-- Begin Main -->
<div role="main" class="main">
    <!-- Begin page top -->
    <article>
        <header class="page-top">
            <div class="container">
                <div class="page-top-in">
                    <h1><span><?php echo $data->entity->title?></span></h1>
                </div>
            </div>
        </header>
        <!-- End page top -->
        <div class="container">
            <?php if(isset($data->entity->imgName) && !empty($data->entity->imgName)) : ?>
            <div class="row">
                <div class="post-image single">
                    <img class="img-responsive" src="<?php echo $app->image($data->entity->imgName) ?>" alt="Blog">
                </div>
            </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-12 animation animated fadeInUp">
                    <?php echo $data->entity->text?>
                </div>
            </div>
        </div>
    </article>
    <div class="row">
        <br>
        <br>
    </div>
</div>
<!-- End Main -->