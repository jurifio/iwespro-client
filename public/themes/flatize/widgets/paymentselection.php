<div class="featured-box featured-box-secondary sidebar floating-gray-box">
    <div class="box-content">
        <h4><?php tpe($data->title); ?></h4>
        <div class="panel-group panel-group2">
            <?php foreach($data->multi as $val): ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title">
                        <label for="radio<?php echo $val->id; ?>">
                            <input style=" margin: 0px 5px 0;
    margin-top: 1px \9; // IE8-9
line-height: normal;" <?php echo isset($paymentMethod) && $paymentMethod == $val->id ? 'checked="checked"' : '' ?> data-step="paymentMethod" data-address="checkout.default" value="<?php echo $val->id?>" data-action="<?php echo $app->baseUrl().'/xhr/'.$app->lang().'/PaymentSelection'?>" type="radio" id="radio<?php echo $val->id; ?>" name="radioPay">
                            <a data-toggle="collapse" data-num="<?php echo $val->id ?>" data-parent="#accordion" href="#collapse<?php echo $val->id ?>"><i class="fa <?php
                                echo $data->{$val->name}->icon ?>"></i> <?php tpe($data->{$val->name}->name) ?></a>
                        </label>
                    </h5>
                </div>
                <div class="panel-collapse collapse in">
                    <div class="panel-body">
                        <p><?php tpe($data->{$val->name}->description) ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>