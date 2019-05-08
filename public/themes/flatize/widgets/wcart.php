<li id="wcartwidget" data-action="<?php echo $app->baseUrl() . '/xhr/' . $app->lang() . '/CartSummary' ?>"
    data-address="widget.widget" class="dropdown menu-shop">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i id="wcart-open" class="fa fa-shopping-bag"></i>
        <span class="shopping-bag"><?php echo isset($data) && isset($data->entity) && isset($data->entity->elements) ? $data->entity->elements : 0; ?></span>
    </a>
    <div class="dropdown-menu">

        <?php if (isset($data) && isset($data->entity) && !empty($data->entity->cartLine)): ?>

            <h3><?php tpe($data->title) ?></h3>
            <ul class="list-unstyled list-thumbs-pro">
                <?php $i = 0;
                foreach ($data->entity->cartLine as $val):
                    /** @var \bamboo\domain\entities\CCartLine $val */
                    ?>
                    <?php if ($i > $data->show) break; ?>
                    <li class="product wcart_table_item"
                        data-id="<?php echo $val->productPublicSku->product->printId() ?>"
                        data-price="<?php echo $val->productPublicSku->getActivePrice() ?>"
                        data-quantity="<?php echo $val->qty ?>"
                        data-name="<?php echo $val->productPublicSku->product->getName() ?>"
                        data-list="<?php echo 'catalog'; ?>"
                        data-brand="<?php echo $val->productPublicSku->product->productBrand->name; ?>"
                        data-category="<?php echo $app->getVerboseCategory($val->productPublicSku->product) ?>"
                        data-variant="<?php echo $val->productPublicSku->product->productVariant->name ?>">
                        <div class="product-thumb-info">
                            <div class="product-thumb-info-image product-thumb-info-image-mini">
                                <a href="<?php echo $app->productUrl($val->productPublicSku->product); ?>"><img alt=""
                                                                                                          width="60"
                                                                                                          src="<?php echo $app->image($val->productPublicSku->product->getPhoto(1, 562), 'amazon') ?>"
                                                                                                          style="border:1px solid #c0c0c0;"></a>
                            </div>
                            <div class="product-thumb-info-content">
                                <h4>
                                    <a href="<?php echo $app->productUrl($val->productPublicSku->product); ?>"><strong><?php echo $val->productPublicSku->product->productBrand->name; ?></strong></a>
                                </h4>
                                <span class="item-cat"><small><?php
                                        try {
                                            echo mb_substr($val->productPublicSku->product->productNameTranslation->getFirst()->name, 0, 17) . '&hellip; (' . $val->qty . ')';
                                        } catch (\ErrorException $e) {
                                            echo "";
                                        }
                                        ?></small></span>
                                <span class="item-cat"><small><a
                                                href="#"><?php echo $val->productPublicSku->product->productCategoryTranslation->findOneByKey('id', $app->lang()); ?></a></small></span>
                                <?php if ($val->productPublicSku->isOnSale): ?>
                                    <span class="oldprice"><?php echo $val->productPublicSku->price; ?> &euro;</span>&ensp;
                                    <span class="saleprice"><?php echo $val->productPublicSku->salePrice; ?> &euro;</span>
                                <?php else: ?>
                                    <span class="price"><?php echo $val->productPublicSku->price; ?> &euro;</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                    <?php $i++; endforeach; ?>
            </ul>
            <ul class="list-inline cart-subtotals text-right">
                <li class="cart-subtotal"><strong><?php tpe($data->subtotal) ?></strong></li>
                <li class="price"><span
                            class="amount"><strong><?php echo $data->entity->getGrossTotal(); ?>
                            &euro;</strong></span>
                </li>
            </ul>
            <div class="cart-buttons text-right">
                <a href="<?php echo $app->toCart() ?>" class="btn btn-primary-inverse"><?php tpe($data->toCart) ?></a>
                <a href="<?php echo $app->toCheckOut() ?>" class="btn btn-primary"><?php tpe($data->checkout); ?></a>
            </div>

        <?php else: ?>

            <h3><?php tpe($data->titleEmpty) ?></h3>
            <p><?php tpe($data->textEmpty) ?></p>

        <?php endif; ?>
    </div>
</li>