<?php

require '/media/sf_sites/vendor/mailgun/vendor/autoload.php';
use Mailgun\Mailgun;
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
$mgClient = new Mailgun('key-1d5fe7e72fab58615be0d245d90e9e56');
$domain = 'iwes.pro';
$dateformat=strtotime('2019-10-22 00:03:26');
$beginDate=date("D,d M Y H:i:s -0000",$dateformat);
$endDate=date("D,d M Y H:i:s -0000");
$queryString = array(
    'begin'        => 'Fri, 23 November 2019 09:00:00 -0000',
    'end'          => $endDate,
    'ascending'    => 'yes',
    'pretty'       => 'yes',
    'recipient'    => 'gianluca@iwes.it',
    'event'        => 'delivered'
);
/*
# Make the call to the client.
$result = $mgClient->get("$domain/events", $queryString);
var_dump($result);
$messageId='message-id';
$bodyplain='body-plain';

foreach ($result->http_response_body->items as $list ) {
        echo 'oraInvio:' . date('d-m-Y H:s:i',$list->timestamp) . '<br>';
        if (!empty($list->envelope->sender)) {
            echo 'sender:' . $list->envelope->sender . '<br>';
        }
        if (!empty($list->envelope->targets)) {
            echo 'targets:' . $list->envelope->targets . '<br>';
        }
        if (!empty($list->message->headers->to)) {
            echo 'to:' . $list->message->headers->to . '<br>';
        }
        if (!empty($list->message->headers->from)) {
            echo 'from:' . $list->message->headers->from . '<br>';
        }
        if (!empty($list->message->headers->subject)) {
            echo 'oggetto:' . $list->message->headers->subject . '<br>';
        }
        if (!empty($list->message->headers->$messageId)) {
            echo 'oggetto:' . $list->message->headers->$messageId . '<br>';
        }
        if (!empty($list->message->headers->$bodyplain)) {
            echo 'oggetto:' . $list->message->headers->$bodyplain . '<br>';
        }
        //  echo "testo:".$list->message->headers->subject->body-html;

}
*/
/*
$cartDate = new \DateTime('2017-12-16 23:34:24');
$defDate = $cartDate->format('Y-m-d H:i:s');
$firsTimeEmailSendDay='7';
$firstTimeEmailSendHour='18';
$firstEmailSendDate=date('Y-m-d',strtotime('+'.$firsTimeEmailSendDay.' day ',strtotime($defDate)));
$firstEmailSendDate=date('Y-m-d '.$firstTimeEmailSendHour.':i:s',strtotime(($firstEmailSendDate)));
//echo $firstEmailSendDate;
$validity='P3D';
$issueDate = new \DateTime();
echo $issueDate->format('Y-m-d H:i:s').'<br>';
$validUntil = new \DateInterval($validity);
$validThru = $issueDate->add($validUntil);
$validThru = date_format($validThru,'Y-m-d H:i:s');
echo $validThru;

echo '<br>';
$paymentDate = new DateTime('2019-12-11 17:59:49'); // Today
echo $paymentDate->format('d/m/Y'); // echos today!
$contractDateBegin = new DateTime();
$contractDateEnd  = new DateTime('+1 day');

if (
    $paymentDate->getTimestamp() > $contractDateBegin->getTimestamp() &&
    $paymentDate->getTimestamp() < $contractDateEnd->getTimestamp()){
    echo "is between";
}else{
    echo "NO GO!";
}
*/
/*
$valuePrice=5;
if($valuePrice==5){
    $shipmentServiceOptions=[
        'COD'=>[
            'CODAmount'=>[
                'MonetaryValue'=>$valuePrice,
                'CurrencyCode'=>'EUR'
            ],
            'CODFundsCode '=>'0',
            'CODCode'=>'3',
        ],
    ];

}else{
    $shipmentServiceOptions='';
}
echo '<br>spedizione<br>';
$delivery = [
    'UPSSecurity' => [
        'UsernameToken' => [
            'Username' => 'iwes123',
            'Password' => 'Spedizioni123',
        ],
        "ServiceAccessToken" => [
            'AccessLicenseNumber' =>
                'ED3442CCB18DBE8C'
        ]
    ],
    'ShipmentRequest' => [
        'Request' => [
            'RequestOption' => 'validate',
            'TransactionReference' => [
                'CustomerContext' => 'CustomerContext.' //???
            ]
        ],
        'Shipment' => [
            'Description' => 'spedizionetest',
            'Shipper' => [
                'Name' => 'iwesnc',
                'AttentionName' => '',
                'ShipperNumber' => '463V1V',
                'Address' => [
                    'AddressLine' => 'via cesare Pavese 1',
                    'City' => 'Civitanova Marche',
                    'PostalCode' => '62012',
                    'CountryCode' => 'IT'
                ],
                'Phone' => [
                    'Number' => '+390733471365' //$shipment->fromAddress->phone ?? $shipment->fromAddress->cellphone
                ]
            ],
            'ShipFrom' => [
                'Name' => 'Cellone',
                'Address' => [
                    'AddressLine' => 'via cesare Pavese ',
                    'City' => 'Civitanova Marche',
                    'PostalCode' => '62012',
                    'CountryCode' => 'IT'
                ]
            ],
            'ShipTo' => [
                'AttentionName' => 'Bruna Fraticelli',
                'Name' => 'Bruna Fraticelli',
                'Address' => [
                    'AddressLine' => 'via emilia 45',
                    'City' => 'Sant\'Elpidio a Mare',
                    'PostalCode' => '63811',
                    'CountryCode' => 'IT'
                ],
                'Phone' => [
                    'Number' => '+390734858273'
                ]
            ],
            'PaymentInformation' => [
                'ShipmentCharge' => [
                    'Type' => '01',
                    'BillShipper' => [
                        'AccountNumber' => '463V1V'
                    ]
                ]
            ],
            'Service' =>[
                'Code' => '11',
                'Description' => 'UPS STANDARD'
            ],
            'ShipMentServiceOptions'=>$shipmentServiceOptions,

            'Package' => [
                'Description' => 'Scatola di Cartone',
                'Packaging' => [
                    'Code' => '02',
                    'Description' => 'Customer Supplied'
                ],
                'Dimensions' => [
                    'UnitOfMeasurement' => [
                        'Code' => 'CM'

                    ],
                    'Length' => '45',
                    'Width' => '35',
                    'Height' => '15'
                ],
                'PackageWeight' => [
                    'UnitOfMeasurement' => [
                        'Code' => 'KGS',
                        'Description' => 'Kilograms'
                    ],
                    'Weight' => '2.5'
                ]
            ]
        ]
    ]
];
echo var_dump($delivery);

$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL,'https://wwwcie.ups.com/rest/Ship');
curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($delivery));
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_HTTPHEADER,[
    'Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept',
    'Access-Control-Allow-Methods: POST',
    'Access-Control-Allow-Origin: *',
    'Content-type: application/json'
]);
\Monkey::app()->applicationReport(
    'UpsHandler',
    'addDelivery',
    'Called addDelivery to https://wwwcie.ups.com/rest/Ship ' ,
    json_encode($delivery));
$result = curl_exec($ch);
$e = curl_error($ch);
curl_close($ch);

$rs=json_decode($result);
$data=base64_decode($rs->ShipmentResponse->ShipmentResults->PackageResults->ShippingLabel->GraphicImage);
file_put_contents("imgshipping.gif",$data);
echo '<img src="imgshipping.gif"/>';

echo '<br>find test<br>';
echo '<br>spedizione<br>';
*/
$countStatusCancel = 1;
$countStatusShipped = 0;
$countStatusWorking = 0;
$orderLineWorking = ['ORD_WAIT','ORD_PENDING','ORD_LAB','ORD_FRND_OK','ORD_FRND_SENT','ORD_CHK_IN','ORD_PCK_CLI','ORD_FRND_SNDING','ORD_MAIL_PREP_C','ORD_FRND_ORDSNT'];

if(in_array('ORD_FRND_SNDING',$orderLineWorking)) {
    echo 'perlamadonna';
    }



