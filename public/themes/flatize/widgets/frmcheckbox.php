<div class="checkbox">
    <label for="<?php echo $data->id; ?>">
        <input type="<?php echo $data->type; ?>"
               id="<?php echo $data->id; ?>"
               name="<?php echo $data->name; ?>"
               value="<?php echo $data->value; ?>">
                    <?php echo $data->required ?? ""; ?>
        <?php tpe($data->label); ?>
    </label>
</div>