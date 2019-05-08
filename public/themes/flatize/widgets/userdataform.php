<h2><?php tpe($data->title); ?></h2>
<div class="row">
    <div class="col-sm-7 animation">
        <div class="contact-content">
            <div class="alert alert-warning hidden" id="formfeedback"></div>

            <form id="<?php echo $data->id; ?>" action="<?php echo $data->action; ?>" method="<?php echo $data->method; ?>" autocomplete="<?php echo $data->autocomplete; ?>">
                <input type="text" id="usr" name="usr" style="display:none;"/>
                <input type="password" id="pwd" name="pwd" style="display:none;"/>
                <input type="hidden" id="presets" value='<?php echo $presets; ?>' />
                <input type="hidden" id="errors" value='<?php echo $errors; ?>' />
                <input type="hidden" id="outcome" value='<?php echo $outcome; ?>' />
                <input type="hidden" name="widgetAddress" value="userAccountData.userPersonalData" />
                <input type="hidden" id="id" name="user.id" value="" />

                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6">
                            <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                            {{ FormInput.default.registerName }}
                        </div>
                        <div class="col-xs-6">
                            <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                            {{ FormInput.default.registerSurname }}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6">
                            <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                            {{ FormInput.default.registerEmail }}
                        </div>
                        <div class="col-xs-6">
                            <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                            {{ FormInput.default.registerEmailConfirm }}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6">
                            <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                            {{ FormInput.default.registerBirthDate }}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6">
                            <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                            {{ FormRadio.default.registerGender }}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12">
                            <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                            {{ FormButton.default.editAccountData }}
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="col-sm-5 animation outcome">

    </div>
</div>