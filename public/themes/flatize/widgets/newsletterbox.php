<div class="<?php echo $data->columnWidthCss ?>">
    <h2><?php tpe($data->title) ?></h2>
    <div id="newsletterSubscriptionOk" style="display:none">
        <?php tpe($data->success) ?>
    </div>
    <div id="newsletterSubscriptionKo" style="display:none">
        <?php tpe($data->fail) ?>
    </div>
    <div id="requestNewsletterBox">
        <p><?php tpe($data->text) ?></p>
        <form style="margin-left: 0; width: 100%; padding-left: 0;" id="newsletterbox-overly" name="newsletterbox"
              data-action="<?php echo $app->baseUrl() . '/xhr/' . $app->lang() . '/Newsletterbox' ?>"
              class="col-sm-offset-2 col-sm-8 form-inline form-newsletter-modal" role="form">
            <div class="form-group">
                <label class="sr-only" for="exampleInputEmail2">email</label>
                <input type="email" class="form-control" required="required"
                       name="newsletter_email" id="newsletter_email"
                       placeholder="<?php tpe($data->newsletterPlaceHolder) ?>"
                       style="margin-bottom: 5px">

                <input type="text" class="form-control" name="newsletter_name"
                       id="newsletter_name"
                       placeholder="<?php tpe($data->newsletterPlaceHolderName) ?>"
                       style="margin-bottom: 5px">

                <input type="text" class="form-control" name="newsletter_surname"
                       id="newsletter_surname"
                       placeholder="<?php tpe($data->newsletterPlaceHolderSurname) ?>"
                       style="margin-bottom: 5px">


                <input type="radio" id="male_news" class="form-control" name="newsletter_sex" style="width: 8%; margin-bottom: 0"
                       value="m"><label for="male_news">Maschio</label>
                <input type="radio" id="female_news" class="form-control" name="newsletter_sex" style="width: 8%; margin-bottom: 0"
                       value="f"><label for="female_news">Femmina</label>

            </div>
            <button style="color: black; position: relative; min-width: 100px" type="submit" class="btn btn_news">ISCRIVITI
            </button>
        </form>
    </div>
</div>