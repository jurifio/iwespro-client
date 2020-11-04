<?php

use bamboo\core\exceptions\BambooException;

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
\Monkey::app()->vendorLibraries->load("videoEditing");

$ffmpeg = FFMpeg\FFMpeg::create();

$video = $ffmpeg->open('/media/sf_sites/iwespro/temp/video.mp4');

$video->addFilter(new \FFMpeg\Filters\Audio\SimpleFilter(array('-i ' . '/media/sf_sites/iwespro/temp/audio.mp3', '-shortest')))
       ->save(new \FFMpeg\Format\Video\X264(), '/media/sf_sites/iwespro/temp-remaster/testoutput.mp4');

