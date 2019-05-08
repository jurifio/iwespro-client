<?php
require "../../iwesStatic.php";

$x = new \bamboo\core\worker\CWorkDispatch();
$x->getCache()->delete($x->getPoolPipeName());