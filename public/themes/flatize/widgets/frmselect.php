<label for="selectCountry" class="control-label"><?php tpe($data->label) ?> <span class="required">*</span></label>
<div class="list-sort">
    <select id="<?php echo $data->id; ?>" name="<?php echo $data->name; ?>"
            title="<?php tpe($data->requiredMessage); ?>" <?php echo $data->required; ?> class="form-control">
        <option disabled="disabled" selected="selected"><?php tpe($data->requiredMessage) ?></option>
        <?php foreach ($data->multi as $val): ?>
            <option value="<?php echo $val->id ?>"><?php echo $val->name; ?></option>
        <?php endforeach; ?>
    </select>
</div>