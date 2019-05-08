<?php
/**
 * Created by PhpStorm.
 * User: Fabrizio Marconi
 * Date: 16/04/2015
 * Time: 17:31
 */
?>

<div class="featured-box featured-box-secondary floating-gray-box">
    <div class="box-content">
        <h4><?php echo $data->title?></h4>
        <p><?php echo $data->text?></p>
        <div class="form-group">
            <label class="sr-only"><?php tpe('Paese'); ?></label>
            <div class="form-group list-sort">
                <select id="country" class="form-control" style="font-size:13px !important;">
                    <option selected="selected" disabled value=""><?php tpe($data->hint) ?></option>
                    <?php foreach($data->multi as $val): ?>
                    <option value="<?php echo $val->id ?>"><?php echo $val->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <input id="calculateShipping" data-action="<?php echo $app->baseUrl().'/xhr/'.$app->lang().'/CartSideSummary'?>" type="submit" value="<?php tpe($data->button); ?>" class="btn btn-grey btn-sm" data-loading-text="Loading...">
            </div>
        </div>
    </div>
</div>