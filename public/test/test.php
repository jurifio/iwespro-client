<?php

use bamboo\core\exceptions\BambooException;

require '../../iwesStatic.php';


try {
    $phpcRepo=\Monkey::app()->repoFactory->create('ProductHasProductCategory');
    $sql='SELECT php.productId as productId, php.productVariantId as productVariantId,php.productCategoryId as productCategoryId, pc.depth as depth from ProductHasProductCategory php 
join Product p on p.id = php.productId and p.productVariantId = php.productVariantId join ShopHasProduct shp on php.productId=shp.productId and php.productVariantId =shp.productVariantId
join ProductCategory pc on pc.id=php.productCategoryId where pc.depth >1  and shp.shopId=1';
    $res=\Monkey::app()->dbAdapter->query($sql,[])->fetchAll();
    foreach($res as $row) {
        $productId=$row['productId'];
        $productVariantId=$row['productVariantId'];
        $productCategoryId=$row['productCategoryId'];
        $depth=$row['depth'];
        $parentDepth=0;
        $sqlParent='SELECT parent.id as parentCategoryId, parent.depth as parentDepth  FROM
        ProductCategory node,
        ProductCategory parent
        WHERE (
            node.lft BETWEEN parent.lft AND parent.rght          
        )
        AND node.id='.$productCategoryId.'
        ORDER BY parent.rght - parent.lft';
        $resParent = \Monkey::app()->dbAdapter->query($sqlParent,[])->fetchAll();
        foreach ($resParent as $rowParent){
            if($rowParent['parentDepth']>0){
                $parentDepth = $rowParent['parentDepth'];
                $parentCategoryId=$rowParent['parentCategoryId'];
                $findPhpc=\Monkey::app()->dbAdapter->selectCount('ProductHasProductCategory',['productCategoryId' =>$parentCategoryId,'productId'=>$productId,'productVariantId'=>$productVariantId]);
                if($findPhpc > 0) {
                    continue;
                }else{
                    $phpc = $phpcRepo->getEmptyEntity();
                    $phpc->productCategoryId = $parentCategoryId;
                    $phpc->productId = $productId;
                    $phpc->productVariantId = $productVariantId;
                    $phpc->insert();
                }
            }

        }


    }

} catch (\Throwable $e) {
     echo $e->getMessage();
}


