<nav class="navbar navbar-default navbar-main navbar-main-slide" role="navigation">
    <div class="container">
        <div class="navbar-header">
            {{ Mobilenav.default.default }}
            {{ Sitelogo.default.default }}
        </div>
        {{ Searchbutton.default.default }}
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right">
                <li><a href="<?php echo $app->baseUrlLang(); ?>"><?php echo _('home'); ?></a></li>
                <!--new section -->
                <?php
                $langId = $app->langId();
                $lang = \Monkey::app()->repoFactory->create('Lang')->findOneBy(['id' => $langId]);
                $langs = $lang->lang;

                $menus = \Monkey::app()->repoFactory->create('Menu')->findAll();
                foreach ($menus as $menu) {
                    $parents = [];
                    $children = [];
                    $bootstrapColumnWidth = 12;
                    $imageColumnWidth = 12;
                    $menuTranslation = \Monkey::app()->repoFactory->create('MenuTranslation')->findOneBy(['menuTranslationId' => $menu->id,'langId' => $langId]);
                    if ($menu->level == 2) {
                        echo '<li class="dropdown megamenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $menuTranslation->name . '</a>';
                    } else {
                        echo '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $menuTranslation->name . '</a>';
                    }
                    $menuNav = \Monkey::app()->repoFactory->create('MenuNav')->findBy(['menuId' => $menu->id]);
                    $menuNavClass = 1;
                    foreach ($menuNav as $nav) {
                        switch ($nav->typeId) {
                            case 1:
                                $parentsNum = count($menuNav);
                                $menuNavClass = 1;
                                $mnt = \Monkey::app()->repoFactory->create('MenuNavTranslation')->findOneBy(['menuNavTranslationId' => $nav->id,'langId' => $langId]);
                                if ($nav->elementId != null || $nav->elementId != '0') {
                                    $parents[] = ['captionTitle' => $mnt->captionTitle,'captionText' => $mnt->captionText,'captionLink' =>$app->baseUrlLang() .  '/page/' . $nav->captionLink . '/' . $nav->elementId,'captionImage' => $nav->captionImage];
                                } else {
                                    $parents[] = ['captionTitle' => $mnt->captionTitle,'captionText' => $mnt->captionText,'captionLink' => $app->baseUrlLang() . '/' . $nav->captionLink ,'captionImage' => $nav->captionImage];
                                }

                                break;
                            case 2:
                                $menuNavClass = 1;
                                $parentsNum = count($menuNav);
                                $mnt = \Monkey::app()->repoFactory->create('MenuNavTranslation')->findOneBy(['menuNavTranslationId' => $nav->id,'langId' => $langId]);
                                $parents[] = ['captionTitle' => $mnt->captionTitle,'captionText' => $mnt->captionText,'captionLink' => $nav->captionLink,'captionImage' => $nav->captionImage];
                                break;
                            case 3:
                                $menuNavClass = 2;
                                $mnt = \Monkey::app()->repoFactory->create('MenuNavTranslation')->findOneBy(['menuNavTranslationId' => $nav->id,'langId' => $langId]);
                                $category = \Monkey::app()->repoFactory->create('ProductCategory')->findOneBy(['id' => $nav->elementId]);
                                $find = "SELECT
					  DISTINCT parent.id AS id,
                       `pct`.`name` as captionTitle,
					  parent.depth AS depth,
                       parent.slug as slug
                      
					FROM 
					 ProductCategory father 
					 JOIN ProductCategory parent ON parent.lft BETWEEN father.lft AND father.rght
					 JOIN ProductCategory node ON node.lft BETWEEN parent.lft AND parent.rght 
                     JOIN Product p JOIN ProductStatus ps ON p.productStatusId = ps.id
					 JOIN ProductCategoryTranslation pct on  parent.id=pct.productCategoryId and pct.langId=".$langId." and pct.shopId=44   
					 JOIN ProductHasProductCategory phpc ON (p.id,p.productVariantId) = (phpc.productId,phpc.productVariantId) AND node.id = phpc.productCategoryId 
					WHERE 
					  ps.isVisible = 1 AND
                      father.id = " . $nav->elementId . "
					GROUP BY parent.slug
					HAVING parent.depth BETWEEN 2 AND 2
					ORDER BY parent.lft";
                                $res = \Monkey::app()->dbAdapter->query($find,[])->fetchAll();
                                $parentsNum = count($res);
                                foreach ($res as $result) {
                                    $parents[] = ['captionTitle' => $result['captionTitle'],'captionText' => $result['captionTitle'],'captionLink' => $app->baseUrlLang() . '/' . $result['slug'] . '-' . $result['id'],'captionImage' => $nav->captionImage,'elementId' => $result['id']];
                                    $findChild = "SELECT
					  DISTINCT parent.id AS id,
                       `pct`.`name` as captionTitle,
					  parent.depth AS depth,
                       parent.slug as slug
                      
					FROM 
					 ProductCategory father 
					 JOIN ProductCategory parent ON parent.lft BETWEEN father.lft AND father.rght
					 JOIN ProductCategory node ON node.lft BETWEEN parent.lft AND parent.rght 
                     JOIN Product p JOIN ProductStatus ps ON p.productStatusId = ps.id
					 JOIN ProductCategoryTranslation pct on  parent.id=pct.productCategoryId and langId='.$langId.' and pct.shopId=44  
					 JOIN ProductHasProductCategory phpc ON (p.id,p.productVariantId) = (phpc.productId,phpc.productVariantId) AND node.id = phpc.productCategoryId 
					WHERE 
					  ps.isVisible = 1 AND
                      father.id = " . $result['id'] . "
					GROUP BY parent.slug
					HAVING parent.depth BETWEEN 3 AND 3
					ORDER BY parent.lft";
                                    $resChild = \Monkey::app()->dbAdapter->query($findChild,[])->fetchAll();
                                    foreach ($resChild as $resultChild) {
                                        $children[] = ['captionTitle' => $resultChild['captionTitle'],'captionText' => $resultChild['captionTitle'],'captionLink' => $app->baseUrlLang() . '/' . $result['slug'] . '-' . $result['id'] . '/' . $resultChild['slug'] . '-' . $resultChild['id'],'captionImage' => $nav->captionImage,'elementId' => $result['id']];
                                    }
                                }

                                break;
                            case 4:
                                $menuNavClass = 2;
                                $mnt = \Monkey::app()->repoFactory->create('MenuNavTranslation')->findOneBy(['menuNavTranslationId' => $nav->id,'langId' => $langId]);
                                $tag = \Monkey::app()->repoFactory->create('Tag')->findOneBy(['id' => $nav->elementId]);
                                $tagName = strtolower($tag->slug);
                                $tagName = str_replace(' ','-',$tagName);
                                $find = "SELECT
					  DISTINCT parent.id AS id,
                       `pct`.`name` as captionTitle,
					  parent.depth AS depth,
                       parent.slug as slug
                      
					FROM 
					 ProductCategory father 
					 JOIN ProductCategory parent ON parent.lft BETWEEN father.lft AND father.rght
					 JOIN ProductCategory node ON node.lft BETWEEN parent.lft AND parent.rght 
                     JOIN Product p JOIN ProductStatus ps ON p.productStatusId = ps.id
					 JOIN ProductCategoryTranslation pct on  parent.id=pct.productCategoryId and langId='.$langId.'   and pct.shopId=44
					 JOIN ProductHasProductCategory phpc ON (p.id,p.productVariantId) = (phpc.productId,phpc.productVariantId) AND node.id = phpc.productCategoryId 
					WHERE 
					  ps.isVisible = 1 AND
                      father.id = 1
					GROUP BY parent.slug
					HAVING parent.depth BETWEEN 1 AND 1
					ORDER BY parent.lft";
                                $res = \Monkey::app()->dbAdapter->query($find,[])->fetchAll();
                                $parentsNum = count($res);
                                foreach ($res as $result) {
                                    $parents[] = ['captionTitle' => 'Tag ' . $mnt->captionTitle . ' ' . $result['captionTitle'],'captionText' => 'Tag ' . $mnt->captionTitle . ' ' . $result['captionTitle'],'captionLink' => $app->baseUrlLang() . '/' . $result['slug'] . '-' . $result['id'] . '/tag-' . $tagName . '-t' . $tag->id,'captionImage' => $nav->captionImage,'elementId' => $result['id']];
                                    $findChild = "SELECT
					  DISTINCT parent.id AS id,
                       `pct`.`name` as captionTitle,
					  parent.depth AS depth,
                       parent.slug as slug
                      
					FROM 
					 ProductCategory father 
					 JOIN ProductCategory parent ON parent.lft BETWEEN father.lft AND father.rght
					 JOIN ProductCategory node ON node.lft BETWEEN parent.lft AND parent.rght 
                     JOIN Product p JOIN ProductStatus ps ON p.productStatusId = ps.id
					 JOIN ProductCategoryTranslation pct on  parent.id=pct.productCategoryId and langId='.$langId.'   and pct.shopId=44
					 JOIN ProductHasProductCategory phpc ON (p.id,p.productVariantId) = (phpc.productId,phpc.productVariantId) AND node.id = phpc.productCategoryId 
					WHERE 
					  ps.isVisible = 1 AND
                      father.id = " . $result['id'] . "
					GROUP BY parent.slug
					HAVING parent.depth BETWEEN 3 AND 3
					ORDER BY parent.lft";
                                    $resChild = \Monkey::app()->dbAdapter->query($findChild,[])->fetchAll();
                                    foreach ($resChild as $resultChild) {
                                        $children[] = ['captionTitle' => $resultChild['captionTitle'],'captionText' => $resultChild['captionTitle'],'captionLink' => $app->baseUrlLang() . '/' . $result['slug'] . '-' . $result['id'] . '/' . $resultChild['slug'] . '-' . $resultChild['id'] . '/tag-' . $tagName . '-t' . $tag->id,'captionImage' => $nav->captionImage,'elementId' => $result['id']];
                                    }
                                }

                                break;
                            case 5:
                                $menuNavClass = 2;
                                $mnt = \Monkey::app()->repoFactory->create('MenuNavTranslation')->findOneBy(['menuNavTranslationId' => $nav->id,'langId' => $langId]);
                                $tag = \Monkey::app()->repoFactory->create('TagExclusive')->findOneBy(['id' => $nav->elementId]);
                                $tagName = strtolower($tag->slug);
                                $tagName = str_replace(' ','-',$tagName);
                                $find = "SELECT
					  DISTINCT parent.id AS id,
                       `pct`.`name` as captionTitle,
					  parent.depth AS depth,
                       parent.slug as slug
                      
					FROM 
					 ProductCategory father 
					 JOIN ProductCategory parent ON parent.lft BETWEEN father.lft AND father.rght
					 JOIN ProductCategory node ON node.lft BETWEEN parent.lft AND parent.rght 
                     JOIN Product p JOIN ProductStatus ps ON p.productStatusId = ps.id
					 JOIN ProductCategoryTranslation pct on  parent.id=pct.productCategoryId and langId='.$langId.'   and pct.shopId=44
					 JOIN ProductHasProductCategory phpc ON (p.id,p.productVariantId) = (phpc.productId,phpc.productVariantId) AND node.id = phpc.productCategoryId 
					WHERE 
					  ps.isVisible = 1 AND
                      father.id = 1
					GROUP BY parent.slug
					HAVING parent.depth BETWEEN 1 AND 1
					ORDER BY parent.lft";
                                $res = \Monkey::app()->dbAdapter->query($find,[])->fetchAll();
                                $parentsNum = count($res);
                                foreach ($res as $result) {
                                    $parents[] = ['captionTitle' => $mnt->captionTitle . ' ' . $result['captionTitle'],'captionText' => $mnt->captionTitle . ' ' . $result['captionTitle'],'captionLink' => $app->baseUrlLang() . '/' . $result['slug'] . '-' . $result['id'] . '/' . $tagName . '-w' . $tag->id,'captionImage' => $nav->captionImage,'elementId' => $result['id']];
                                    $findChild = "SELECT
					  DISTINCT parent.id AS id,
                       `pct`.`name` as captionTitle,
					  parent.depth AS depth,
                       parent.slug as slug
                      
					FROM 
					 ProductCategory father 
					 JOIN ProductCategory parent ON parent.lft BETWEEN father.lft AND father.rght
					 JOIN ProductCategory node ON node.lft BETWEEN parent.lft AND parent.rght 
                     JOIN Product p JOIN ProductStatus ps ON p.productStatusId = ps.id
					 JOIN ProductCategoryTranslation pct on  parent.id=pct.productCategoryId and langId='.$langId.'   and pct.shopId=44
					 JOIN ProductHasProductCategory phpc ON (p.id,p.productVariantId) = (phpc.productId,phpc.productVariantId) AND node.id = phpc.productCategoryId 
					WHERE 
					  ps.isVisible = 1 AND
                      father.id = " . $result['id'] . "
					GROUP BY parent.slug
					HAVING parent.depth BETWEEN 3 AND 3
					ORDER BY parent.lft";
                                    $resChild = \Monkey::app()->dbAdapter->query($findChild,[])->fetchAll();
                                    foreach ($resChild as $resultChild) {
                                        $children[] = ['captionTitle' => $resultChild['captionTitle'],'captionText' => $resultChild['captionTitle'],'captionLink' => $app->baseUrlLang() . '/' . $resultChild['slug'] . '-' . $resultChild['id'] . '/' . $tagName . '-w' . $tag->id,'captionImage' => $nav->captionImage,'elementId' => $result['id']];
                                    }
                                }
                                break;
                            case 6:
                                $menuNavClass = 2;
                                $mnt = \Monkey::app()->repoFactory->create('MenuNavTranslation')->findOneBy(['menuNavTranslationId' => $nav->id,'langId' => $langId]);
                                $find = "SELECT
					  DISTINCT parent.id AS id,
                       `pct`.`name` as captionTitle,
					  parent.depth AS depth,
                       parent.slug as slug
                      
					FROM 
					 ProductCategory father 
					 JOIN ProductCategory parent ON parent.lft BETWEEN father.lft AND father.rght
					 JOIN ProductCategory node ON node.lft BETWEEN parent.lft AND parent.rght 
                     JOIN Product p JOIN ProductStatus ps ON p.productStatusId = ps.id
					 JOIN ProductCategoryTranslation pct on  parent.id=pct.productCategoryId and langId='.$langId.'   and pct.shopId=44
					 JOIN ProductHasProductCategory phpc ON (p.id,p.productVariantId) = (phpc.productId,phpc.productVariantId) AND node.id = phpc.productCategoryId 
					WHERE 
					  ps.isVisible = 1 AND
                      father.id = 1
					GROUP BY parent.slug
					HAVING parent.depth BETWEEN 1 AND 1
					ORDER BY parent.lft";
                                $res = \Monkey::app()->dbAdapter->query($find,[])->fetchAll();
                                $parentsNum = count($res);
                                foreach ($res as $result) {
                                    $parents[] = ['captionTitle' => $result['captionTitle'],'captionText' => $result['captionTitle'],'captionLink' => $app->baseUrlLang() . '/' . $nav->captionLink . '/' . $result['slug'] . '-' . $result['id'],'captionImage' => $nav->captionImage,'elementId' => $result['id']];
                                    $findChild = "SELECT
					  DISTINCT parent.id AS id,
                       `pct`.`name` as captionTitle,
					  parent.depth AS depth,
                       parent.slug as slug
                      
					FROM 
					 ProductCategory father 
					 JOIN ProductCategory parent ON parent.lft BETWEEN father.lft AND father.rght
					 JOIN ProductCategory node ON node.lft BETWEEN parent.lft AND parent.rght 
                     JOIN Product p JOIN ProductStatus ps ON p.productStatusId = ps.id
					 JOIN ProductCategoryTranslation pct on  parent.id=pct.productCategoryId and langId='.$langId.'   and pct.shopId=44
					 JOIN ProductHasProductCategory phpc ON (p.id,p.productVariantId) = (phpc.productId,phpc.productVariantId) AND node.id = phpc.productCategoryId 
					WHERE 
					  ps.isVisible = 1 AND
                      father.id = " . $result['id'] . "
					GROUP BY parent.slug
					HAVING parent.depth BETWEEN 3 AND 3
					ORDER BY parent.lft";
                                    $resChild = \Monkey::app()->dbAdapter->query($findChild,[])->fetchAll();
                                    foreach ($resChild as $resultChild) {
                                        $children[] = ['captionTitle' => $resultChild['captionTitle'],'captionText' => $resultChild['captionTitle'],'captionLink' => $app->baseUrlLang() . '/' . $nav->captionLink . '/' . $resultChild['slug'] . '-' . $resultChild['id'],'captionImage' => $nav->captionImage,'elementId' => $result['id']];
                                    }
                                }
                                break;

                        }
                    }

                    $bootstrapColumnWidth = 12;
                    $imageColumnWidth = 12;
                    if ($parentsNum > 0) {
                        $bootstrapColumnWidth = floor(12 / $parentsNum);
                        if ($bootstrapColumnWidth > 3) {
                            $bootstrapColumnWidth = 3;
                        } elseif ($bootstrapColumnWidth == 3) {
                            $bootstrapColumnWidth = 2;
                        }
                        $imageColumnWidth = 12 - ($bootstrapColumnWidth * $parentsNum);
                    }
                    switch ($menuNavClass) {
                        case 2:
                            ?>

                            <div class="dropdown-menu">
                                <div class="mega-menu-content">
                                    <div class="row">
                                        <?php
                                        $i = 0;
                                        foreach ($parents as $val): ?>
                                            <div class="col-md-<?php echo $bootstrapColumnWidth; ?> menu-column">
                                                <h3 class="menu-header-link"><a
                                                            href="<?php echo $val['captionLink'] ?>"><?php echo $val['captionTitle']; ?></a>
                                                </h3>
                                                <ul class="list-unstyled sub-menu mCustomScrollbar"
                                                    data-mcs-theme="light" data-mcs-axis="y">
                                                    <?php


                                                    foreach ($children as $child): ?>
                                                        <?php if ($child['elementId'] == $val['elementId']) { ?>
                                                            <li class="dropdownli"><a
                                                                        href="<?php echo $child['captionLink'] ?>"><?php echo $child['captionTitle']; ?></a></h3>
                                                            </li>
                                                        <?php }
                                                    endforeach;

                                                    ?>

                                                </ul>
                                            </div>
                                            <?php
                                            $image = $val['captionImage'];

                                            $i++;
                                        endforeach; ?>
                                        <?php if ($imageColumnWidth > 0): ?>
                                            <div class="col-md-3 menu-column menu-image">
                                                <div class="pull-right" style="text-align: right;">
                                                    <img src="<?php echo $image; ?>"
                                                         class="img-responsive"/>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            </li>
                            <?php break;
                        case 1: ?>
                            <ul class="dropdown-menu">
                                <?php foreach ($parents as $val): ?>
                                    <li>
                                        <a href="<?php echo $val['captionLink'] ?>"><?php echo $val['captionTitle']; ?></a>
                                    </li>
                                <?php
                                endforeach;
                                ?>
                            </ul>

                            <?php
                            break;
                    }
                } ?>
            </ul>
        </div>

</nav>
