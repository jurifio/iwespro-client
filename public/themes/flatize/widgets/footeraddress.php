<div class="<?php echo $data->columnWidthCss; ?>">
    <meta itemprop="name" content="Pickyshop">
    <meta itemprop="url" content="<?php echo \Monkey::app()->baseUrl(false); ?>">
    <meta itemprop="logo" content="<?php echo \Monkey::app()->baseUrl(false); ?>/assets/logowide.png">
    <h2><?php tpe($data->title); ?></h2>
    <address itemprop="contactPoint" itemscope itemtype="http://schema.org/ContactPoint">

        <meta itemprop="contactType" content="customer service">
        <i class="fa <?php echo $data->phoneIconCss; ?>"></i> <?php echo "tel" ?>. <span itemprop="telephone"><?php echo $data->phone; ?></span><br>
        <i class="fa <?php echo $data->faxIconCss; ?>"></i> <?php echo "mob" ?>. <span itemprop="faxNumber"><?php echo $data->fax; ?></span><br>
        <i class="fa <?php echo $data->emailIconCss; ?>"></i> <?php echo "email" ?>. <a itemprop="email" href="mailto:<?php echo $data->email; ?>"><?php echo $data->email; ?></a>
    </address>
    <?php if(isset($data->specialMessage)): ?><span><?php tpe($data->specialMessage) ?></span><?php endif; ?>
</div>