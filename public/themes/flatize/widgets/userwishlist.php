<?php
use bamboo\core\theming\CWidgetHelper;
use bamboo\core\theming\CWidgetDataBag;
/**  @var CWidgetHelper $app
 * @var \bamboo\domain\entities\COrder $order
 */



        ?>
<h2><?php echo $data->title; ?></h2>
<table class="table table-hover table-responsive">
    <thead>
    <tr>
        <?php foreach($data->columns as $column): ?>
            <th><?php tpe($column); ?></th>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <?php
    $currentUser = \Monkey::app()->getUser();
    $currentUserId = $currentUser->id;
    $line=0;
    /** @var \bamboo\domain\entities\CWishList $wishListProduct */
    foreach($data->multi as $wishListProduct):
        if($wishListProduct->statusId=="1") {
            $line = $line + 1; ?>
            <tr>
                <td><?php echo $wishListProduct->productId . '-' . $wishListProduct->productVariantId; ?></td>
                <td><?php echo "<img style='width:100px;' src='" . $app->image($wishListProduct->product->getPhoto(1, 281), 'amazon') . "'" ?></td>

                <td>
                    <div id="sizeTd<?php echo $line; ?>" class="hidden"><select id="selectSize<?php echo $line; ?>"
                                                                                class="btn btn-icon">
                            <option disabled="disabled" selected="selected"><?php echo $data->sizeSelector; ?></option>
                            <?php foreach ($wishListProduct->product->productPublicSku as $sku): ?>
                                <?php if ($sku->stockQty < 1) continue; ?>
                                <option value="<?php echo $sku->productSize->id ?>"
                                        data-public-sku="<?php echo $sku->printId(); ?>"
                                        data-isOnSale="<?php echo $sku->isOnSale ?>"
                                        data-salePrice="<?php echo $sku->salePrice ?>"
                                        data-fullPrice="<?php echo $sku->price ?>"
                                        data-lang="<?php echo $app->lang(); ?>"
                                        data-price="<?php echo $sku->getActivePrice(); ?>"><?php echo $sku->productSize->name ?></option>
                            <?php endforeach; ?>
                        </select></div>
                    <button id="addItemToCart" class="btn btn-primary btn-icon btn-max-width pull-right"
                            data-product-variant="<?php echo $wishListProduct->productId . '-' . $wishListProduct->productVariantId; ?>"
                            data-product="<?php echo $wishListProduct->productId; ?>"
                            data-wishlistid="<?php echo $wishListProduct->id; ?>"
                            data-variant="<?php echo $wishListProduct->productVariantId; ?>"
                            data-size="<?php echo $wishListProduct->productSizeId; ?>"
                            data-line="<?php echo $line; ?>" ;
                            data-action="<?php echo $app->baseUrl() . '/xhr/' . $app->lang() . '/WishList' ?>"
                            data-lang="<?php echo $app->lang(); ?>">
                        <i class="fa fa-cart-plus"></i> <?php tpe($data->cartButton); ?>
                    </button>
                    <br>
                    <button id="deleteItemToWishList" class="btn btn-primary btn-icon btn-max-width pull-right"
                            data-action="<?php echo $app->baseUrl() . '/xhr/' . $app->lang() . '/WishList' ?>"
                            data-product-id="<?php echo $wishListProduct->id; ?>"
                            data-lang="<?php echo $app->lang(); ?>">
                        <i class="fa fa-heart"></i> <?php tpe($data->wishListButton); ?>
                    </button>
                </td>
            </tr>
            <?php
        }

    endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
        <td colspan="5"><?php tpe($data->footer); ?></td>
    </tr>
    </tfoot>
</table>