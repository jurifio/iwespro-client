<?php
$skus = [];
$prices = [];

// <img src="https://stats.ps.stylight.net/track/c51360d/sl?skus=0000|1111&oi=o1001&ta=123&c=EUR&ic=2" style="position:absolute; visibility:hidden">
$linkSkuStylight="";
$totalPrice=0;
$propertyIdIT='a2830242c5bd5ce453bc90b125d8a08b';
$propertyIdGB='acbbc6c18465a880b8699bfd4af9ef36';
$propertyIdDE='f8cc26efd85160afaf9c6708c771460a';
$propertyIdAU='4c5f0fac33204a43ff77b45597d06214';
$orderId='';


//TODO TRANSFER TO GOOGLE TAG MANAGER
try {
    foreach($data->entity->orderLine as $orderline){
        $skus[] = "'".$orderline->productId.'-'.$orderline->productVariantId."'";
        $prices[] = $orderline->netPrice;
        $totalPrice+= $orderline->netPrice;
        $linkSkuStylight=$orderline->productId.'-'.$orderline->productVariantId.'|';
        $orderId=$orderline->orderId;


    }

    $countItem=count($skus);
    $skuStylight = substr($linkSkuStylight, 0, strlen($linkSkuStylight)-1);
    echo '<img src="https://stats.ps.stylight.net/track/'.$propertyIdIT.'/sl?skus='.$skuStylight.'&oi='.$orderId.'&ta='.$totalPrice.'&c=EUR&ic='.$countItem.'" style="position:absolute; visibility:hidden">';
    ?>


    <!-- trade tracker -->
    <script type="text/javascript">
        var ttConversionOptions = ttConversionOptions || [];
        ttConversionOptions.push({
            type: 'sales',
            campaignID: '23321',
            productID: '34091',
            transactionID: '<?php echo $data->entity->id ?>',
            transactionAmount: '<?php echo $data->entity->netTotal - $data->entity->shippingPrice - $data->entity->vat  ?>',
            quantity: '1',
            email: '',
            descrMerchant: '',
            descrAffiliate: '',
            currency: ''
        });
    </script>
    <noscript>
        <img src="//ts.tradetracker.net/?cid=23321&amp;pid=34091&amp;tid=<?php echo $data->entity->id ?>&amp;tam=<?php echo $data->entity->netTotal ?>&amp;data=&amp;qty=1&amp;eml=&amp;descrMerchant=&amp;descrAffiliate=&amp;event=sales&amp;currency=EUR" alt="" />
    </noscript>
    <script type="text/javascript">
        (function(ttConversionOptions) {
            var campaignID = 'campaignID' in ttConversionOptions ? ttConversionOptions.campaignID : ('length' in ttConversionOptions && ttConversionOptions.length ? ttConversionOptions[0].campaignID : null);
            var tt = document.createElement('script'); tt.type = 'text/javascript'; tt.async = true; tt.src = '//tm.tradetracker.net/conversion?s=' + encodeURIComponent(campaignID) + '&t=m';
            var s = document.getElementsByTagName('script'); s = s[s.length - 1]; s.parentNode.insertBefore(tt, s);
        })(ttConversionOptions);
    </script>

    <script type="text/javascript">
        var vmt_pi = {
            'trackingId'        : '<?php echo $data->trackingId ?>',
            'type'             : '<?php echo $data->type ?>',
            'amount'        : <?php echo $data->entity->netTotal ?>,
            'skus'             : [<?php echo implode(",",$skus); ?>],
            'prices'         : [<?php echo implode(",",$prices); ?>],
            'currency'        : '<?php echo $data->currency ?>'
        };
    </script>
    <script type="text/javascript">
        var vmt = {};
        (function(d, p) {
            var vmtr = d.createElement('script'); vmtr.type = 'text/javascript'; vmtr.async = true;
            vmtr.src = ('https:' == p ? 'https' : 'http') + '://www.shopalike.it/controller/visualMetaTrackingJs';
            var s = d.getElementsByTagName('script')[0]; s.parentNode.insertBefore(vmtr, s);
        })(document, document.location.protocol);
    </script>

<?php } catch(Exception $e) {} ?>