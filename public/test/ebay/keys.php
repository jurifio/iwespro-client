<?php
/* 2013 eBay Inc., All Rights Reserved */
/* Licensed under CDDL 1.0 -  http://opensource.org/licenses/cddl1.php */
    //show all errors - useful whilst developing
    error_reporting(E_ALL);

    // these keys can be obtained by registering at http://developer.ebay.com
    
    $production         = false;   // toggle to true if going against production
    $compatabilityLevel = 535;    // eBay API version
    
    if ($production) {
        $devID = 'c9ba4236-32c9-4f1a-878c-30797535501d';   // these prod keys are different from sandbox keys
        $appID = 'AAA';
        $certID = '6b130625-4cc0-4f9e-89ed-aaa01c35e067';
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.ebay.com/ws/api.dll';      // server URL different for prod and sandbox
        //the token representing the eBay user to assign the call with
        $userToken = 'YOUR_PROD_TOKEN';          
    } else {  
        // sandbox (test) environment
	    $devID = 'c9ba4236-32c9-4f1a-878c-30797535501d';   // insert your devID for sandbox
	    $appID = 'Bamboosh-93fb-40e0-9001-19ff33823398';   // different from prod keys
	    $certID = '6b130625-4cc0-4f9e-89ed-aaa01c35e067';  // need three 'keys' and one token
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.sandbox.ebay.com/ws/api.dll';
        // the token representing the eBay user to assign the call with
        // this token is a long string - don't insert new lines - different from prod token
        $userToken = 'AgAAAA**AQAAAA**aAAAAA**+t45Vw**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wFk4GgDJiGpAydj6x9nY+seQ**s60DAA**AAMAAA**yKkU57d8ZoM1MijYDGfmIhnEhY5vuzzfH35SisEAuQq2/vKiJ3iFu8u9gTv5FOBzaQbuBoe/42Tk5RaSERbfaMiLsYS1ibB7Q0oXP1DqHKi761dhkFB6TeW72zdPptpTup3YKxAx2N/YoHTLN8mlYF5cOEJy/hHl0eVkqzJyOKURGJmiCpjZ/rG1F5gOjnM8z/SY2vfj4TGrhFUeswXPfM5ojYGbQBzlJwDF/tlyhfd55z5pcqpWT0c3cIRLWxyDAJGRXR32zKkEYGDNrrCqcpOnfWlMWjhNUs4hrkVgLlX68YoyGnDmjiZDh6lMUsu+bkpdR4Z6qM2FR7GK/b0p2Vt1vPwYIg1kBIVDFQyrUkTwmv/o32cGeZ+700bcJB1nYRqI8Pd5woq0ZcnRnZ8j8liGd4Vc6KwjAfa2mTrVUXkfqxwoXG7+2Tk/zcp5e3x+KHiMBQcBlCOD9HAJoOebUiO8kqVtpWboOb+mhk545VeVanMfWxL1SzEtiJe0w7/aVLqwG2T8S8zf6zQulzES99Al/zk47FlqaLq3ZnLMN9nmVeo1UD6eJcAsSfPd10Hlkhf+cTURFRiUtqiUX2/Q/+NdSiLNkRQA2eeW562n/wcz6Y7k8HtgnjZntuNKs+7fV5gYywm6ZAOwv+q68ivN+VzcB+z60OFdEASymrgEXOnS/qF4d1COfx6wfnLIxIYJQyCKzzXi7jZt22uRgqj8M4ygDETpYoyAuCzHrjzLdh49R/FUbRBXY2/EbwXG/s5C';
    }
    
    
?>