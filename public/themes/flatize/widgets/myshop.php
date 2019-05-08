<?php if ($app->user()->getId()==0): ?>
    <li class="dropdown my-account">
        <a href="<?php echo $app->baseUrlLang().'/login'?>"><?php tpe($data->loginLabel); ?> <i class="fa fa-sign-in"></i></a>
    </li>
<?php else: ?>
    <li class="dropdown my-account">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $app->user()->userDetails->name; ?> <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo $app->baseUrlLang()."/mypickyshop"; ?>"><?php tpe($data->myLabel); ?></a></li>
            <li><a href="<?php echo $app->baseUrlLang()."/mypickyshop/mydata"; ?>"><?php tpe('I miei dati'); ?></a></li>
            <li><a href="<?php echo $app->baseUrlLang()."/mypickyshop/myaddresses"; ?>"><?php tpe('Indirizzi'); ?></a></li>
            <li><a href="<?php echo $app->baseUrlLang()."/mypickyshop/myorders"; ?>"><?php tpe('Ordini e resi'); ?></a></li>
            <li><a href="<?php echo $app->baseUrlLang()."/mypickyshop/mywishlist"; ?>"><?php tpe('Lista dei desideri'); ?></a></li>
            <li><a href="<?php echo $app->baseUrlLang()."/mypickyshop/logout"; ?>"><?php tpe($data->logoutLabel); ?></a></li>
        </ul>
    </li>
<?php endif; ?>