<!-- Existing address list -->
<div class="featured-box featured-box-secondary featured-box-cart floating-gray-box">
    <div class="box-content" id="primaryAddress">
        <div class="row">
            <div class="col-xs-12">
                <h4><?php tpe($data->title); ?></h4>
            </div>
        </div>
        <div class="row">
            <div id="existingAddress" style="display: none"><?php echo htmlentities(json_encode($data->multi))?></div>
            <form id="primaryAddressForm" class="col-xs-12">
                <input type="hidden" name="userAddress.id" value="">
                <!--<input type="hidden" name="userAddress.hasInvoice" value="">-->
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            {{ FormInput.default.addressName }}
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            {{ FormInput.default.addressSurname }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            {{ FormInput.default.addressCompany }}
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            {{ FormInput.default.addressPhone }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12">
                            {{ FormInput.default.addressAddress }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12">
                            {{ FormInput.default.addressExtra }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            {{ FormInput.default.addressPostCode }}
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            {{ FormSelect.default.country }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-7">
                            {{ FormInput.default.addressCity }}
                        </div>
                        <div class="col-xs-5">
                            {{ FormInput.default.addressProvince }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12" id="div1addressFiscalCode">
                            {{ FormInput.default.addressFiscalCode }}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-8">
            <input id="sameAddress" type="checkbox" checked="checked">
            <label for="sameAddress"
                   style="border-bottom: 2px solid black; margin: 0 0 20px;"><?php tpe("L'indirizzo di fatturazione coincide con quello di spedizione") ?></label>
        </div>
        <div class="col-xs-4 pull-right">
            <input id="userAddress.isBilling" type="checkbox" value="1">
            <label for="userAddress.isBilling"
                   style="border-bottom: 2px solid black; margin: 0 0 20px;"><?php tpe('Richiedi Fattura') ?></label>


        </div>

    </div>
    <div class="box-content" id="secondaryAddress" style="display: none"  >
        <div class="row">
            <div class="col-xs-12">
                <h4><?php tpe("L'ordine verrà fatturato a"); ?></h4>
            </div>
        </div>
        <div class="row">
            <form id="secondaryAddressForm" action="#" method="post" class="col-xs-12">
                <input type="hidden" name="userAddress.isBilling" value="1">
                <input type="hidden" name="userAddress.id" value="">
                <input type="hidden" name="userAddress.hasInvoice" value="">
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            {{ FormInput.default.addressName }}
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            {{ FormInput.default.addressSurname }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            {{ FormInput.default.addressCompany }}
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            {{ FormInput.default.addressPhone }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12">
                            {{ FormInput.default.addressAddress }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12">
                            {{ FormInput.default.addressExtra }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            {{ FormInput.default.addressPostCode }}
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            {{ FormSelect.default.country }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-7">
                            {{ FormInput.default.addressCity }}
                        </div>
                        <div class="col-xs-5">
                            {{ FormInput.default.addressProvince }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12" id="div2addressFiscalCode">
                            {{ FormInput.default.addressFiscalCode }}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>