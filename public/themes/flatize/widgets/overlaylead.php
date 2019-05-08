<div id="modalType" data-typemodal="<?php echo $data->typeModal ?>" data-fixedpageid="<?php echo $data->entity->fixedPageId; ?>" style="display: none;"></div>
<?php switch ($data->typeModal) {
    case 'showAll':
    case 'onlySubscription':
        ?>
        <div class="modal fade" id="bsLeadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-news" role="document">
                <div class="modal-content-newsletter flex-center-column" style="background-image: url('<?php echo $data->entity->img; ?>') !important;">
                    <div class="modal-header align-popup-newsletter" id="closePopoupNewsletter" style="display: <?php echo $data->typeModal === 'showAll' ? 'none' : 'block'; ?>">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true"><i
                                        class="fa fa-times"></i></span></button>
                    </div>
                    <div class="modal-body-newsletter" style="text-align:center;">
                        <img src="/assets/img/logowide.png">
                        <h4 id="popupTitle"><?php echo $data->entity->title; ?></h4>
                        <h5 id="popupSubtitle"><?php echo $data->entity->subtitle; ?></h5>
                        <p id="popupText" class="newsletter-content1"><?php echo $data->entity->text; ?></p>

                        <?php if ($data->typeModal === 'showAll'): ?>
                            <p id="couponEvent" style="display: none;" data-couponeventid="<?php echo $data->entity->couponEvent->id; ?>">CODICE
                                COUPON: <?php echo $data->entity->couponEvent->name; ?></p>
                        <?php endif; ?>

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
                                      class="col-sm-offset-2 col-sm-8 form-inline form-newsletter-modal"
                                      role="form">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail2">email</label>
                                        <div class="col-md-12" style="margin-bottom: 8px;"><input type="email"
                                                                                                  class="form-control"
                                                                                                  required="required"
                                                                                                  name="newsletter_email"
                                                                                                  id="newsletter_email"
                                                                                                  placeholder="<?php tpe($data->newsletterPlaceHolder) ?>">
                                        </div>
                                        <div class="col-md-6"><input type="text" class="form-control"
                                                                     name="newsletter_name"
                                                                     id="newsletter_name"
                                                                     placeholder="<?php tpe($data->newsletterPlaceHolderName) ?>">
                                        </div>
                                        <div class="col-md-6"><input type="text" class="form-control"
                                                                     name="newsletter_surname"
                                                                     id="newsletter_surname"
                                                                     placeholder="<?php tpe($data->newsletterPlaceHolderSurname) ?>">
                                        </div>
                                        <div>
                                            <input type="radio" class="form-control" name="newsletter_sex"
                                                   style="width: 10%;" value="m">Maschio
                                            <input type="radio" class="form-control" name="newsletter_sex"
                                                   style="width: 10%;" value="f">Femmina
                                        </div>
                                    </div>
                                    <button style="color: black; position: relative; min-width: 100px; margin: 10px 0px"
                                            type="submit" class="btn btn_news">ISCRIVITI
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php break;
    case 'onlyCode': ?>
        <div class="modal fade" id="bsLeadonlyCodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-news" role="document">
                <div class="modal-content-newsletter flex-center-column" style="background-image: url('<?php echo $data->entity->img; ?>') !important;">
                    <div class="modal-header align-popup-newsletter">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true"><i
                                        class="fa fa-times"></i></span></button>
                    </div>
                    <div class="modal-body-newsletter" style="text-align:center;">
                        <img src="/assets/img/logowide.png">
                        <h4 id="popupTitleSub"><?php echo $data->entity->titleSubscribed; ?></h4>
                        <h5 id="popupSubtitleSub"><?php echo $data->entity->subtitleSubscribed; ?></h5>
                        <p id="popupTextSub"><?php echo $data->entity->textSubscribed; ?></p>
                        <p id="couponEvent">CODICE
                            COUPON: <?php echo $data->entity->couponEvent->name; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php break; ?>
    <?php } ?>