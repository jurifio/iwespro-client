<?php
header('HTTP/1.1 503 Service Temporarily Unavailable');
header('Status: 503 Service Temporarily Unavailable');
header('Retry-After: 120');
?>
<html>
<head>
    <title>Pickyshop Maintenance</title>
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400,700' media='all' />
</head>
<body>
    <div style="width: 100%;height:100%;">
        <div style="width:270px;margin:20% auto 0 auto;">
            <img src="/themes/flatize/assets/img/logowide.png" width="270" />
            <p style="text-align:center;font-family:Raleway;font-size:12px;">Entro pochi minuti saremo di nuovo online, ci scusiamo per il disagio...</p>
        </div>
    </div>
</body>
</html>

