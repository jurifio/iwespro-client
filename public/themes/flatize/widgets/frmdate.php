<?php
$today = new DateTime();
$start = (int) $today->format('Y') - 100;
$end = (int) $today->format('Y');
?>

<label for="<?php echo $data->name; ?>" class="control-label"><?php tpe($data->label) ?> <span class="required">*</span></label>
<input type="hidden" id="<?php echo $data->id;?>" name="<?php echo $data->name; ?>">
<?php if ($data->format == 'dmy'): ?>
<div class="row row-collapsed">
    <div class="col-xs-4 col-collapsed">
        <div class="list-sort">
            <select id="<?php echo $data->id; ?>Day" title="<?php tpe($data->requiredMessageDay); ?>" <?php echo $data->required; ?> class="form-control date-control date-day" data-hf="<?php echo $data->id;?>">
                <option disabled="disabled" selected="selected"><?php tpe($data->defaultMessageDay) ?></option>
                <?php for($i=1;$i<=31;$i++): ?>
                    <option value="<?php echo $i;?>"><?php echo $i;; ?></option>
                <?php endfor; ?>
            </select>
        </div>
    </div>
    <div class="col-xs-4 col-collapsed">
        <div class="list-sort">
            <select id="<?php echo $data->id; ?>Month" title="<?php tpe($data->requiredMessageMonth); ?>" <?php echo $data->required; ?> class="form-control date-control date-month" data-hf="<?php echo $data->id;?>">
                <option disabled="disabled" selected="selected"><?php tpe($data->defaultMessageMonth) ?></option>
                <?php foreach ($data->multi as $val): ?>
                    <option value="<?php echo $val->id?>"><?php echo $val->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-xs-4 col-collapsed">
        <div class="list-sort">
            <select id="<?php echo $data->id; ?>Year" title="<?php tpe($data->requiredMessageYear); ?>" <?php echo $data->required; ?> class="form-control date-control date-year" data-hf="<?php echo $data->id;?>">
                <option disabled="disabled" selected="selected"><?php tpe($data->defaultMessageYear) ?></option>
                <?php for($i=$start;$i<=$end;$i++): ?>
                    <option value="<?php echo $i;?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>
    </div>
</div>
<?php endif; ?>