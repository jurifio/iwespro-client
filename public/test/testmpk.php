<?php
require '../../iwesStatic.php';
$maxProducts=4000;
$offSet=1;
$limitStart=1;
$limitEnd=0;
$k=0;
$url='https://di.efashion.cloud/api/v3.0/products/condensed?storeCode=YHPE6';
for($i=1;$i<=$maxProducts;$i++) {

    if ($i%500) {
        continue;
    }else{
        $limitEnd = $limitEnd + 500;
        $urlDef = $url . '&offset=' . $limitStart . '&limit=500';
        echo $urlDef.'<br>';
        $get_data = callAPI('GET',$urlDef,false);
        $response = json_decode($get_data);
        file_put_contents('/media/sf_sites/iwespro/temp/prova.json',json_encode($response->results->items));
        foreach ($response->results->items as $rawSkus) {



                echo $k.'-'.$rawSku['product_id'] . '</br>';
               /* foreach ($rawSku['item_images']['full'] as $rawDirtySku) {
                    echo $rawDirtySku . '</br>';
                }*/
                $k++;
            }

        $offSet++;
        $limitStart=$limitStart+500;
    }
}
/*if($k<$maxProducts) {
    $limitStart=$limitStart-500;
    $limitEnd =  $k;
    echo 'inizio differenza';
    $urlDef = $url . '&offset=' . $offSet . '&limit=' . $limitStart . ',' . $limitEnd;
    echo $urlDef.'<br>';
    $get_data = callAPI('GET',$urlDef,false);
    $response = json_decode($get_data,true);
    foreach ($response as $rawSkus) {
        foreach ($rawSkus['items'] as $rawSku) {
            $k++;
            echo $k.'-'.$rawSku['product_id'] . '</br>';
            /* foreach ($rawSku['item_images']['full'] as $rawDirtySku) {
                 echo $rawDirtySku . '</br>';
             }

        }
    }
}*/

function callAPI($method, $url, $data){
    $curl = curl_init();

    switch ($method){
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        default:
            if ($data)
                $url = sprintf("%s:%s", $url, http_build_query($data));
    }

    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    // EXECUTE:
    $result = curl_exec($curl);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
    return $result;
}
/*
$order ='{
        "order_number" : "19558915",
        "date":"2021-06-29",
        "items_count":"2",
        "items" : [
            {
            "product":"5938005afd7955c0bff4caa8",
            "quantity":"2",
            "size":"9.5",
            "purchase_price":"282.79"
            },
            {
            "product":"5938005afd7955c0bff4caa8",
            "quantity":"2",
            "size":"8.5",
            "purchase_price":"282.79"
            }
       ]
      }      
        ';
/*$order1 = [
    [
        "order_number" => '1955891',
        "date"=>"2021-06-29",
        "items_count"=>"1",
        "items" => [
            "product"=>"5938005afd7955c0bff4caa8",
            "quantity"=>"1",
            "size"=>"9.5",
            "purchase_price"=>"282.00"
        ]
    ]
];
$send=json_encode($order1);
$addOrderUrl = "https://testing.efashion.cloud/api/v3.0/place/order.json?storeCode=ASAHP";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $addOrderUrl);
curl_setopt($ch, CURLOPT_POSTFIELDS, $order);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept',
    'Access-Control-Allow-Methods: POST',
    'Access-Control-Allow-Origin: *',
    'Content-type: application/x-www-form-urlencoded\r\n'
]);
$result = curl_exec($ch);
$e = curl_error($ch);
curl_close($ch);
echo $result;

$url = "https://testing.efashion.cloud/api/v3.0/place/order.json?storeCode=ASAHP";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "Content-Type: application/x-www-form-urlencoded",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "order=".$order;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);


$url = "https://testing.efashion.cloud/api/v3.0/cancel/order.json?storeCode=ASAHP";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "Content-Type: application/x-www-form-urlencoded",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "order=".$order;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);
*/