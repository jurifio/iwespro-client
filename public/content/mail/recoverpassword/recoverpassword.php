<html lang="<?php echo $app->lang(); ?>">
<head>
    <style type="text/css"><?php echo $css; ?></style>
</head>
<body>
    <?php foreach ($data->content as $paragraph):
        echo $app->parse($paragraph);
    endforeach; ?>
</body>
</html>