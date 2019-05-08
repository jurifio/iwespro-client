<!-- Existing address list -->
<div class="featured-box featured-box-secondary featured-box-cart floating-gray-box">
    <div class="box-content">
        <h4><?php echo $data->title; ?></h4>
        <div class="row">

            <?php foreach ($data->selectedAddress as $address): ?>
            <?php if (count($data->selectedAddress)==1) { $address->isBilling = 1; } ?>
            <a href="javascript:void(0);" class="changeaddress"
               data-toggle="modal"
               data-target=".addresslist"
               data-address-to-be-changed-id="<?php echo $address->id; ?>"
               data-address-to-be-changed-type="<?php echo ($address->isBilling == true) ? "b" : "s" ?>">

                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="zero-clipboard"><span class="btn-clipboard"><i class="fa fa-edit"></i></span></div>
                    <div class="address-card">
                        <p>
                            <span class="name"><?php echo $address->name; ?> <?php echo $address->surname; ?></span><br />
                            <span class="address"><?php echo $address->address; ?><br />
                            <?php echo $address->city; ?> (<?php echo $address->province; ?>) - <?php echo $address->country->name; ?></span><br />
                            <i class="fa fa-phone"></i> <span class="phone"><?php echo $address->phone; ?></span><br />
                            <?php if ($address->isBilling): ?>
                            <span class="billing"><i class="fa fa-clipboard"></i> <i><?php echo (count($data->selectedAddress) == 1) ? 'indirizzo di spedizione e fatturazione' : 'indirizzo di fatturazione' ;?></i></span>
                            <?php else: ?>
                            <span class="billing"><i class="fa fa-truck"></i> <i>indirizzo di spedizione</i></span>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>

            <?php if ((count($data->selectedAddress) == 1)): ?>
            <a href="javascript:void(0);" class="changeaddress"
               data-toggle="modal"
               data-target=".addresslist"
               data-address-to-be-changed-id="0"
               data-address-to-be-changed-type="s">

                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="zero-clipboard"><span class="btn-clipboard"><i class="fa fa-edit"></i></span></div>
                    <div class="address-card">
                        <p>
                            <span class="name">Spedizione diversa</span><br /><br /><span class="address">Caricalo dai tuoi indirizzi salvati <i class="fa fa-folder-open-o"></i></span><br /><br /><br /></span>
                        </p>
                    </div>
                </div>
            </a>
            <?php endif; ?>

            <?php if (count($data->selectedAddress) == 0 && count($data->multi) == 0): ?>
                <a href="javascript:void(0);" class="addnewaddress"
                   data-toggle="modal"
                   data-target=".addresses"
                   data-address-to-be-changed-id="0"
                   data-address-to-be-changed-type="b">

                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="zero-clipboard">
                            <span class="btn-clipboard"><i class="fa fa-envelope-o"></i></span>
                        </div>
                        <div class="address-card">
                            <p>
                                <span class="name">Nuovo Indirizzo</span><br /><br /><span class="address">Aggiungi <i class="fa fa-plus"></i><br /><br /></span>
                            </p>
                        </div>
                    </div>
                </a>
            <?php endif; ?>

            <?php if (count($data->selectedAddress) == 0 && count($data->multi) > 0): ?>

                <a href="javascript:void(0);" class="changeaddress"
                   data-toggle="modal"
                   data-target=".addresslist"
                   data-address-to-be-changed-id="0"
                   data-address-to-be-changed-type="b">

                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="zero-clipboard"><span class="btn-clipboard"><i class="fa fa-edit"></i></span></div>
                        <div class="address-card">
                            <p>
                                <span class="name">Scegli un indirizzo</span><br /><br /><span class="address">Caricalo dai tuoi indirizzi salvati <i class="fa fa-folder-open-o"></i></span><br /><br /></span>
                            </p>
                        </div>
                    </div>
                </a>

                <a href="javascript:void(0);" class="addnewaddress"
                   data-toggle="modal"
                   data-target=".addresses"
                   data-address-to-be-changed-id="0"
                   data-address-to-be-changed-type="b">

                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="zero-clipboard">
                            <span class="btn-clipboard"><i class="fa fa-envelope-o"></i></span>
                        </div>
                        <div class="address-card">
                            <p>
                                <span class="name">Nuovo Indirizzo</span><br /><br /><span class="address">Aggiungi <i class="fa fa-plus"></i><br /><br /></span>
                            </p>
                        </div>
                    </div>
                </a>

            <?php endif; ?>

        </div>
    </div>
</div>

<!-- Existing address list -->
<div class="modal fade featured-box featured-box-secondary featured-box-cart floating-gray-box addresslist addressmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="box-content">
        <h4><?php tpe($data->existingAddressLabel) ?> <button type="button" class="close close-modal-one" data-dismiss="modal">×</button></h4>
        <p><?php tpe('Fai clic per modificare un tuo indirizzo pre-esistente oppure aggiungine uno nuovo') ?></p>
        <div class="row">

            <?php foreach($data->multi as $address): ?>
            <a href="javascript:void(0);" class="change-to-this-address"
               data-address-id="<?php echo $address->id; ?>"
               data-action="<?php echo $app->baseUrl().'/xhr/'.$app->lang().'/AddressForm'?>"
               data-address="checkout.default"
               data-country-id="<?php echo $address->country->id; ?>">

               <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="zero-clipboard">
                        <span class="btn-clipboard"><i class="fa fa-envelope-o"></i></span>
                    </div>
                    <div class="address-card">
                        <p>
                            <span class="name"><?php echo $address->name; ?> <?php echo $address->surname; ?></span><br />
                            <span class="address"><?php echo $address->address; ?><br />
                            <?php echo $address->city; ?> (<?php echo $address->province; ?>) - <?php echo $address->country->name; ?></span><br />
                            <i class="fa fa-phone"></i> <span class="phone"><?php echo $address->phone; ?></span>
                        </p>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>

            <a href="javascript:void(0);" class="addnewaddress"
               data-toggle="modal"
               data-target=".addresses"
               data-address-to-be-changed-id="0"
               data-address-to-be-changed-type="b">

                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="zero-clipboard">
                        <span class="btn-clipboard"><i class="fa fa-envelope-o"></i></span>
                    </div>
                    <div class="address-card">
                        <p>
                            <span class="name">Nuovo Indirizzo</span><br /><br /><span class="address">Aggiungine uno nuovo <i class="fa fa-plus"></i><br /><br /></span>
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Add new address form -->
<div id="addresses" data-action="<?php echo $app->baseUrl().'/xhr/'.$app->lang().'/Form'?>" data-address="newaddress.newaddress" class="modal fade featured-box featured-box-secondary featured-box-cart floating-gray-box addresses" tabindex="-2" role="dialog" aria-hidden="true" style="display:none;max-width:650px;margin:10% auto;">
    <div class="row">
        <div class="col-sm-12">
            <img src="/it/assets/loader.gif" />
        </div>
    </div>
</div>