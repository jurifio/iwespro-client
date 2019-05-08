<div class="container">
    <div class="row">
        <div class="col-sm-6 animation">
            <div class="contact-content">

                <div class="alert alert-warning hidden" id="formfeedback"></div>

                <form id="<?php echo $data->id; ?>" action="<?php echo $data->action; ?>"
                      method="<?php echo $data->method; ?>">
                    <input type="hidden" id="presets" value='<?php echo $presets; ?>'/>
                    <input type="hidden" id="errors" value='<?php echo $errors; ?>'/>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                {{ FormInput.default.loginName }}
                            </div>
                            <div class="col-xs-6">
                                {{ FormInput.default.loginPassword }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                {{ FormCheckbox.default.loginRememberMe }}
                            </div>
                            <div class="col-xs-6">
                                <div class="checkbox">
                                    <a href="<?php echo $app->baseUrlLang() . '/recoverPassword'; ?>"><?php tpe($data->forgotPassword) ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Accedi" class="btn btn-primary" data-loading-text="Loading...">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-6 animation">
            <div class="row">
                <div class="col-sm-12">
                    {{ FacebookLogin.default.default }}
                </div>
                <div class="col-sm-12">
                    <div class="contact-content">
                        <h4><?php echo $data->notRegistered ?></h4>
                        <p><?php echo $data->registerNow ?></p>
                        <a class="btn btn-primary" href="./registrazione"><?php tpe($data->registerButton) ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>