<?php
require "../../../iwesStatic.php";
/*
$devID = 'c9ba4236-32c9-4f1a-878c-30797535501d';   // insert your devID for sandbox
$appID = 'Bamboosh-93fb-40e0-9001-19ff33823398';   // different from prod keys
$certID = '6b130625-4cc0-4f9e-89ed-aaa01c35e067';  // need three 'keys' and one token
$serverUrl = 'https://api.sandbox.ebay.com/ws/api.dll';
$userToken = 'AgAAAA**AQAAAA**aAAAAA**+ThVVw**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wFk4GgDJiGpAydj6x9nY+seQ**s60DAA**AAMAAA**yKkU57d8ZoM1MijYDGfmIhnEhY5vuzzfH35SisEAuQq2/vKiJ3iFu8u9gTv5FOBzaQbuBoe/42Tk5RaSERbfaMiLsYS1ibB7Q0oXP1DqHKi761dhkFB6TeW72zdPptpTup3YKxAx2N/YoHTLN8mlYF5cOEJy/hHl0eVkqzJyOKURGJmiCpjZ/rG1F5gOjnM8z/SY2vfj4TGrhFUeswXPfM5ojYGbQBzlJwDF/tlyhfd55z5pcqpWT0c3cIRLWxyDAJGRXR32zKkEYGDNrrCqcpOnfWlMWjhNUs4hrkVgLlX68YoyGnDmjiZDh6lMUsu+bkpdR4Z6qM2FR7GK/b0p2Vt1vPwYIg1kBIVDFQyrUkTwmv/o32cGeZ+700bcJB1nYRqI8Pd5woq0ZcnRnZ8j8liGd4Vc6KwjAfa2mTrVUXkfqxwoXG7+2Tk/zcp5e3x+KHiMBQcBlCOD9HAJoOebUiO8kqVtpWboOb+mhk545VeVanMfWxL1SzEtiJe0w7/aVLqwG2T8S8zf6zQulzES99Al/zk47FlqaLq3ZnLMN9nmVeo1UD6eJcAsSfPd10Hlkhf+cTURFRiUtqiUX2/Q/+NdSiLNkRQA2eeW562n/wcz6Y7k8HtgnjZntuNKs+7fV5gYywm6ZAOwv+q68ivN+VzcB+z60OFdEASymrgEXOnS/qF4d1COfx6wfnLIxIYJQyCKzzXi7jZt22uRgqj8M4ygDETpYoyAuCzHrjzLdh49R/FUbRBXY2/EbwXG/s5C';
*/
$configDev = [
	'appID' => 'Bamboosh-93fb-40e0-9001-19ff33823398',
	'devID' => 'c9ba4236-32c9-4f1a-878c-30797535501d',
	'certID' => '6b130625-4cc0-4f9e-89ed-aaa01c35e067',
	'serverUrl' => 'https://api.sandbox.ebay.com/ws/api.dll',
	'compatabilityLevel' => 965,
	'siteID' => 101,
	'userToken' => 'AgAAAA**AQAAAA**aAAAAA**Ael8Vw**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wFk4GgDJiGpAydj6x9nY+seQ**s60DAA**AAMAAA**yKkU57d8ZoM1MijYDGfmIhnEhY5vuzzfH35SisEAuQq2/vKiJ3iFu8u9gTv5FOBzaQbuBoe/42Tk5RaSERbfaMiLsYS1ibB7Q0oXP1DqHKi761dhkFB6TeW72zdPptpTup3YKxAx2N/YoHTLN8mlYF5cOEJy/hHl0eVkqzJyOKURGJmiCpjZ/rG1F5gOjnM8z/SY2vfj4TGrhFUeswXPfM5ojYGbQBzlJwDF/tlyhfd55z5pcqpWT0c3cIRLWxyDAJGRXR32zKkEYGDNrrCqcpOnfWlMWjhNUs4hrkVgLlX68YoyGnDmjiZDh6lMUsu+bkpdR4Z6qM2FR7GK/b0p2Vt1vPwYIg1kBIVDFQyrUkTwmv/o32cGeZ+700bcJB1nYRqI8Pd5woq0ZcnRnZ8j8liGd4Vc6KwjAfa2mTrVUXkfqxwoXG7+2Tk/zcp5e3x+KHiMBQcBlCOD9HAJoOebUiO8kqVtpWboOb+mhk545VeVanMfWxL1SzEtiJe0w7/aVLqwG2T8S8zf6zQulzES99Al/zk47FlqaLq3ZnLMN9nmVeo1UD6eJcAsSfPd10Hlkhf+cTURFRiUtqiUX2/Q/+NdSiLNkRQA2eeW562n/wcz6Y7k8HtgnjZntuNKs+7fV5gYywm6ZAOwv+q68ivN+VzcB+z60OFdEASymrgEXOnS/qF4d1COfx6wfnLIxIYJQyCKzzXi7jZt22uRgqj8M4ygDETpYoyAuCzHrjzLdh49R/FUbRBXY2/EbwXG/s5C',
];
//ITALIA
$configProd = [
	'appID' => 'Bamboosh-95f3-4ca8-9b04-b30231ed5a9d',
	'devID' => 'c9ba4236-32c9-4f1a-878c-30797535501d',
	'certID' => 'a835f162-0ddd-4d01-94e3-a6009ba7643b',
	'serverUrl' => 'https://api.ebay.com/ws/api.dll',
	'compatabilityLevel' => 965,
    'siteID' => 101,
	'userToken' => 'AgAAAA**AQAAAA**aAAAAA**mDD8Wg**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6AFlIekDZKGpw2dj6x9nY+seQ**ECoDAA**AAMAAA**ZXkcpdsnzIff5OAWBzjD8620Mufn6RBRGnOjhyY0lvDeS7f2dPLljsrXYq69BYPZPVaJvnXMO1mLsYsTFcvsE0IF6qpGwVKzm5Ik+f9UIXHHgq0su//TOk+MVWs8vO43UG43gFgo8ffUOC+udNS8kV8RoKS/yEOia4xhyx8cF2VPIzRpa3tthkxBEW+qdVuMMF81XdRA7ixnHFRYtPIAWzgiFbYyKyWx0JcHMZVd9trMzDaMLWgP4ZnwIJgyAfuxWjqtcnaCKWA/1n593fXPxA2ooSxsl4LRvHMHBw+DGEilbqlHybcugGQjRMyaCxj189oK3NdlTCOWgv9vuw7COR0GMtp0jMVy6T76wIDRXgYTDEymu688ijWeHtxEUOLLP/KmE9RZ/DqhwhoZCd0IoXlrikIWY12GJfY9ghxNe2zccHMhr2dgTAEViSSzfZvEMmcLbMYO9nnzHjmHuWBGrxtq7wOGAIx82R+i7nUOgZZ7FCO2lXq3xE8uJw2TZLRll64d/mQHJYEitIYkX5pF8vlef8Fe6vQ+XlmWuHy6rxKqjoui0o0hsH0pdY5vCbPG4+c6hexiEwegTVGtmGmDtOFSnDfAmsByY6vltDFhYsQrLPhetcfZtFlp9baZwZ0Jn96lXZ7dzif8qPD5tuXYjDlJzZf6PLehW0tvA9dxqBKTLHAKZGny9b3IMFyOK7LRhJf7faSInfLFf23M+PB6blpb6RxHC4MZBSsWuSkYhY4krTlUwSNltoL9nyh279O5',
];
// GERMANIA
$configProd['siteID'] = 77;
// AUSTRIA
//$configProd['siteID'] = 16;
// USA
//$configProd['siteID'] = 0;
// UK
//$configProd['siteID'] = 3;
// AUSTRALIA
//$configProd['siteID'] = 15;

