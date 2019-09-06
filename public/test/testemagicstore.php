<?php

/* time limit = 15 minutes */
set_time_limit(900);
ini_set('display_errors', '0');
$queue = ' / queue / partner12345';
/* connection */
try {
    $stomp = new Stomp('ssl://sandbox.magicapp.net:8444',
'partner12345User', 'partner12345Passwd', array('host' => 'epa - virtualhost', "heart-beat" => "0,20000") );
} catch (Exception $e) {
    die('Connection failed: ' . $e->getMessage());
}
/* subscribe to messages from the queue */
try {
    $stomp->subscribe($queue, array('prefetch - count' => 1, 'ack' => 'client'));
} catch (Exception $e) {
    die('Subscribe failed: ' . $e->getMessage());
}
/* read a frame */
while (true) {
    try {
        $frame = $stomp->readFrame();
        if ($frame != null) {
            echo "Received message with body '$frame->body' on ";
            echo date('l jS \of F Y h:i:s A');
echo "<br>";
/* acknowledge that the frame was received */
$stomp->ack($frame);
} else {
            echo "Failed to receive a message<br>";
        }
        ob_flush();
        flush();
    } catch (Exception $e) {
        echo "Exception '$e' on ";
        echo date('l jS \of F Y h:i:s A');
echo "<br>";
}
}
/* close connection */
unset($stomp);
?>