<address>
    <i class="fa <?php echo $data->phoneIconCss; ?>"></i> <?php echo "tel" ?>. <?php echo $data->phone; ?><br>
    <i class="fa <?php echo $data->faxIconCss; ?>"></i> <?php echo "mob" ?>. <?php echo $data->fax; ?><br>
    <i class="fa <?php echo $data->emailIconCss; ?>"></i> <?php echo "email" ?>. <a href="mailto:<?php echo $data->email; ?>"><?php echo $data->email; ?></a>
</address>