<!DOCTYPE html>
<html lang="<?php echo $app->lang(); ?>">
{{ Head.default.default }}
<body>
{{ Pixels.bodypart.default }}
<div id="page">
    {{ Header.home.default }}
    <?php if ($isLead): ?>
        {{ Content.fixedPageLead.default }}
    <?php else: ?>
        {{ Content.fixedPage.default }}
    <?php endif; ?>
    {{ Footer.home.default }}
</div>
<?php if ($isLead && $modalState !== 'none'): ?>
    {{ Lead.home.<?php echo $modalState ?> }}
<?php elseif(!$isLead): ?>
    {{ Overlay.home.default }}
<?php endif; ?>
</body>
</html>