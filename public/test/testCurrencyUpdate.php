<?php

require '../../iwesStatic.php';
$url = 'http://api.exchangeratesapi.io/v1/latest?access_key=d0ebc4ec51befe0de5dfe328d1a83eba&symbol=EUR,USD,AUD,PLN,MXN';
$currencyRepo=\Monkey::app()->repoFactory->create('Currency');
$rawdata = file_get_contents($url);
$decodedArray = json_decode($rawdata, true);
$rates=$decodedArray['rates'];
foreach ($rates as $key => $value){
    $currency=$currencyRepo->findOneBy(['code'=>$key]);
    if($currency){
        $currency->conversionToEur=$value;
        $currency->update();
    }
}









