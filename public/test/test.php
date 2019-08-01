<?php
ini_set("memory_limit", "4000M");
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
if (ENV == 'dev') {
    $pathlocal = '/media/sf_sites/iwespro/temp-json/';
    $save_to = '/media/sf_sites/iwespro/temp-json/';
    $save_to_dir = '/media/sf_sites/iwespro/temp-json';

} else {
    $pathlocal = '/home/iwespro/public_html/temp-json/';
    $save_to = '/home/iwespro/public_html/temp-json/';
    $save_to_dir = '/home/iwespro/public_html/temp-json';

}


$time = microtime(true);


function apiCall($url = null, $arraySel = null, $savedir = null)
{
    $username = 'test';
    $password = 'Imagine#';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $output = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);
    $fp = fopen($savedir.$arraySel.'.json', 'w');
    fwrite($fp, $output);
    fclose($fp);
    
}

 function tmpTable( $savetodir = null, $arraySel = null)
{
    $file= $savetodir .$arraySel.".json";
    $json = json_decode(file_get_contents($file),true);
    $tmpTable = [];
    foreach ($json as $key => $jsons) { // This will search in the 2 jsons
        foreach ($jsons as $keys => $value) {
            foreach ($value as $put => $val) {
                $b = [];
                $c = [];
                switch ($arraySel) {
                    case 'goodsPrice';
                        $price = [];
                        foreach ($val['Retailers'] as $v => $prices) {

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
                        $tmpTable[] = array(
                            'ID' => $val['ID'], 'Retailers' => $price);
                        break;
                    case 'season':
                        $tmpTable[] = array('ID' => $val['ID'], 'Name' => $val['Name']);
                        break;
                    case 'gender':
                        $tmpTable[] = array('ID' => $val['ID'], 'Name' => $val['Name']);
                        break;
                    case 'brand':
                        $tmpTable[] = array('ID' => $val['ID'], 'Name' => $val['Name']);
                        break;
                    case 'category':
                        $tmpTable[] = array('ID' => $val['ID'], 'Name' => $val['Name'], 'ParentID' => $val['ParentID'], 'ParentName' => $val['ParentName'], 'GenderID' => $val['GenderID']);
                        break;
                    case 'colors':
                        $tmpTable[] = array('ColorName' => $val['ColorName'], 'SuperColor' => $val['SuperColor']);
                        break;
                    case 'goods':

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

                    case 'goodsDetail':
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
                            'Pictures' => $Pictures,
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

 function populateJson($genders = null, $goods = null, $goodsDetails = null, $brands = null, $goodsPrice = null, $categories = null)
{

    $arrayPopulate = [];
    foreach ($goodsDetails as $k => $ks) {
        $Size = null;
        $shopId = 55;

        foreach ($ks as $kk => $val) {
            if ($kk == 'ID') {
                $ID = $val;
                $Model = isFindReturn($goods, $ID, 'ID', 'Model');
                $Variant = isFindReturn($goods, $ID, 'ID', 'Variant');
                $stagione = isFindReturn($goods, $ID, 'ID', 'Season');
                $marchioId = isFindReturn($goods, $ID, 'ID', 'BrandID');
                $marchio = isFindReturn($brands, $marchioId, 'ID', 'Name');
                $prListino = isDeepFindReturn($goodsPrice, $ID, 'Retailers', 'BrandReferencePrice');
                $PrAcquisto = isDeepFindReturn($goodsPrice, $ID, 'Retailers', 'netPrice');
                $repartoId = isFindReturn($goods, $ID, 'ID', 'GenderID');
                $reparto = isFindReturn($genders, $repartoId, 'ID', 'Name');
                $cat1Id = isFindReturn($goods, $ID, 'ID', 'ParentCategoryID');
                $cat1 = isFindReturn($categories, $cat1Id, 'ID', 'Name');
                $cat2Id = isFindReturn($goods, $ID, 'ID', 'CategoryID');
                $cat2 = isFindReturn($categories, $cat2Id, 'ID', 'Name');
                $articolo = $Model . "-" . $Variant;
            }
            if ($kk == 'Color') {
                $colore = $val;

            }


            if ($kk == 'Stock') {
                $sizesQty = [];
                foreach ($val as $row) {
                    $sizesQty[] = array('Barcode' => $row['Barcode'], 'Size' => $row['Size'], 'Qty' => $row['Qty']);
                }
            }
            $string = '';
            if ($kk == 'Pictures') {

                foreach ($val as $rowPic) {
                    $string .= $rowPic['PictureUrl'] . ',';
                }
            }
            if ($string != '') {
                $stringDef = substr($string, 0, -1);
                $PictureUrl = explode(',', $stringDef);
                foreach ($sizesQty as $rows) {
                    $barcode = $rows['Barcode'];
                    $Size = $rows['Size'];
                    $qty = $row['Qty'];
                    $arrayPopulate[] = array(
                        'shopId' => $shopId,
                        'marchio' => $marchio,
                        'articolo' => $articolo,
                        'PrAcquisto' => $PrAcquisto,
                        'prListino' => $prListino,
                        'colore' => $colore,
                        'stagione' => $stagione,
                        'reparto' => $reparto,
                        'categoria1' => $cat1,
                        'categoria2' => $cat2,
                        'taglia' => $Size,
                        'esistenza' => $qty,
                        'barcode' => $barcode,
                        'img' => $PictureUrl
                    );
                }
                $sizesQty = null;

            }



        }
    }
    return $arrayPopulate;
}

function parameterCall()
{

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

    $key = array_search($filterByValue, array_column($array, $filterByColumn));
    $val = $array[$key][$valueToReturn];
    return $val;
}

function isDeepFindReturn($array = null, $filterByValue = null, $filterByColumn = null, $valueToReturn)
{
    $res = null;
    $key = array_search($filterByValue, array_column($array, $filterByColumn));
    $val = $array[$key][$filterByColumn];
    foreach ($val as $k => $value) {
        foreach ($value as $vals => $z) {
            if ($vals == $valueToReturn) {
                $res = $z;
                break;
            }
        }
    }
    return $res;
}

$arraySel = 'season';
$urlSeasonList = 'http://atelier-hub.com/test/SeasonList';
$callSeasonList = apiCall($urlSeasonList,$arraySel, $save_to);
$seasons = tmpTable($save_to, $arraySel);
$arraySel = 'gender';
$urlGenderList = 'http://atelier-hub.com/test/GenderList';
$callGenderList = apiCall($urlGenderList,$arraySel, $save_to);
$genders = tmpTable($save_to, $arraySel);
$arraySel = 'brand';
$urlBrandList = 'http://atelier-hub.com/test/BrandList';
$callBrandList = apiCall($urlBrandList,$arraySel, $save_to);
$brands = tmpTable($save_to, $arraySel);
$arraySel = 'category';
$urlCategoryList = 'http://atelier-hub.com/test/CategoryList';
$callCategoryList = apiCall($urlCategoryList,$arraySel, $save_to);
$categories = tmpTable($save_to, $arraySel);
$arraySel = 'colors';
$urlColorList = 'http://atelier-hub.com/test/ColorList';
$callColorList = apiCall($urlColorList, $arraySel, $save_to);

$colours = tmpTable($save_to, $arraySel, $save_to);
$arraySel = 'goods';
$urlGoodsList = 'http://atelier-hub.com/test/GoodsList';
$callGoodsList = apiCall($urlGoodsList,$arraySel, $save_to);
$goods = tmpTable($save_to, $arraySel);
$arraySel = 'goodsDetail';
$urlGoodsDetailList = 'http://atelier-hub.com/test/GoodsDetailList';
$callGoodsDetailList = apiCall($urlGoodsDetailList,$arraySel, $save_to);
$goodsDetails = tmpTable($save_to, $arraySel);
$arraySel = 'goodsPrice';
$urlGoodsPriceList = 'http://atelier-hub.com/test/GoodsPriceList';
$callGoodsPriceList = apiCall($urlGoodsPriceList,$arraySel, $save_to);
$goodsPrice = tmpTable($save_to, $arraySel);
$rawData = populateJson($genders, $goods, $goodsDetails, $brands, $goodsPrice, $categories);

