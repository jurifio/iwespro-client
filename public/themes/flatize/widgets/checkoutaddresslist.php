<div class="featured-box featured-box-secondary featured-box-cart floating-gray-box addresslist">
    <div class="box-content">
        <h4><?php echo $data->existingAddressLabel ?> <button type="button" class="close close-modal-two" data-dismiss="modal">×</button></h4>
        <div class="row">
            <?php foreach($data->multi as $address): ?>
            <div class="col-xs-4 change-to-this-address" data-address-id="<?php echo $address->id; ?>">
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
            <?php endforeach; ?>
            <div class="col-xs-4 addnewaddress">
                <div class="zero-clipboard">
                    <span class="btn-clipboard"><i class="fa fa-envelope-o"></i></span>
                </div>
                <div class="address-card">
                    <p>
                        <span class="name">Nuovo Indirizzo</span><br /><br /><span class="address">Aggiungi <i class="fa fa-plus"></i></span><br /><br /></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>