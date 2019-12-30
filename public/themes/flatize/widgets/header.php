<?php
 if($_SERVER['REMOTE_ADDR']!=='93.43.116.170'){ ?>
<!--<meta http-equiv="refresh" content="0;url=/blueseal">-->
<?php }?>
<header <?php echo $data->headerAttrs; ?>>
    <div id="top">
        <div class="container">
            {{ Textnote.default.topnav }}
            <ul class="nav nav-pills nav-top navbar-right">
                {{ Langselector.default.default }}
                {{ Myshop.default.default }}
                {{ CartSummary.widget.widget.async }}
            </ul>
        </div>
    </div>
    {{ Mainnav.default.default }}
</header>