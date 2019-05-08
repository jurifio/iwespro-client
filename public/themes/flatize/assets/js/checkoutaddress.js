(function ($) {
    "use strict";
    //logger.enableLogger();
    var div1fiscalCodeElemSelector = '#div1addressFiscalCode';
    var div2fiscalCodeElemSelector = '#div2addressFiscalCode';
    var fname = $(this).closest("form").attr('id');


    var fiscalCodeElemSelector = '#fiscalCode';
    var fiscalCheckboxSelector = '#userAddress\\.isBilling';
    var sameAddressSelector = '#sameAddress';
    var primaryAddressBox = $('#primaryAddress');
    //var hasInvoice = $('#userAddress.hasInvoice');
    var hasInvoice=1;

    var primaryAddressForm = primaryAddressBox.find('form');
    var secondaryAddressBox = $('#secondaryAddress');

    var secondaryAddressForm = secondaryAddressBox.find('form');
    primaryAddressBox.find(div1fiscalCodeElemSelector).hide();
    secondaryAddressForm.find(div2fiscalCodeElemSelector).hide();
    $(fiscalCheckboxSelector).prop( "checked", false );
    $(sameAddressSelector).prop("checked", true);


    $(document).on('change', "#sameAddress, " + fiscalCheckboxSelector, function () {
        if ($(sameAddressSelector).is(':checked')) {
            secondaryAddressBox.hide();
            if ($(fiscalCheckboxSelector).is(':checked')) {
                primaryAddressBox.find(div1fiscalCodeElemSelector).show();
                primaryAddressForm.find(fiscalCodeElemSelector).attr('required', 'required').attr('pattern', '.+');
               // hasInvoice.val(1);
                hasInvoice=1;
            } else {
                primaryAddressBox.find(div1fiscalCodeElemSelector).hide();
                primaryAddressForm.find(fiscalCodeElemSelector).attr('required', false).attr('pattern', '.*');
                // hasInvoice.val(null);
                hasInvoice=0;
            }
        } else {
            secondaryAddressBox.show();
            primaryAddressForm.find(fiscalCodeElemSelector).attr('required', false).attr('pattern', '.*');
            if ($(fiscalCheckboxSelector).is(':checked')) {
                primaryAddressBox.find(div1fiscalCodeElemSelector).hide();
                secondaryAddressBox.find(div2fiscalCodeElemSelector).show();
                secondaryAddressForm.find(fiscalCodeElemSelector).attr('required', 'required').attr('pattern', '.+');
                //hasInvoice.val(1);
                   hasInvoice=1;
            } else {
                secondaryAddressForm.find(fiscalCodeElemSelector).attr('required', false).attr('pattern', '.*');
                primaryAddressBox.find(div1fiscalCodeElemSelector).hide();
                secondaryAddressForm.find(div2fiscalCodeElemSelector).hide();
                //hasInvoice.val(null);
                hasInvoice=0;

            }
        }
    });

    $(document).ready(function () {
        var addresses = JSON.parse($('#existingAddress').html());

        var length = Object.keys(addresses).length;
        if (length === 0) return;
        if (length > 0) {
            var firstAddress = addresses[0];
            primaryAddressForm.find('input[name], select[name]').each(function () {
                var name = $(this).attr('name').split('.')[1];
                if (firstAddress.hasOwnProperty(name)) $(this).val(firstAddress[name]);
            });

            if (firstAddress.isBilling === 1) {
                primaryAddressForm.find(fiscalCodeElemSelector).attr('required', 'required').attr('pattern', '.+');
                $(fiscalCheckboxSelector).attr('checked', 'checked');
            }

            if (length > 1 && addresses[1].id != firstAddress.id) {
                var secondAddress = addresses[1];

                secondaryAddressForm.find('input[name], select[name]').each(function () {
                    var name = $(this).attr('name').split('.')[1];
                    if (secondAddress.hasOwnProperty(name)) $(this).val(secondAddress[name]);
                });
                if (secondAddress.isBilling === 1) $(fiscalCheckboxSelector).attr('checked', 'checked');

                $(sameAddressSelector).trigger('click');
            }
        }

    });

    $( "input[name='userAddress.name']" ).on('change',function(){
        $('#checkname').remove();

        if ($( "input[name='userAddress.name']" ).val().length >2){
            if(fname=='primaryAddressForm') {
                $('<div id="checkname"><i class="fa fa-check"></i></div>')
                    .insertAfter($(this));
            }
        }else{
            if(fname=='primaryAddressForm') {
                $('<div id="checkname"><i class="fa fa-close red"></i></div>')
                    .insertAfter($(this));
            }
        }
    });
    $( "input[name='userAddress.name']" ).on('blur',function(){
        $('#checkname').remove();
        if ($( "input[name='userAddress.name']" ).val().length >2){
            $('<div id="checkname"><i class="fa fa-check"></i></div>')
                .insertAfter($(this));
        }else{
            $('<div id="checkname"><i class="fa fa-close red"></i></div>')
                .insertAfter($(this));
        }
    });
    $( "input[name='userAddress.surname']" ).on('change',function(){
        $('#checksurname').remove();
        if ($( "input[name='userAddress.surname']" ).val().length >2){
            $('<div id="checksurname"><i class="fa fa-check"></i></div>')
                .insertAfter($(this));
        }else{
            $('<div id="checksurname"><i class="fa fa-close red"></i></div>')
                .insertAfter($(this));
        }
    });
    $( "input[name='userAddress.surname']" ).on('blur',function(){
        $('#checksurname').remove();
        if ($( "input[name='userAddress.surname']" ).val().length >2){
            $('<div id="checksurname"><i class="fa fa-check"></i></div>')
                .insertAfter($(this));
        }else{
            $('<div id="checksurname"><i class="fa fa-close red"></i></div>')
                .insertAfter($(this));
        }
    });
    $( "input[name='userAddress.phone']" ).on('change',function(){
        $('#checkphone').remove();
        if ($( "input[name='userAddress.phone']" ).val().length >8){
            $('<div id="checkphone"><i class="fa fa-check"></i></div>')
                .insertAfter($(this));
        }else{
            $('<div id="checkphone"><i class="fa fa-close red"></i></div>')
                .insertAfter($(this));
        }
    });
    $( "input[name='userAddress.phone']" ).on('blur',function(){
        $('#checkphone').remove();
        if ($( "input[name='userAddress.phone']" ).val().length >8){
            $('<div id="checkphone"><i class="fa fa-check"></i></div>')
                .insertAfter($(this));
        }else{
            $('<div id="checkphone"><i class="fa fa-close red"></i></div>')
                .insertAfter($(this));
        }
    });
    $( "input[name='userAddress.address']" ).on('change',function(){
        $('#checkaddress').remove();
        if ($( "input[name='userAddress.address']" ).val().length >0){
            $('<div id="checkaddress"><i class="fa fa-check"></i></div>')
                .insertAfter($(this));
        }else{
            $('<div id="checkaddress"><i class="fa fa-close red"></i></div>')
                .insertAfter($(this));
        }
    });
    $( "input[name='userAddress.address']" ).on('blur',function(){
        $('#checkaddress').remove();
        if ($( "input[name='userAddress.address']" ).val().length >0){
            $('<div id="checkaddress"><i class="fa fa-check"></i></div>')
                .insertAfter($(this));
        }else{
            $('<div id="checkaddress"><i class="fa fa-close red"></i></div>')
                .insertAfter($(this));
        }
    });
    $( "input[name='userAddress.city']" ).on('change',function(){
        $('#checkcity').remove();
        if ($( "input[name='userAddress.city']" ).val().length >0){
            $('<div id="checkcity"><i class="fa fa-check"></i></div>')
                .insertAfter($(this));
        }else{
            $('<div id="checkcity"><i class="fa fa-close red"></i></div>')
                .insertAfter($(this));
        }
    });
    $( "input[name='userAddress.city']" ).on('blur',function(){
        $('#checkcity').remove();
        if ($( "input[name='userAddress.city']" ).val().length >0){
            $('<div id="checkcity"><i class="fa fa-check"></i></div>')
                .insertAfter($(this));
        }else{
            $('<div id="checkcity"><i class="fa fa-close red"></i></div>')
                .insertAfter($(this));
        }
    });
    $( "input[name='userAddress.postcode']" ).on('change',function(){
        $('#checkpostcode').remove();
        if ($( "input[name='userAddress.postcode']" ).val().length <9){
            $('<div id="checkpostcode"><i class="fa fa-check"></i></div>')
                .insertAfter($(this));
        }else{
            $('<div id="checkpostcode"><i class="fa fa-close red"></i></div>')
                .insertAfter($(this));
        }
    });
    $( "input[name='userAddress.postcode']" ).on('blur',function(){
        $('#checkpostcode').remove();
        if ( $( "input[name='userAddress.postcode']" ).val().length <9){
            $('<div id="checkpostcode"><i class="fa fa-check"></i></div>')
                .insertAfter($(this));
        }else{
            $('<div id="checkpostcode"><i class="fa fa-close red"></i></div>')
                .insertAfter($(this));
        }
    });
    $( "input[name='userAddress.selectCountry']" ).on('change',function(){
        $('#checkselectCountry').remove();
        if ($( "input[name='userAddress.selectCountry']" ).val().length >0){
            $('<div id="checkselectCountry"><i class="fa fa-check"></i></div>')
                .insertAfter($(this));
        }else{
            $('<div id="checkselectCountry"><i class="fa fa-close red"></i></div>')
                .insertAfter($(this));
        }
    });
    $( "input[name='userAddress.selectCountry']" ).on('blur',function(){
        $('#checkselectCountry').remove();
        if ($( "input[name='userAddress.selectCountry']" ).val().length >0){
            $('<div id="checkselectCountry"><i class="fa fa-check"></i></div>')
                .insertAfter($(this));
        }else{
            $('<div id="checkselectCountry"><i class="fa fa-close red"></i></div>')
                .insertAfter($(this));
        }
    });
    $( "input[name='userAddress.province']" ).on('change',function(){
        $('#checkprovince').remove();
        if ($( "input[name='userAddress.province']" ).val().length >0){
            $('<div id="checkprovince"><i class="fa fa-check"></i></div>')
                .insertAfter($(this));
        }else{
            $('<div id="checkprovince"><i class="fa fa-close red"></i></div>')
                .insertAfter($(this));
        }
    });
    $( "input[name='userAddress.province']" ).on('blur',function(){
        $('#checkprovince').remove();
        if ($('#province').val().length >0){
            $('<div id="checkprovince"><i class="fa fa-check"></i></div>')
                .insertAfter($(this));
        }else{
            $('<div id="checkprovince"><i class="fa fa-close red"></i></div>')
                .insertAfter($(this));
        }
    });



    $.waitLibraries('jQuery.validator').done(function () {

        jQuery.validator.addMethod("pattern", function (value, element) {
            // allow any non-whitespace characters as the host part
            return this.optional(element) && $(element).attr('pattern').length === 0 || $(element).attr('pattern') === "" || (new RegExp($(element).attr('pattern'), "i")).test(value);
        }, 'Wrong Pattern');
    });

    var eventFired = false;
    $(document).on('click', "#goCheckout", function (e) {
        var countryId=$('#countryId').val();
        if(!eventFired) {
            eventFired = true;
            e.preventDefault();
            var href = e.target.href;

            var sameAddress = $(sameAddressSelector).is(':checked');
            var primaryAddress = null;
            var secondaryAddress = null;
            if (sameAddress) {
                if (primaryAddressForm.valid()) {
                    primaryAddress = primaryAddressForm.serializeObject();
                    if ($(fiscalCheckboxSelector).is(':checked')) {
                        primaryAddress['userAddress.isBilling'] = 1;
                  //      hasInvoice.val(1);
                        hasInvoice=1;
                    }else{
                        primaryAddress['userAddress.isBilling']=1;
                        //hasInvoice.val(null);
                        hasInvoice=0;
                    }
                } else {
                    primaryAddressForm.validate();
                    return false;
                }
            } else {
                if (primaryAddressForm.valid() && secondaryAddressForm.valid()) {
                    primaryAddress = primaryAddressForm.serializeObject();
                    secondaryAddress = secondaryAddressForm.serializeObject();
                    if ($(fiscalCheckboxSelector).is(':checked')) {
                        secondaryAddress['userAddress.isBilling'] = 1;
                        primaryAddress['userAddress.isBilling'] = 0;
                        //hasInvoice.val(1);
                        hasInvoice=1;
                    }else{
                        secondaryAddress['userAddress.isBilling'] = 1;
                        primaryAddress['userAddress.isBilling'] = 0;
                        //hasInvoice.val(0)
                        hasInvoice=0;
                    }
                } else {
                    primaryAddressForm.validate();
                    secondaryAddressForm.validate();
                    return false;
                }
            }

            var a = $(e.target).closest('a');
            a.find('i').removeClass('fa-hand-o-right').addClass('fa-spinner fa-spin');
            a.attr('disabled', 'disabled');

            $.ajax({
                type: "PUT",
                url: "/xhr/it/AddressForm",
                data: {
                    widgetAddress: "checkout.default",
                    primaryAddress: primaryAddress,
                    secondaryAddress: secondaryAddress,
                    hasInvoice:hasInvoice,
                    countryId:countryId
                }
            }).done(function () {
                e.target.click();
                //window.location.href = href;
            }).fail(function () {
                a.attr('disabled', false);
                a.find('i').removeClass('fa-spinner fa-spin').addClass('fa-hand-o-right');
            });
        }
    });


})(jQuery);