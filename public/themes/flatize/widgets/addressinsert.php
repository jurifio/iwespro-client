<div class="box-content">
    <h4><?php tpe($data->title); ?> <button type="button" class="close close-modal-two" data-dismiss="modal">×</button></h4>
    <div class="alert alert-success hidden" id="contactsuccess"></div>
    <form id="<?php echo $data->id; ?>" action="<?php echo $app->baseUrl().'/xhr/'.$app->lang().'/'.$data->action; ?>" method="<?php echo $data->method; ?>" autocomplete="<?php echo $data->autocomplete; ?>">
        <input type="hidden" id="widgetAddress" name="widgetAddress" value="<?php echo $data->widgetDataAddress; ?>"/>
        <input type="hidden" name="userAddress.lastUsed" value="1" />
        <input type="hidden" id="isBilling" name="userAddress.isBilling" value="1" />
        <input type="hidden" id="presets" value='<?php echo $presets; ?>' />
        <input type="hidden" id="errors" value='<?php echo $errors; ?>' />
        <div class="form-group">
            <div class="row">
                <div class="col-xs-6">
                    <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                    {{ FormInput.default.addressName }}
                </div>
                <div class="col-xs-6">
                    <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                    {{ FormInput.default.addressSurname }}
                </div>
            </div>

        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-6">
                    <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                    {{ FormInput.default.addressCompany }}
                </div>
                <div class="col-xs-6">
                    <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                    {{ FormInput.default.addressPhone }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-12">
                    <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                    {{ FormInput.default.addressAddress }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-12">
                    <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                    {{ FormInput.default.addressExtra }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-6">
                    <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                    {{ FormInput.default.addressPostCode }}
                </div>
                <div class="col-xs-6">
                    <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                    {{ FormSelect.default.country }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-12">
                    <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                    {{ FormInput.default.addressProvince }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-12">
                    <a data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="" tabindex="-1"></a>
                    {{ FormInput.default.addressCity }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div id="submitButton" class="col-xs-12">
                    {{ FormButton.default.addressSubmit }}
                </div>
            </div>
        </div>
    </form>
</div>