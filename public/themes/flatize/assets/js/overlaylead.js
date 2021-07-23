/**
 * Revisioned by Juri Fiorani after Created by Fabrizio Marconi on 10/11/2015.
 */
$(document).ready(function () {
    let typeModal = $('#modalType').attr('data-typemodal');

    switch (typeModal){
        case 'showAll':
        case 'onlySubscription':
            setTimeout(function () {
                "use strict";
                var m = new Modal('#bsLeadModal');
                if(typeModal === 'showAll'){
                    m.blockModal();
                }
                m.show();
            }, 1000);
            break;
        case 'onlyCode':
            setTimeout(function () {
                "use strict";
                var m = new Modal('#bsLeadonlyCodeModal');
                m.show();
            }, 1000);
            break;
    }

});

$(document).on('click', '#coupongenerator', function () {
    let typeModal = $('#modalType').attr('data-typemodal');
    let m = null;
    switch (typeModal) {
        case 'showAll':
        case 'onlySubscription':
            m = new Modal('#bsLeadModal');
            m.show();
            break;
        case 'onlyCode':
            m = new Modal('#bsLeadonlyCodeModal');
            m.show();
            break;
    }
});

$(document).on('click', '.leadbutton', function () {

    let manShoes = $('.manshoes');
    let womanShoes = $('.womanshoes');

    switch ($(this).attr('id')){
        case 'manBtn':
            womanShoes.hide();
            manShoes.show();
            break;
        case 'womanBtn':
            manShoes.hide();
            womanShoes.show();
    }

});