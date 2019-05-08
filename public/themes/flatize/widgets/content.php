<!-- begin main -->
<div role="main" class="main">

    <!-- begin ads -->
    <section class="announces">
        <div class="container">
            <div class="row" style="text-align: center">
                <div id="owl-announces" class="owl-carousel">
                    <?php foreach ($data->ads as $ad): ?>
                        <div class="item">
                            <span class="announces-title"
                                  style="color:<?php echo $ad->titleColor; ?>"><?php tpe($ad->title); ?></span>&nbsp;-&nbsp;<span
                                    class="announces-text"><?php tpe($ad->text); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end ads -->

<!--
    <section class="main-slide main-slide-boxed">
        <a href="<?php echo $app->baseUrlLang() ?>/donna-2/tag-saldi-t11">
            <div class="container">
                <div class="item"><img src="/assets/lastchance.jpg" class="img-responsive" alt="Photo"">
                    <div class="item-caption">
                        <div class="item-caption-inner">
                            <div class="item-caption-wrap">
                                <!--<p class="item-cat"><a href="#">Fall/Winter 2014</a></p>
                                <h2>Up to 50% off<br>on selected items</h2>
                                <a href="#" class="btn btn-white hidden-xs">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
        </a>
    </section>
-->
    <!-- End Main Slide -->

    <!-- begin brand selection -->
    <section class="about">
        <div class="container">
            <div class="row row-narrow" style="margin-top:10px;">
                {{ EditorialImage.default.summer0 }}
                <?php //renderWidget('CEditorialImage','default','summer0',true); ?>
            </div>
            <div class="row row-narrow" style="margin-top:10px;">
                {{ EditorialImage.default.summer1 }}
            </div>
            <div class="row row-narrow" style="margin-top:10px;">
                {{ EditorialImage.default.summer2 }}
                <div class="col-xs-6">
                    <div class="row row-narrow">
                        {{ EditorialImage.default.summer3 }}
                    </div>
                    <div class="row row-narrow">
                        {{ EditorialImage.default.summer4 }}
                    </div>
                </div>
            </div>
            <div class="row row-narrow" style="margin-top:10px;0">
                {{ EditorialImage.default.summer5 }}
                {{ EditorialImage.default.summer6 }}
                {{ EditorialImage.default.summer7 }}
                {{ EditorialImage.default.summer8 }}
            </div>
            <div class="row row-narrow" style="margin-top:10px;0">
                {{ EditorialImage.default.summer9 }}
                {{ EditorialImage.default.summer10 }}
                {{ EditorialImage.default.summer11 }}
            </div>
            <div class="row row-narrow" style="margin-top:10px;0">
                {{ EditorialImage.default.summer12 }}
            </div>
        </div>
    </section>

</div>
<!-- end main -->
