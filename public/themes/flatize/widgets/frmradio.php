<label for="<?php echo $data->name; ?>"><?php tpe($data->label); ?></label>
<div class="<?php echo $data->css; ?>">
    <?php foreach ($data->multi as $option): ?>
        <input type="radio"
               value="<?php echo $option->value; ?>"
               id="<?php echo $option->id; ?>"
               name="<?php echo $option->name; ?>"
               data-msg-required="<?php tpe($data->requiredMessage); ?>"
               <?php echo $data->required ?? ""; ?>
               autocomplete="<?php echo $data->autocomplete; ?>">
            <?php tpe($option->label); ?>
    <?php endforeach; ?>
</div>