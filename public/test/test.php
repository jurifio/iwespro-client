<?php
ini_set("memory_limit", "2000M");
$ttime = microtime(true);
$time = microtime(true);
require "../../iwesStatic.php";
var_dump("Applicazione  \t\t\t\t" . (microtime(true) - $time));

$monkey = \Monkey::app();
$time = microtime(true);
$monkey->dbAdapter;
var_dump("dbAdapter \t\t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->cacheService;
var_dump("cacheService \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->sessionManager;
var_dump("sessionManager \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->authManager;
var_dump("authManager \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->entityManagerFactory;
var_dump("entityManagerFactory \t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->repoFactory;
var_dump("repoFactory \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->eventManager;
var_dump("eventManager \t\t\t\t" . (microtime(true) - $time));
$time = microtime(true);
$monkey->mailService;

$time = microtime(true);
/*
 *
 *
 */

/* function populate tmp Table*/
/*
$urlSeasonList = "http://atelier-hub.com/test/SeasonList";
$callSeasonList = apiCall($urlSeasonList);
$arraySel = "season";
$seasons = tmpTable($callSeasonList, $arraySel);
$isFindIdSeason = isFind($seasons);

$urlGenderList = "http://atelier-hub.com/test/GenderList";
$callGenderList = apiCall($urlGenderList);
$arraySel = "gender";
$genders = tmpTable($callGenderList, $arraySel);
$ifFindGenderId = isFind($genders);

$urlBrandList = "http://atelier-hub.com/test/BrandList";
$callBrandList = apiCall($urlBrandList);
$arraySel = "brand";
$brands = tmpTable($callBrandList, $arraySel);
$isFindIdBrand = isFind($brands);

$urlCategoryList = "http://atelier-hub.com/test/CategoryList";
$callCategoryList = apiCall($urlCategoryList);
$arraySel = "category";
$categories = tmpTable($callCategoryList, $arraySel);
$isFindIdCategory = isFind($categories);

$urlColorList = "http://atelier-hub.com/test/ColorList";
$callColorList = apiCall($urlColorList);
$arraySel = "colors";
$colors = tmpTable($callColorList, $arraySel);
$isFindIdCategory = isFind($colors);

$urlGoodsList = "http://atelier-hub.com/test/GoodsList";
$callGoodsList = apiCall($urlGoodsList);
$arraySel = "goods";
$goods = tmpTable($callGoodsList, $arraySel);
$isFindIdGood = isFind($goods);

$urlGoodsDetailList = "http://atelier-hub.com/test/GoodsDetailList";
$callGoodsDetailList = apiCall($urlGoodsDetailList);
$arraySel = "goodsDetail";
$goodsDetails = tmpTable($callGoodsDetailList, $arraySel);
$isFindIdGoodDetails = isFind($goodsDetails);*/
$arrayPopulate = populateJson();
echo $arrayPopulate;

function populateJson()
{
    /* $urlSeasonList = "http://atelier-hub.com/test/SeasonList";
     $callSeasonList = apiCall($urlSeasonList);
     $arraySel = "season";
     $seasons = tmpTable($callSeasonList, $arraySel);
    // $isFindIdSeason = isFind($seasons);

     $urlGenderList = "http://atelier-hub.com/test/GenderList";
     $callGenderList = apiCall($urlGenderList);
     $arraySel = "gender";
     $genders = tmpTable($callGenderList, $arraySel);
   //  $ifFindGenderId = isFind($genders);

     $urlBrandList = "http://atelier-hub.com/test/BrandList";
     $callBrandList = apiCall($urlBrandList);
     $arraySel = "brand";
     $brands = tmpTable($callBrandList, $arraySel);
   //  $isFindIdBrand = isFind($brands);

     $urlCategoryList = "http://atelier-hub.com/test/CategoryList";
     $callCategoryList = apiCall($urlCategoryList);
     $arraySel = "category";
     $categories = tmpTable($callCategoryList, $arraySel);
     //$isFindIdCategory = isFind($categories);

     $urlColorList = "http://atelier-hub.com/test/ColorList";
     $callColorList = apiCall($urlColorList);
     $arraySel = "colors";
     $colors = tmpTable($callColorList, $arraySel);
    // $isFindIdCategory = isFind($colors);*/
    /*
        $urlGoodsList = "http://atelier-hub.com/test/GoodsList";
        $callGoodsList = apiCall($urlGoodsList);
        $arraySel = "goods";
        $goods = tmpTable($callGoodsList, $arraySel);
     //   $isFindIdGood = isFind($goods);

        $urlGoodsDetailList = "http://atelier-hub.com/test/GoodsDetailList";
        $callGoodsDetailList = apiCall($urlGoodsDetailList);
        $arraySel = "goodsDetail";
        $goodsDetails = tmpTable($callGoodsDetailList, $arraySel);
       // $isFindIdGoodDetails = isFind($goodsDetails);
     $urlGoodsPriceList = "http://atelier-hub.com/test/GoodsPriceList";
        $callGoodsPriceList = apiCall($urlGoodsPriceList);
        $arraySel = "goodsPrice";
        $goodsPrice = tmpTable($callGoodsPriceList, $arraySel);
       // $isFindIdGoodPrice = isFind($goodsPrice);
        $arrayPopulate = [];
    */
    $goods = [];
    $goods[] = array('ID' => '538163',
        'Model' => 'HM349562',
        'Variant' => '02',
        'Season' => 'P19',
        'Collection' => '',
        'BrandID' => '10000697',
        'ParentCategoryID' => '10000001',
        'CategoryID' => '10000008',
        'GenderID' => '10000002',
        'Code' => 'HM34956202',
        'GoodsName' => 'Philipp Plein T-shirts and Polos Black',
        'InStock' => '0',
        'MainPicture' => 'https://www.atelieronweb.com/foto/P16---Philipp Plein---538163.JPG',
        'CreatedTime' => '2019-05-07T14:55:36',
        'ModifiedTime' => '2019-07-22T17:08:06'
    );
    $goodsDetails = [];
    $goodsDetails[] = array('ID' => '538163',
        'SuperColor' => 'Blacks and greys',
        'Color' => 'Black',
        'Fabric' => '',
        'Composition' => '100% cotton',
        'SizeAndFit' => 'M',
        'MadeIn' => 'Italy');
    $goodsPrice = [];
    $goodsPrice[] = array('ID' => '538163',
        'Retailers' => array(
            'Retailer' => 'Retailer1',
            'BrandReferencePrice' => '500,00',
            'BrandReferencePriceExVAT' => '409,83',
            'Discount' => '25',
            'NetPrice' => '307,38',
            'Currency' => 'EUR',
            'PercentTax' => '22',
            'Country' => 'IT'));

    foreach ($goodsDetails as $k => $ks) {
        foreach ($ks as $kk => $val) {
            $shopId = 55;
            if ($kk == 'ID') {
                $ID = $val;
                $Model = isFindReturn($goods, $val, 'ID', 'Model');
                $Variant = isFindReturn($goods, $ID, 'ID', 'Variant');
                $stagione = isFindReturn($goods, $ID, 'ID', 'Season');
                $prListino = isDeepFindReturn($goodsPrice, $ID, 'Retailers', 'BrandReferencePrice');

            }


        }
    }
    return $arrayPopulate;
}

function apiCall($url = null)
{
    $username = "test";
    $password = "Imagine#";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $output = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);
    $json = json_decode($output, true);
    return $json;
}

function tmpTable($json = null, $arraySel = null)
{
    $tmpTable = [];
    foreach ($json as $key => $jsons) { // This will search in the 2 jsons
        foreach ($jsons as $keys => $value) {

            foreach ($value as $put => $val) {

                $b = [];
                $c = [];
                switch ($arraySel) {
                    case "season":
                        $tmpTable[] = array('ID' => $val['ID'], 'Name' => $val['Name']);
                        break;
                    case "gender":
                        $tmpTable[] = array('ID' => $val['ID'], 'Name' => $val['Name']);
                        break;
                    case "brand":
                        $tmpTable[] = array('ID' => $val['ID'], 'Name' => $val['Name']);
                        break;
                    case "category":
                        $tmpTable[] = array('ID' => $val['ID'], 'Name' => $val['Name'], 'ParentID' => $val['ParentID'], 'ParentName' => $val['ParentName'], 'GenderID' => $val['GenderID']);
                        break;
                    case "colors":
                        $tmpTable[] = array('ColorName' => $val['ColorName'], 'SuperColor' => $val['SuperColor']);
                        break;
                    case "goods":

                        $tmpTable[] = array(
                            'ID' => $val['ID'],
                            'Model' => $val['Model'],
                            'Variant' => $val['Variant'],
                            'Season' => $val['Season'],
                            'Collection' => $val['Collection'],
                            'BrandID' => $val['BrandID'],
                            'ParentCategoryID' => $val['ParentCategoryID'],
                            'CategoryID' => $val['CategoryID'],
                            'GenderID' => $val['GenderID'],
                            'Code' => $val['Code'],
                            'GoodsName' => $val['GoodsName'],
                            'InStock' => $val['InStock'],
                            'MainPicture' => $val['MainPicture'],
                            'CreatedTime' => $val['CreatedTime'],
                            'ModifiedTime' => $val['ModifiedTime']
                        );
                        break;

                    case "goodsPrice";
                        $price = [];
                        foreach ($val['Retailers'] as $v => $it) {
                            foreach ($it as $prices) {
                                $Retailer = $prices['Retailer'];
                                $BrandReferencePrice = $prices['BrandReferencePrice'];
                                $BrandReferencePriceExVAT = $prices['BrandReferencePriceExVAT'];
                                $Discount = $prices['Discount'];
                                $NetPrice = $prices['NetPrice'];
                                $Currency = $prices['Currency'];
                                $PercentTax = $prices['PercentTax'];
                                $Country = $prices['Country'];
                                $price[] = array('Retailer' => $Retailer,
                                    'BrandReferencePrice' => $BrandReferencePrice,
                                    'BrandReferencePriceExVAT' => $BrandReferencePriceExVAT,
                                    'Discount' => $Discount,
                                    'NetPrice' => $NetPrice,
                                    'Currency' => $Currency,
                                    'PercentTax' => $PercentTax,
                                    'Country' => $Country);
                            }
                        }
                        $tmpTable[] = array(
                            'ID' => $val['ID'], 'Retailers' => $price);
                        break;
                    case "goodsDetail":
                        $item = [];
                        foreach ($val['Stock'] as $v => $it) {
                            foreach ($it as $items) {
                                $Barcode = $items['Barcode'];
                                $Size = $items['Size'];
                                $Qty = $items['Qty'];
                                $item[] = array('Barcode' => $Barcode, 'Size' => $Size, 'Qty' => $Qty);
                            }
                        }
                        $Pictures = [];
                        foreach ($val['Pictures'] as $k => $tu) {
                            foreach ($tu as $pic) {
                                $No = $pic['No'];
                                $PictureUrl = $pic['PictureUrl'];
                                $PictureThumbUrl = $pic['PictureThumbUrl'];
                                $Pictures[] = array('No' => $No, 'PictureUrl' => $PictureUrl, 'PictureThumbUrl' => $PictureThumbUrl);
                            }
                        }
                        $tmpTable[] = array(
                            'ID' => $val['ID'],
                            'SuperColor' => $val['SuperColor'],
                            'Color' => $val['Color'],
                            'Fabric' => $val['Fabric'],
                            'Composition' => $val['Composition'],
                            'SizeAndFit' => $val['SizeAndFit'],
                            'MadeIn' => $val['MadeIn'],
                            'Stock' => $item,
                            'Picture' => $Pictures,
                            'CreatedTime' => $val['CreatedTime'],
                            'ModifiedTime' => $val['ModifiedTime']);
                        break;

                }

            }
            $a = $tmpTable;

        }
    }

    return $a;

}

function isFind($a = null)
{
    foreach ($a as $k => $ks) {
        foreach ($ks as $kk => $val) {
            if ($kk == 'ID') {
                echo $val . "<br>";
            }
        }
    }
}

function isFindReturn($array = null, $filterByValue = null, $filterByColumn = null, $valueToReturn)
{

    $key = array_search($filterByValue, array_column($array, '$filterByColumn'));
    $val = $array[$key][$valueToReturn];
    return $val;
}

function isDeepFindReturn($array = null, $filterByValue = null, $filterByColumn = null, $valueToReturn)
{

    $key = array_search($filterByValue, array_column($array, 'ID'));
    $val = $array[$key][$filterByColumn];
    foreach ($val as $k => $value) {
        if ($k == $valueToReturn) {
            return $res = $value;
        }
    }

}





