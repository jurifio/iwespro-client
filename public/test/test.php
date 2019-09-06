<?php
ini_set("memory_limit", "2000M");
ini_set('max_execution_time', 0);
$ttime = microtime(true);
$time = microtime(true);
require '../../iwesStatic.php';
var_dump('Applicazione  \t\t\t\t' . (microtime(true) - $time));

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
    $fp = fopen($savedir.$arraySel.'.json', 'wb');
    fwrite($fp, $output);
    fclose($fp);
    
}

/**
 * @param null $savetodir
 * @param null $arraySel
 * @return array|null
 */
function tmpTable($savetodir = null, $arraySel = null)
{
    $file = $savetodir . $arraySel . '.json';
    $json = json_decode(file_get_contents($file), true);
    $tmpTable = [];
    $a=null;
                switch ($arraySel) {
                    case 'goodsPrice':
                        foreach ($json as $key => $jsons) { // This will search in the 2 jsons
                            foreach ($jsons as $keys => $valuem) {
                                foreach ($valuem as $put => $vall) {
                                    $price = [];
                                    foreach ($vall['Retailers'] as $v => $prices) {
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
                                        'ID' => $vall['ID'], 'Retailers' => $price);
                                }
                            }
                        }
                        $a = $tmpTable;
                        break;
                    case 'season':
                        foreach ($json as $key => $jsons) { // This will search in the 2 jsons
                            foreach ($jsons as $keys => $valuem) {
                                foreach ($valuem as $put => $vall) {
                        $tmpTable[] = array('ID' => $vall['ID'], 'Name' => $vall['Name']);
                                }
                            }
                        }
                        $a = $tmpTable;
                        break;
                    case 'gender':
                        foreach ($json as $key => $jsons) {
                            foreach ($jsons as $keys => $valuem) {
                                foreach ($valuem as $put => $vall) {
                        $tmpTable[] = array('ID' => $vall['ID'], 'Name' => $vall['Name']);
                                }
                            }
                        }
                        $a = $tmpTable;
                        break;
                    case 'brand':
                        foreach ($json as $key => $jsons) {
                            foreach ($jsons as $keys => $valuem) {
                                foreach ($valuem as $put => $vall) {
                        $tmpTable[] = array('ID' => $vall['ID'], 'Name' => $vall['Name']);
                                }
                            }
                        }
                        $a = $tmpTable;
                        break;
                    case 'category':
                        foreach ($json as $key => $jsons) {
                            foreach ($jsons as $keys => $valuem) {
                                foreach ($valuem as $put => $vall) {
                        $tmpTable[] = array('ID' => $vall['ID'], 'Name' => $vall['Name'], 'ParentID' => $vall['ParentID'], 'ParentName' => $vall['ParentName'], 'GenderID' => $vall['GenderID']);
                                }
                            }
                        }
                        $a = $tmpTable;
                        break;
                    case 'colors':
                        foreach ($json as $key => $jsons) {
                            foreach ($jsons as $keys => $valuem) {
                                foreach ($valuem as $put => $vall) {
                        $tmpTable[] = array('ColorName' => $vall['ColorName'], 'SuperColor' => $vall['SuperColor']);
                                }
                            }
                        }
                        $a = $tmpTable;
                        break;
                    case 'goods':
                        foreach ($json as $key => $jsons) {
                            foreach ($jsons as $keys => $valuem) {
                                foreach ($valuem as $put => $vall) {
                        $tmpTable[] = array(
                            'ID' => $vall['ID'],
                            'Model' => $vall['Model'],
                            'Variant' => $vall['Variant'],
                            'Season' => $vall['Season'],
                            'Collection' => $vall['Collection'],
                            'BrandID' => $vall['BrandID'],
                            'ParentCategoryID' => $vall['ParentCategoryID'],
                            'CategoryID' => $vall['CategoryID'],
                            'GenderID' => $vall['GenderID'],
                            'Code' => $vall['Code'],
                            'GoodsName' => $vall['GoodsName'],
                            'InStock' => $vall['InStock'],
                            'MainPicture' => $vall['MainPicture'],
                            'CreatedTime' => $vall['CreatedTime'],
                            'ModifiedTime' => $vall['ModifiedTime']
                        );
                                }
                            }
                        }
                        $a = $tmpTable;
                        break;
                    case 'goodsDetail':
                        foreach ($json as $key => $jsons) {
                            foreach ($jsons as $keys => $valuem) {
                                foreach ($valuem as $put  => $vall) {
                                    $item = [];
                        foreach ($vall['Stock'] as $v => $it) {
                            foreach ($it as $items) {
                                $Barcode = $items['Barcode'];
                                $Size = $items['Size'];
                                $Qty = $items['Qty'];
                                if ($Qty !=='0') {
                                    $item[] = array('Barcode' => $Barcode, 'Size' => $Size, 'Qty' => $Qty);
                                }
                            }
                        }
                        $Pictures = [];
                        foreach ($vall['Pictures'] as $kp => $tu) {
                            foreach ($tu as $pic) {
                                $No = $pic['No'];
                                $PictureUrl = $pic['PictureUrl'];
                                $PictureThumbUrl = $pic['PictureThumbUrl'];
                                $Pictures[] = array('No' => $No, 'PictureUrl' => $PictureUrl, 'PictureThumbUrl' => $PictureThumbUrl);
                            }
                        }
                        $tmpTable[] = array(
                            'ID' => $vall['ID'],
                            'SuperColor' => $vall['SuperColor'],
                            'Color' => $vall['Color'],
                            'Fabric' => $vall['Fabric'],
                            'Composition' => $vall['Composition'],
                            'SizeAndFit' => $vall['SizeAndFit'],
                            'MadeIn' => $vall['MadeIn'],
                            'Stock' => $item,
                            'Pictures' => $Pictures,
                            'CreatedTime' => $vall['CreatedTime'],
                            'ModifiedTime' => $vall['ModifiedTime']);
                                }
                            }
                        }
                        $a = $tmpTable;
                        $tmpTable=null;
                        break;
                }

    return $a;

}

