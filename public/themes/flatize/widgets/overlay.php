<div class="modal fade" id="bsModalSearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius:0">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" style="text-align:center;">
                <img src="/assets/logowide.png" width="260" alt="Pickyshop.com">
                <p>&nbsp;</p>
                <form class="form-inline form-search" role="form" data-url="<?php echo $app->baseUrl(true); ?>/search/" action="#">
                    <div class="form-group">
                        <label class="sr-only" for="textsearch"><?php tpe($data->search); ?></label>
                        <input type="text" class="form-control input-lg" id="textsearch" placeholder="<?php tpe($data->searchTips); ?>">
                    </div>
                    <button type="submit" class="btn btn-search"><?php tpe($data->searchButtonLabel); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php if(isset($coupon)):?>
<div class="modal fade" id="bsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius:0">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" style="text-align:center;">
                <h4 style="color:#cbac59"><?php tpe('UN CODICE SCONTO PER TE!'); ?></h4>
                <p><?php echo t($data->content).$couponDiscount; ?></p>
                <h4><?php echo $coupon; ?></h4>
                <p><strong>Il coupon ha validità 7 giorni.</strong></p>
                <h4><a href="/it/registrazione">Registrati ora!</a></h4>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="modal fade" id="bsNewsletterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-news" role="document">
        <div class="modal-content-newsletter flex-center-column">
            <div class="modal-header align-popup-newsletter">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                                class="fa fa-times"></i></span></button>
            </div>
            <div class="modal-body-newsletter" style="text-align:center;">
                <h4><?php tpe($data->newsletterTitle) ?></h4>
                <h5><?php tpe($data->newsletterSubtitle) ?></h5>
                <div class="row">
                    <div id="newsletterSubscriptionOk" style="display:none">
                        <?php tpe($data->success) ?>
                    </div>
                    <div id="newsletterSubscriptionKo" style="display:none">
                        <?php tpe($data->fail) ?>
                    </div>
                    <div id="requestNewsletterBox">
                        <form id="newsletterbox-overly" name="newsletterbox"
                              data-action="<?php echo $app->baseUrl() . '/xhr/' . $app->lang() . '/Newsletterbox' ?>"
                              class="col-sm-offset-2 col-sm-8 form-inline form-newsletter-modal" role="form">
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail2">email</label>
                                <div class="col-md-12" style="margin-bottom: 8px;"><input type="email" class="form-control" required="required"
                                                              name="newsletter_email" id="newsletter_email"
                                                              placeholder="<?php tpe($data->newsletterPlaceHolder) ?>">
                                </div>
                                <div class="col-md-6"><input type="text" class="form-control" name="newsletter_name"
                                                             id="newsletter_name"
                                                             placeholder="<?php tpe($data->newsletterPlaceHolderName) ?>">
                                </div>
                                <div class="col-md-6"><input type="text" class="form-control" name="newsletter_surname"
                                                             id="newsletter_surname"
                                                             placeholder="<?php tpe($data->newsletterPlaceHolderSurname) ?>">
                                </div>
                                <div>
                                    <input type="radio" class="form-control" name="newsletter_sex" style="width: 10%;" value="m">Maschio
                                    <input type="radio" class="form-control" name="newsletter_sex" style="width: 10%;" value="f">Femmina
                                </div>
                            </div>
                            <button style="color: black; position: relative; min-width: 100px; margin: 10px 0px" type="submit" class="btn btn_news">ISCRIVITI</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <p class="newsletter-content1"><?php tpe($data->newsletterContent) ?></p>
                    </div>
                </div>
                <!-- <p class="col-md-9 col-md-offset-3 newsletter-content2"><?php tpe($data->newsletterContent2) ?></p>
                      <div class="modal-footer">
                    </div> -->
            </div>
        </div>
    </div>
</div>