<?php
require "../../iwesStatic.php";

$x = new \bamboo\core\worker\CWorkDispatch();
var_dump('Worker Impegnati: '.$x->readPoolStatus().' di '.$x->getPoolSize());
var_dump('Coda di lavori: '.$x->readQueueStatus());
