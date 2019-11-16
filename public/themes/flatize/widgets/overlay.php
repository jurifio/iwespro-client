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
<?php if (isset($coupon)): ?>
    <div class="modal fade" id="bsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius:0">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" style="text-align:center;">
                    <h4 style="color:#cbac59"><?php tpe('UN CODICE SCONTO PER TE!'); ?></h4>
                    <p><?php echo t($data->content) . $couponDiscount; ?></p>
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
<?php if (strpos($_SERVER['REQUEST_URI'],'utm_marketing_data[]') === true) {
    ?>
    <div class="modal fade" id="bsNewsletterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-news" role="document">
            <div class="modal-content-newsletter flex-center-column">
                <div class="modal-header align-popup-newsletter">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true"><i
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
                                    <div class="col-md-12" style="margin-bottom: 8px;"><input type="email"
                                                                                              class="form-control"
                                                                                              required="required"
                                                                                              name="newsletter_email"
                                                                                              id="newsletter_email"
                                                                                              placeholder="<?php tpe($data->newsletterPlaceHolder) ?>">
                                    </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="newsletter_name"
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
<?php } else {
    $url_components = parse_url($_SERVER['REQUEST_URI']);
    if ($_SERVER['QUERY_STRING'] != null) {
        $filterCampaign = str_replace('utm_marketing_data[]=marketplaceAccount','',$_SERVER['QUERY_STRING']);
        $filter = explode('-',$filterCampaign);
        $marketplaceAccountId = $filter[0];
        $marketplaceId = $filter[1];
        $sessionIp = $_SERVER['REMOTE_ADDR'];
        $findCoupon = \Monkey::app()->repoFactory->create('Coupon')->findOneBy(['sid' => $sessionIp,'valid' => 1]);
        if ($findCoupon != null) {
            $coupongen = $findCoupon->code;
            $couponTypeId = $findCoupon->id;
            $amount = $findCoupon->amount;
            $validThru = $findCoupon->validThru;
            if ($findCoupon->amountType == 'F') {
                $couponTypeText = 'del valore di ' . $amount . ' Euro su tutti prodotti';
            } else {
                $couponTypeText = 'di ' . $amount . ' %';
            }
        } else {
            $findCampaign = \Monkey::app()->repoFactory->create('Campaign')->findOneBy(['marketplaceAccountId' => $marketplaceAccountId,'marketplaceplaceId' => $marketplaceId]);
            if ($findCampaign != null) {
                $findCouponType = \Monkey::app()->repoFactory->create('CouponType')->findOneBy(['campaignId' => $findCampaign->id]);
                $nameCoupon = $findCouponType->name;
                switch (true) {
                    case $findCouponType->validity === 'P1Y':
                        $calculateDay = '+ 365 day';
                        break;
                    case $findCouponType->validity === 'P1M':
                        $calculateDay = '+ 30 day';
                        break;
                    case $findCouponType->validity === 'P3D':
                        $calculateDay = '+ 3 day';
                        break;
                    case $findCouponType->validity === 'P7D':
                        $calculateDay = '+ 7 day';
                        break;
                    case $findCouponType->validity === 'P14D':
                        $calculateDay = '+ 14 day';
                        break;
                    case $findCouponType->validity === 'P21D':
                        $calculateDay = '+ 21 day';
                        break;
                }

                $generateCoupon = \Monkey::app()->repoFactory->create('Coupon')->getEmptyEntity();
                $issueDate = date('Y-m-d H:s:i');
                $validThru = date('Y-m-d H:s:i',strtotime($calculateDay));
                $couponTypeId = $findCouponType->id;


                $sql = 'select (count(*)+1) as newCouponCode  FROM Coupon where `code` like \'%' . $nameCoupon . '%\'';
                $res = \Monkey::app()->dbAdapter->query($sql,[])->fetch();
                $first = $res['newCouponCode'];

                $secondPart = substr($issueDate,5,2);
                $thirdPart = substr($issueDate,8,2);
                $code = $nameCoupon . '-' . $first . $secondPart . $thirdPart;
                $amount = $findCouponType->amount;
                $valid = 1;
                $generateCoupon->couponTypeId = $couponTypeId;
                $generateCoupon->code = $code;
                $generateCoupon->issueDate = $issueDate;
                $generateCoupon->validThru = $validThru;
                $generateCoupon->amount = $amount;
                $generateCoupon->valid = $valid;
                $generateCoupon->sid = $sessionIp;
                $generateCoupon->insert();
                $coupongen = $code;
                if ($findCouponType->amountType == 'F') {
                    $couponTypeText = 'del valore di ' . $amount . ' Euro su tutti prodotti';
                } else {
                    $couponTypeText = 'di ' . $amount . ' %';
                }
            }
        }
        ?>
        <div class="modal fade" id="bsNewsletterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-news" role="document">
                <div class="modal-content-newsletter flex-center-column">
                    <div class="modal-header align-popup-newsletter">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true"><i
                                        class="fa fa-times"></i></span></button>
                    </div>
                    <div class="modal-body-newsletter" style="text-align:center;">
                        <h4><?php tpe('Complimenti! ') ?></h4>
                        <h5><?php tpe(' Hai ottenuto un coupon ' . $couponTypeText . '<br>' . 'per anticipo Black Friday') ?></h5>
                        <h3><?php tpe(' CODICE COUPON: ' . $coupongen) ?></h3>
                        <div class="row">
                            <ul>
                                <li><span id="days"></span>days</li>
                                <li><span id="hours"></span>Hours</li>
                                <li><span id="minutes"></span>Minutes</li>
                                <li><span id="seconds"></span>Seconds</li>
                            </ul>
                        </div>
                        <div class="row">
                            <div id="newsletterSubscriptionOk" style="display:none">
                                <div class="container">
                                    <h1 id="head"></h1>

                                </div>
                            </div>
                            <div id="newsletterSubscriptionKo" style="display:none">
                                <?php tpe($data->fail) ?>
                            </div>
                            <div id="requestNewsletterBox">

                                <script type="text/javascript">
                                    const second = 1000,
                                        minute = second * 60,
                                        hour = minute * 60,
                                        day = hour * 24;
                                    //countDown = new Date('Nov 20, 2019 00:00:00').getTime(),
                                    let countDown = new Date('<?php echo date_format(date_create($validThru),'M,d Y  H:i:s'); ?>').getTime(),
                                        //date_format($validThru, 'F d, Y  H:i:s');

                                        x = setInterval(function () {
                                            let now = new Date().getTime(),
                                                distance = countDown - now;
                                            document.getElementById('days').innerText = Math.floor(distance / (day)),
                                                document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                                                document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                                                document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second)
                                            //do something later when date is reached
                                            //if (distance < 0) {
                                            //  clearInterval(x);
                                            //  'IT'S MY BIRTHDAY!;
                                            //}
                                        }, second);
                                </script>
                            </div>
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

        <?php
    }

} ?>