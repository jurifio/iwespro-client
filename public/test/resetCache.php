<?php
require "../../iwesStatic.php";
\Monkey::app()->cacheService->flushAll(isset($_GET['fulletto']));
opcache_reset();