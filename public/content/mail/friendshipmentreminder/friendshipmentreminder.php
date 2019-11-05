<?php
use bamboo\core\theming\CMailerHelper;
/** @var CMailerHelper $app */ ?>
<html lang="<?php echo $app->lang(); ?>">
<head>
    <meta charset="UTF-8" />
    <style type="text/css"><?php echo $css; ?>
    </style>
</head>
<body>
Ciao,<br>
    ti ricordiamo che devi segnalare l'avvenuta spedizione prevista per oggi,<br />
    puoi farlo accedendo al pannello <a href="https://www.iwes.pro/blueseal/spedizioni">Spedizioni</a>
    e cliccando <img src="https://www.iwes.pro/assets/frecciainsu.jpg">,<br />
    nel caso la spedizione non fosse partita ti invitiamo a cliccare <img src="https://www.iwes.pro/assets/tastoX.jpg"> <br />

    Saluti<br />

    <img src="https://www.pickyshop.com/it/assets/logoiwes.png"><br />
    Friends Support

</body>
</html>