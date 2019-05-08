<?php
$n = $data->multi->count();
if ($n == 0) {
    $n = 1;
}
$w = round(12 / $n);
?>
<div class="row">
<?php foreach($data->multi as $button): ?>
    <div class="col-md-<?php echo $w?> col-centered ">
        <a class="btn btn-transparent btn-landing" href="<?php echo $button->href; ?>" style=""><?php echo $button->label; ?></a>
    </div>
<?php endforeach; ?>
</div>
