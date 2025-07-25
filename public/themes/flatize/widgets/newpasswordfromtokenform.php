<div class="container">
    <div class="row">
        <div class="col-sm-6 animation">
            <div class="contact-content">
                <div class="alert alert-warning hidden" id="formfeedback"></div>
                <form id="<?php echo $data->id; ?>" action="<?php echo $data->action; ?>" method="<?php echo $data->method; ?>" autocomplete="<?php echo $data->autocomplete; ?>">
                    <input type="hidden" id="presets" value='<?php echo $presets; ?>' />
                    <input type="hidden" id="errors" value='<?php echo $errors; ?>' />
                    <input type="hidden" id="token" name="userRegistrationToken_token">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                {{ FormInput.default.registerPassword }}
                                {{ FormInput.default.registerPasswordConfirm }}
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="submit" value="Modifica" class="btn btn-primary" data-loading-text="Loading...">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-6 animation">
            <div class="contact-content">
                <h4><?php echo $data->notRegistered ?></h4>
                <p><?php echo $data->registerNow ?></p>
                <a class="btn btn-primary" href="./registrazione"><?php echo $data->registerButton ?></a>
            </div>
        </div>
    </div>
</div>