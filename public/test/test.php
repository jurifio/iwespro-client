<?php

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
$urlSeasonList = "http://atelier-hub.com/test/SeasonList";
$callSeasonList = apiCall($urlSeasonList);
$arraySel = "season";
$seasons = tmpTable($callSeasonList);
$isFindIdSeason = isFind($seasons);

$urlGenderList = "http://atelier-hub.com/test/GenderList";
$callGenderList = apiCall($urlGenderList);
$arraySel = "gender";
$genders = tmpTable($callGenderList);
$ifFindGenderId = isFind($genders);

$urlBrandList = "http://atelier-hub.com/test/BrandList";
$callBrandList = apiCall($urlBrandList);
$arraySel = "brand";
$brands = tmpTable($callBrandList);
$isFindIdBrand = isFind($brands);

$urlCategoryList = "http://atelier-hub.com/test/CategoryList";
$callCategoryList = apiCall($urlCategoryList);
$arraySel = "category";
$categories = tmpTable($callCategoryList);
$isFindIdCategory = isFind($categories);

$urlColorList = "http://atelier-hub.com/test/ColorList";
$callColorList = apiCall($urlColorList);
$arraySel = "colors";
$colors = tmpTable($callColorList);
$isFindIdCategory = isFind($colors);

$urlGoodsList = "http://atelier-hub.com/test/GoodsList";
$callGoodsList = apiCall($urlGoodsList);
$arraySel = "goods";
$goods = tmpTable($callGoodsList);
$isFindIdGood = isFind($goods);

$urlGoodsDetailList = "http://atelier-hub.com/test/GoodsDetailList";
$callGoodsDetailList = apiCall($urlGoodsDetailList);
$arraySel = "goodsDetail";
$goodsDetails = tmpTable($callGoodsDetailList);
$isFindIdGoodDetails = isFind($goodsDetails);


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
                switch ($arraySel) {
                    case "season":
                        $a[] = array_merge($tmpTable, array('ID' => $val['ID'], 'Name' => $val['Name']));
                        break;
                    case "gender":
                        $a[] = array_merge($tmpTable, array('ID' => $val['ID'], 'Name' => $val['Name']));
                        break;
                    case "brand":
                        $a[] = array_merge($tmpTable, array('ID' => $val['ID'], 'Name' => $val['Name']));
                        break;
                    case "category":
                        $a[] = array_merge($tmpTable, array('ID' => $val['ID'], 'Name' => $val['Name'], 'ParentID' => $val['ParentID'], 'ParentName' => $val['ParentName'], 'GenderID' => $val['GenderID']));
                        break;
                    case "colors":
                        $a[] = array_merge($tmpTable, array('ColorName' => $val['ColorName'], 'SuperColor' => $val['SuperColor']));
                        break;
                    case "goods":
                        $a[] = array_merge($tmpTable, array('ID' => $val['ID'], 'Name' => $val['Name'], 'ParentID' => $val['ParentID'], 'ParentName' => $val['ParentName'], 'GenderID' => $val['GenderID']));
                        break;
                    case "goodsDetail":
                        $a[] = array_merge($tmpTable, array('ID' => $val['ID'], 'Name' => $val['Name'], 'ParentID' => $val['ParentID'], 'ParentName' => $val['ParentName'], 'GenderID' => $val['GenderID']));
                        break;
                }

            }

        }
    }

    return $a;

}

function isFind($a = null)
{
    foreach ($a as $k => $ks) {
        foreach ($ks as $kss => $c) {
            if ($kss == 'ID') {
                echo $c . "<br>";
            }
        }
    }
}



