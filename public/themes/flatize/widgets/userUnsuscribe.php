<div class align="center">
    <div class="container-fluid container-fixed-lg bg-white">
           <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default clearfix">
                        <div class="panel-heading clearfix">
                            <h5 class="m-t-10">Rimuoviti dalla Nostra Lista</h5>
                        </div>
                        <div class="panel-heading clearfix">
                            <h4 class="m-t-10">Se hai un momento ti preghiamo di dirci il motivo della cancellazione</h4>
                        </div>
                        <div class="panel-body clearfix">
                        </div>
                        <div class="panel-body clearfix">
                        </div>
                        <div class="panel-body clearfix">
                            <div class="row">
                                <div class="form-group form-group-default selectize-enabled">
                                    <div align="center">
                                        <div class="col-md-2">
                                        </div>
                                        <?php
                                        $emailUnsuscriber = "";
                                        if (isset($_GET['email'])) {
                                            $emailUnsuscriber = $_GET['email'];
                                        }
                                        ?>
                                        <input type="hidden" id="emailUnsuscriber" name="emailUnsuscriber"
                                               value="<?php echo $emailUnsuscriber; ?>"/>
                                        <div class="col-md-4" align="center"  style="text-align:left;">
                                            <div class="radio">
                                                <label class="radio-inline"
                                                       style="font-size: 16px; line-height: 1.25"><input
                                                            style="margin-top: 0.125em; width: 1em; height: 1em;"
                                                            type="radio" id="newsletterUnsuscribe" name="newsletterUnsuscribe">Desidero non
                                                    ricevere le email di natura Promozionale</label>
                                            </div>
                                            <div class="radio">
                                                <label class="radio-inline"
                                                       style="font-size: 16px; line-height: 1.25"><input
                                                            style="margin-top: 0.125em; width: 1em; height: 1em;"
                                                            type="radio" id="newsletterUnsuscribe" name="newsletterUnsuscribe">Non mi sono mai
                                                    iscritto a questa Newsletter</label>
                                            </div>
                                            <div class="radio">
                                                <label class="radio-inline"
                                                       style="font-size: 16px; line-height: 1.25"><input
                                                            style="margin-top: 0.125em; width: 1em; height: 1em;"
                                                            type="radio" id="newsletterUnsuscribe" name="newsletterUnsuscribe">Ho ricevuto
                                                    questa come email ed è stata contrassegnata come spam</label>
                                            </div>
                                            <div class="radio">
                                                <label class="radio-inline"
                                                       style="font-size: 16px; line-height: 1.25"><input
                                                            style="margin-top: 0.125em; width: 1em; height: 1em;"
                                                            type="radio" id="newsletterUnsuscribe" name="newsletterUnsuscribe">Altro</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary" id="confirmUnsuscribe" data-address="userUnsuscribe.default" data-action="<?php echo $app->urlForXhr().'/UserUnsuscribe'?>">UNSUSCRIBE</button>
                                        </div>
                                        <div class="col-md-12">
                                          <div id="responseUnsuscribe">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body clearfix">
                        </div>
                        <div class="panel-body clearfix">
                        </div>
                        <div class="panel-body clearfix">
                        </div>
                        <div class="panel-body clearfix">
                        </div>
                        <div class="panel-body clearfix">
                        </div>
                        <div class="panel-body clearfix">
                        </div>
                        <div class="panel-body clearfix">
                        </div>
    </div>
</div>

