<label for="selectCountry" class="control-label"><?php tpe($data->country) ?><span class="required">*</span></label>
<div class="list-sort">
    <select id="selectCountry" name="country" required="required" title="<?php tpe($data->selectCountry) ?>" class="formDropdown">
        <option disabled="disabled" selected="selected"><?php tpe($data->selectCountry) ?></option>
        <?php foreach ($data->multi as $val): ?>
            <option value="<?php echo $val->id ?>"><?php tpe($val->name) ?></option>
        <?php endforeach; ?>
    </select>
</div>