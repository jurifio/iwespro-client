<label for="<?php echo $data->name; ?>"><?php tpe($data->label); ?></label>
<input type="<?php echo $data->type; ?>"
       class="<?php echo $data->css; ?>"
       id="<?php echo $data->id; ?>"
       name="<?php echo $data->name; ?>"
       value="<?php echo $data->value; ?>"
       data-msg-required="<?php tpe($data->requiredMessage); ?>"
        <?php echo $data->required ?? ""; ?>
       autocomplete="<?php echo $data->autocomplete; ?>"
       pattern="<?php echo isset($data->pattern) ? $data->pattern : '.*' ?>"
        <?php if(isset($data->title)) echo ' title="'.$data->title.'" ' ?>
       <?php if(isset($data->min)) echo ' min="'.$data->min.'" ' ?>
       <?php if(isset($data->max)) echo ' max="'.$data->max.'" ' ?> >
