<?php
/**
 * @var $app CWidgetHelper
 * @var $data CWidgetDatabag
 */

use bamboo\core\theming\CWidgetDataBag;
use bamboo\core\theming\CWidgetHelper;

/** @var \bamboo\domain\entities\CProduct $product */
$product = $data->entity;
$prices = [];
$salePrices = [];
$pricesAreOnARange = false;
$sale = $product->isOnSale();
$present = false;
foreach ($product->productPublicSku as $sku) {
    if ($sku->stockQty < 1) continue;
    $present = true;
    $prices[] = $sku->price;
    $salePrices[] = $sku->salePrice;
}
sort($prices);
if ($present && !(array_sum($prices) / count($prices)) == $prices[0]) {
    $pricesAreOnARange = true;
} else if ($present && $sale && !(array_sum($salePrices) / count($salePrices)) == $salePrices[0]) {
    $pricesAreOnARange = false;
} else {
    $pricesAreOnARange = false;
    $prices[] = $data->entity->shopHasProduct->getFirst()->price;
    $salePrices[] = $data->entity->shopHasProduct->getFirst()->salePrice;
}

/** Metatada preparation */
$verboseCategory = $product->getLocalizedProductCategories();
$productName = $product->getName();
$productCpf = $product->printCpf(' ');
$productUrl = $app->productUrl($product);
?>

<div id="productSummary" class="summary entry-summary" itemscope itemtype="http://schema.org/Product"
     data-id="<?php echo $data->entity->printId() ?>"
     data-name="<?php echo $productName ?>"
     data-list="<?php echo 'detail'; ?>"
     data-brand="<?php echo $data->entity->productBrand->name; ?>"
     data-category="<?php echo $verboseCategory ?>"
     data-variant="<?php echo $data->entity->productVariant->name ?>"
     data-price="<?php echo $prices[0]; ?>"
