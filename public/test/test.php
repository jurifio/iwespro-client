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
$url = "http://atelier-hub.com/test/SeasonList";

$username = "test";
$password = "Imagine#";

$url = "http://atelier-hub.com/test/BrandList";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$output = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

$json = json_decode($output, true);

foreach ($json as $key => $jsons) { // This will search in the 2 jsons
    foreach ($jsons as $keys => $value) {
        foreach ($value as $val) {
         //   echo $val['ID'] . "<br>";
        }
    }
}
$url = "http://atelier-hub.com/test/SeasonList";

$username = "test";
$password = "Imagine#";

$url = "http://atelier-hub.com/test/CategoryList";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$output = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

$json = json_decode($output, true);
$menu_array=[];
$category='';
$parentID='';
$categoryOutput=[];
foreach ($json as $key => $jsons) { // This will search in the 2 jsons
    foreach ($jsons as $keys => $value) {
        foreach ($value as $val) {
          //  echo $val['ID'] . "<br>";
            $menu_array[$val['ID']] = array('Name'=>
            $val['Name'],'ParentID'=>$val['ParentID']);
        }
    }
}
function makeList($array) {

    //Base case: an empty array produces no list
    if (empty($array)) return '';

    //Recursive Step: make a list with child lists
    $output = '<ul>';
    foreach ($array as $key => $subArray) {
        $output .= '<li>' . $key . makeList($subArray) . '</li>';
    }
    $output .= '</ul>';

    return $output;
}
makeList($menu_array);