$arraySeason = 'season';
$urlSeasonList = 'http://atelier-hub.com/test/SeasonList';
/** @var  $callSeasonList */
 apiCall($urlSeasonList,$arraySeason, $save_to);
$seasons = tmpTable($save_to, $arraySeason);
$arrayGender = 'gender';
$urlGenderList = 'http://atelier-hub.com/test/GenderList';
 apiCall($urlGenderList,$arrayGender, $save_to);
$genders = tmpTable($save_to, $arrayGender);
$arrayBrand = 'brand';
$urlBrandList = 'http://atelier-hub.com/test/BrandList';
 apiCall($urlBrandList,$arrayBrand, $save_to);
$brands = tmpTable($save_to, $arrayBrand);
$arrayCategory = 'category';
$urlCategoryList = 'http://atelier-hub.com/test/CategoryList';
 apiCall($urlCategoryList,$arrayCategory, $save_to);
$categories = tmpTable($save_to, $arrayCategory);
$arrayColors = 'colors';
$urlColorList = 'http://atelier-hub.com/test/ColorList';
 apiCall($urlColorList, $arrayColors, $save_to);

$colours = tmpTable($save_to, $arrayColors);
$arrayGoods = 'goods';
$urlGoodsList = 'http://atelier-hub.com/test/GoodsList';
 apiCall($urlGoodsList,$arrayGoods, $save_to);
$goods = tmpTable($save_to, $arrayGoods);
$arrayGoodsDetail = 'goodsDetail';
$urlGoodsDetailList = 'http://atelier-hub.com/test/GoodsDetailList';
 apiCall($urlGoodsDetailList,$arrayGoodsDetail, $save_to);
