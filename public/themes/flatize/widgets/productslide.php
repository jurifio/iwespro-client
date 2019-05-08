<h2 class="title"><span><?php tpe($data->title); ?></span></h2>
<div class="row">
    <div id="owl-product-slide" class="owl-carousel product-slide">
        <?php foreach ($data->multi as $product):

            $prices = [];
            $salePrices = [];
            $pricesAreOnARange = false;
            $sale = $product->isOnSale();
            /** @var \bamboo\domain\entities\CProduct $product */
            foreach ($product->productPublicSku as $sku) {
                if ($sku->stockQty < 1) continue;
                $prices[] = $sku->price;
                $salePrices[] = $sku->salePrice;
            }
            sort($prices);
            if (empty($prices)) continue;
            if (!(array_sum($prices) / count($prices)) == $prices[0]) {
                $pricesAreOnARange = true;
            }
            if ($sale && !(array_sum($salePrices) / count($salePrices)) == $salePrices[0]) {
                $pricesAreOnARange = false;
            } ?>

            <div class="col-md-12">
                <div class="item product">
                    <div class="product-thumb-info">
                        <div class="product-thumb-info-image">
                            <figure class="animation animated fadeInUp img-holder">
                                <a href="<?php echo $app->productUrl($product); ?>">
                                    <img alt=""
                                         class="img-responsive"
                                         src="/<?php echo $app->lang(); ?>/assets/xhttp-loader-icon.gif"
                                         data-src="<?php echo $app->image($product->getPhoto(1, 562), 'amazon') ?>">

                                </a>
                            </figure>
                        </div>
                        <div class="product-thumb-info-content">
                            <h4>
                                <a href="<?php echo $app->productUrl($product); ?>"><?php echo $product->productBrand->name; ?></a>
                            </h4>
                            <span class="item-cat"><small><a
                                        href="#"><?php echo $product->productCategoryTranslation->findOneByKey('id', $app->lang()); ?></a></small></span>
                            <?php if ($pricesAreOnARange == true): ?>
                                <?php if ($sale > 0): ?>
                                    <span class="oldprice"><?php echo $salePrices[0]; ?> &euro;
                                        - <?php echo $salePrices[count($salePrices) - 1]; ?> &euro;</span>&ensp;
                                    <span class="saleprice"><?php echo $salePrices[0]; ?> &euro;
                                        - <?php echo $salePrices[count($salePrices) - 1]; ?> &euro;</span>
                                <?php else: ?>
                                    <span class="price"><?php echo $prices[0]; ?> &euro;
                                        - <?php echo $prices[count($prices) - 1]; ?> &euro;</span>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if ($sale > 0): ?>
                                    <span class="oldprice"><?php echo $prices[0]; ?> &euro;</span>&ensp;
                                    <span class="saleprice"><?php echo $salePrices[0]; ?> &euro;</span>
                                <?php else: ?>
                                    <span class="price"><?php echo $prices[0]; ?> &euro;</span>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if ($pricesAreOnARange == true): ?>
                                <span class="price-notice"><?php echo $data->variablePriceBySize; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script type="application/javascript">
    $('#owl-product-slide').owlCarousel({
        items: 5,
        itemsMobile: [479, 2],
        navigation: true,
        navigationText: ["<i class=\"fa fa-chevron-circle-left\"></i>", "<i class=\"fa fa-chevron-circle-right\"></i>"],
        pagination: false
    });
</script>