>

    <meta itemprop="category" content="<?php echo $verboseCategory ?>"/>
    <meta itemprop="mpn" content="<?php echo $productCpf ?>"/>
    <meta itemprop="image" content="<?php echo $app->image($data->entity->getPhoto(1, \bamboo\domain\entities\CProductPhoto::SIZE_BIG),'amazon', false) ?>"/>
    <meta itemprop="name" content="<?php echo $productName ?>"/>
    <meta itemprop="url" content="<?php echo $productUrl ?>"/>
    <meta itemprop="mainEntityOfPage" content="<?php echo $productUrl ?>"/>
    <meta itemprop="color" content="<?php echo $data->entity->productColorGroup->getLocalizedName() ?>"/>


    <h4><a href="<?php echo $app->baseUrlLang().'/'.$data->entity->productBrand->slug.'-b'.$data->entity->productBrandId ?>" ><strong><?php echo $data->entity->productBrand->name ?></strong></a></h4>
    <h5><?php echo $data->entity->getName(); ?></h5>

    <h6><?php echo $data->entity->productVariant->name. (!empty($data->entity->productVariant->description) ? ' - '.$data->entity->productVariant->description : "").' - '.$data->entity->productColorGroup->getLocalizedName() ?></h6>
    <div id="priceBox">
        <?php if ($pricesAreOnARange == true): ?>
            <?php if ($sale > 0): ?>
                <span class="fullprice oldprice"><?php echo $salePrices[0]; ?> &euro;
                - <?php echo $salePrices[count($salePrices) - 1]; ?> &euro;</span>&ensp;
                <span class="screensale actualprice saleprice"><?php echo $salePrices[0]; ?> &euro;
                - <?php echo $salePrices[count($salePrices) - 1]; ?> &euro;</span>
            <?php else: ?>
                <span class="fullprice actualprice price"><?php echo $prices[0]; ?> &euro;
                - <?php echo $prices[count($prices) - 1]; ?> &euro;</span>
            <?php endif; ?>
        <?php else: ?>
            <?php if ($sale > 0): ?>
                <span style="display:inline" class="fullprice oldprice"><?php echo $prices[0]; ?> &euro;</span>&ensp;
                <span style="display:inline" class="screenprice actualprice saleprice"><?php echo $salePrices[0]; ?> &euro;</span>
            <?php else: ?>
                <span class="fullprice actualprice price"><?php echo $prices[0]; ?> &euro;</span>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <h5 class="product-code">
        <span class="label"><?php tpe('Pickyshop ID:');?> </span>
        <span class="code"><?php echo $data->entity->printId(); ?></span>
    </h5>

    {{ AddToCartBox.detail.default }}

    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        <span><?php tpe($data->descrLabel); ?></span>
                        <span class="accordion-symbol">+</span>
                    </a></h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                    <div itemprop="description" style="margin-bottom: 10px;">
                        <?php echo $data->entity->getDescription() ?>
                    </div>
                    <ul class="list-unstyled product-meta">
                        <li><?php tpe('Pickyshop ID'); ?>: <?php echo $data->entity->printId(); ?></li>
                        <li><?php tpe($data->brandStyleId); ?>: <?php echo $data->entity->itemno; ?></li>
                        <li><?php tpe($data->brandStyleColor); ?>: <?php echo $data->entity->productVariant->name; ?></li>
                        <li><?php tpe($data->colorDescription); ?>: <?php echo $data->entity->productVariant->description; ?></li>
                        <li><?php tpe($data->categoryLabel); ?>: {{ Categorypath.detail.default }}</li>
                        <li><i class="fa fa-tags"></i> <?php tpe($data->tagLabel); ?>:
                            <?php foreach($data->entity->tag as $tag):
                                if($tag->isPublic == 0) continue; ?>
                                <a href="#"><?php echo $tag->getLocalizedName() ?></a>
                            <?php endforeach; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseTwo">
                        <span><?php tpe($data->detailLabel); ?></span>
                        <span class="accordion-symbol">+</span>
                    </a></h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in">
                <div class="panel-body">
                    <?php foreach ($data->entity->getOrderedProductDetails() as $detail):
                        $isLabel = (strpos($detail->productDetailLabel->slug, $data->dividerLabel) !== false ? true : false);
                        /** @var \bamboo\domain\entities\CProductSheetActual $detail */
                        if(!empty($detail->productDetail->slug)): ?>
                            <li itemprop="additionalProperty" itemscope itemtype="http://schema.org/PropertyValue" <?php if($isLabel) echo "class='removeLiStyle'" ?>>
                                <meta itemprop="name" content="<?php echo $detail->productDetailLabel->getLocalizedName() ?>"/>
                                <span itemprop="value">
                                <?php
                                if($isLabel){
                                    echo '<strong>'.$detail->productDetail->getLocalizedDetail().'</strong>';
                                } else {
                                    echo $detail->productDetail->getLocalizedDetail();
                                }
                                ?>
                            </span>
                            </li>
                        <?php
                        endif;
                    endforeach; ?>
                    <br>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseFive">
                        <span><?php tpe($data->shippingLabel); ?></span>
                        <span class="accordion-symbol">+</span>
                    </a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php foreach($data->tables as $table): ?>
                        <span style="font-weight: bold;font-size:1.0em;"><?php tpe($table->name) ?></span>
                        <table class="table table-hover table-responsive">
                            <thead>
                            <tr>
                                <?php foreach($table->head as $col): ?>
                                    <th><?php tpe($col) ?></th>
                                <?php endforeach; ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($table->rows as $row): ?>
                                <tr>
                                    <?php foreach ($row as $col): ?>
                                        <td><?php tpe($col) ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                            <tfoot>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            </tfoot>
                        </table>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="sr-only">
        <a href="whatsapp://send?text=<?php echo $app->presentUrl() ?>" title="Condividi con WhatsApp" data-action="share/whatsapp/share"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
    </div>
    <div id="gSummary" style="display:none">
        <span id="GProduct-variant"><?php echo $data->entity->printId() ?></span>
        <span id="GProduct-brand"><?php echo $data->entity->productBrand->name ?></span>
        <span id="GProduct-price">
            <?php if ($pricesAreOnARange == true) {
                if ($sale > 0) {
                    echo(array_sum($salePrices) / count($salePrices));
                } else {
                    echo(array_sum($prices) / count($prices));
                }
            } else {
                if ($sale > 0) {
                    echo $salePrices[0];
                } else {
                    echo $prices[0];
                }
            }
            ?>
        </span>
        <span id="GProduct-name"><?php echo $data->entity->getName() ?></span>
        <span id="GProduct-variant-name"><?php echo $data->entity->productVariant->name ?></span>
    </div>
</div>