$goodsDetails = tmpTable($save_to, $arrayGoodsDetail);
$arrayGoodsPrice = 'goodsPrice';
$urlGoodsPriceList = 'http://atelier-hub.com/test/GoodsPriceList';
 apiCall($urlGoodsPriceList,$arrayGoodsPrice, $save_to);
$goodsPrice = tmpTable($save_to, $arrayGoodsPrice);


    $arrayPopulate = [];
    foreach ($goodsDetails as $k => $ks) {
        $SizeUnique = null;
        $shopId = 55;
        foreach ($ks as $kk => $val) {
            if ($kk === 'ID') {
                $ID = $val;
                $prListino=null;
                $prAcquisto=null;
                $Model = isFindReturn($goods, $ID, 'ID', 'Model');
                $Variant = isFindReturn($goods, $ID, 'ID', 'Variant');
                $stagione = isFindReturn($goods, $ID, 'ID', 'Season');
                $marchioId = isFindReturn($goods, $ID, 'ID', 'BrandID');
                $marchio = isFindReturn($brands, $marchioId, 'ID', 'Name');
                $prListino = isDeepFindReturn($goodsPrice, $ID, 'Retailers', 'BrandReferencePrice');
                $PrAcquisto = isDeepFindReturn($goodsPrice, $ID, 'Retailers', 'NetPrice');
                $repartoId = isFindReturn($goods, $ID, 'ID', 'GenderID');
                $reparto = isFindReturn($genders, $repartoId, 'ID', 'Name');
                $cat1Id = isFindReturn($goods, $ID, 'ID', 'ParentCategoryID');
                $cat1 = isFindReturn($categories, $cat1Id, 'ID', 'Name');
                $cat2Id = isFindReturn($goods, $ID, 'ID', 'CategoryID');
                $cat2 = isFindReturn($categories, $cat2Id, 'ID', 'Name');
                $articolo = $Model . '-' . $Variant;
            }
            if ($kk === 'Color') {
                $colore = $val;

            }
            if ($kk === 'Stock') {
                $sizesQty = [];
                foreach ($val as $robt) {
                    if($robt['Size']!==0) {
                        $sizesQty[] = array('Barcode' => $robt['Barcode'], 'Size' => $robt['Size'], 'Qty' => $robt['Qty']);
                    }
                }
            }
            $string = '';
            if ($kk === 'Pictures') {
                foreach ($val as $rowPic) {
                    $string .= $rowPic['PictureUrl'] . ',';
                }
            }
            if ($string !== '') {
                $stringDef = substr($string, 0, -1);
                $PictureUrl = explode(',', $stringDef);
                foreach ($sizesQty as $roast) {
                    $barcode = $roast['Barcode'];
                    $SizeUnique = $roast['Size'];
                    $qty = $roast['Qty'];
                    if($SizeUnique!=='0') {
                        $arrayPopulate[] = [
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
                            'taglia' => $SizeUnique,
                            'esistenza' => $qty,
                            'barcode' => $barcode,
                            'img' => $PictureUrl
                        ];
                    }
                }
                $sizesQty=null;

            }

        }
    }
 $c=json_encode($arrayPopulate);
$fp = fopen($savedir.'output.json', 'wb');
fwrite($fp, $c);
fclose($fp);

function isFindReturn($array , $filterByValue , $filterByColumn , $valueToReturn)
{
    $key = array_search($filterByValue, array_column($array, $filterByColumn), true);
    return $array[$key][$valueToReturn];
}

function isDeepFindReturn($array , $filterByValue, $filterByColumn, $valueToReturn)
{
    $key = array_search($filterByValue, array_column($array, 'ID'), true);
    $val = $array[$key][$filterByColumn];
    foreach ($val as $kzu => $value) {
        foreach ($value as $zzu=> $vale ) {
            if ($zzu === $valueToReturn) {
                $res = $vale;
            }
        }
    }
    return $res;
}

