<div class="container">
    <div class="row">
        <div class="col-sm-7 animation">
            <div class="contact-content">

                <div class="alert alert-warning hidden" id="formfeedback"></div>

                <form id="<?php echo $data->id; ?>" action="<?php echo $data->action; ?>" method="<?php echo $data->method; ?>" autocomplete="<?php echo $data->autocomplete; ?>">
                    <input type="text" id="usr" name="usr" style="display:none;"/>
                    <input type="password" id="pwd" name="pwd" style="display:none;"/>
                    <input type="hidden" id="presets" value='<?php echo $presets; ?>' />
                    <input type="hidden" id="errors" value='<?php echo $errors; ?>' />

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                                {{ FormInput.default.registerName }}
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                                {{ FormInput.default.registerSurname }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                                {{ FormInput.default.registerEmail }}
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                                {{ FormInput.default.registerEmailConfirm }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                                {{ FormDate.default.birthday }}
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                                {{ FormInput.default.registerPassword }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                                {{ FormRadio.default.registerGender }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                                {{ FormLegal.default.register }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                                {{ FormButton.default.registerSubmit }}
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="col-sm-5 animation">
            <div class="contact-content">
                <img src="/it/assets/registrati.jpg" class="img-responsive" />
                <!--<h4>Accedi con Facebook</h4>
                <p>Puoi decidere di accedere con il tuo profilo Facebook per evitare la compilazione del form di registrazione.</p>
                <img src="<?php echo $app->image('fb_login.png'); ?>" />-->
            </div>
        </div>
    </div>
</div>