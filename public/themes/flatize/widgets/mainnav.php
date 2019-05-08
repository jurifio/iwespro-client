<nav class="navbar navbar-default navbar-main navbar-main-slide" role="navigation">
    <div class="container">
        <div class="navbar-header">
            {{ Mobilenav.default.default }}
            {{ Sitelogo.default.default }}
        </div>
        {{ Searchbutton.default.default }}
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right">
                <li><a href="<?php echo $app->baseUrlLang(); ?>"><?php echo _('home'); ?></a></li>
                {{ Mainnavdropdown.megamenu.donna }}
                {{ Mainnavdropdown.megamenu.uomo }}
                {{ Mainnavdropdown.megamenu.bambini }}
                {{ Mainnavdropdown.megamenuBrands.brands }}
                {{ Mainnavdropdown.dlink.blog }}
                {{ Mainnavdropdown.toggle.sales }}
                {{ Mainnavdropdown.toggle.aiuto }}
            </ul>
        </div>
    </div>
</nav>