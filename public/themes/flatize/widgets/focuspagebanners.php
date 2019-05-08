<div class="row" style="margin-bottom:15px;">
    <div class="col-md-12">
        <a href="<?php echo $app->baseUrlLang() ?>/registrazione"><div class="focus-banner" style="background-color:#c9c7c8;">
            <p><span style="text-transform:uppercase;text-decoration:underline;"><?php tpe($data->registerNow) ?></span><br /><span style="font-size:0.8em !important;"><a href="<?php echo $app->baseUrlLang() ?>/registrazione"><?php tpe($data->registerNowLong) ?></a></span></p>
        </div></a>
    </div>
</div>

<?php foreach($data->multi as $banner):
    if (empty($banner->bannerLink) || empty($banner->bannerColor) || empty($banner->banner)) {
        continue;
    }
?>
<div class="row" style="margin-bottom:15px;">
    <div class="col-md-12">
        <a href="<?php echo $banner->bannerLink; ?>"><div class="focus-banner" style="background-color:<?php echo $banner->bannerColor; ?>">
            <p><?php echo $banner->banner; ?></p>
        </div></a>
    </div>
</div>
<?php endforeach; ?>