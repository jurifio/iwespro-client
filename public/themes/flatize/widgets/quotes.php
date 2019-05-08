<div id="owl-text-slide" class="owl-carousel">
    <?php for(;$data->multi->current();$data->multi->next()): ?>
    <div class="item">
        <blockquote>
            <p><?php tpe($data->multi->current()->quote); ?></p>
            <footer><?php echo _('by'); ?> <cite title="<?php echo $data->multi->current()->author; ?>"><?php echo $data->multi->current()->author; ?></cite></footer>
        </blockquote>
    </div>
    <?php endfor; ?>
</div>