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
\Monkey::app()->vendorLibraries->load('videoEditing');

$ffmpeg = \FFMpeg\FFMpeg::create();
/*if(ENV=='dev') {
    $video = $ffmpeg->open('/media/sf_sites/iwespro/temp/video.mp4');
    $format=new \FFMpeg\Format\Video\X264('libmp3lame', 'libx264');
    $video->addFilter(new \FFMpeg\Filters\Audio\SimpleFilter(array('-i ' . '/media/sf_sites/iwespro/temp/audio.mp3','-shortest')));
        $video->save($format,'/media/sf_sites/iwespro/temp-remaster/shootImport/resize/carte1610ok/2020-10-23/video2.mp4');

}else{
    $video = $ffmpeg->open('/home/iwespro/public_html/temp/video.mp4');

    $video->addFilter(new FFMpeg\FFMpeg\Filters\Audio\SimpleFilter(array('-i ' . '/home/iwespro/public_html/temp/audio.mp3','-shortest')))
        ->save(FFMpeg\Format\Video\X264(),'/home/iwespro/public_html/temp-remaster/testoutput.mp4');
}*/
if (ENV=='dev') {
    $cmd = "ffmpeg -i /media/sf_sites/iwespro/temp/video.mp4 -vcodec copy -an /media/sf_sites/iwespro/temp-remaster/shootImport/resize/carte1610ok/2020-10-23/video2.mp4";
//$cmd = "ffmpeg -y -i /media/sf_sites/iwespro/temp/video.mp4 -i /media/sf_sites/iwespro/temp/audio.mp3 -shortest -vcodec libx264 -acodec libfaac -b:v 1000k -refs 6 -coder 1 -sc_threshold 40 -flags +loop -me_range 16 -subq 7 -i_qfactor 0.71 -qcomp 0.6 -qdiff 4 -trellis 1 -b:a 128k -pass 1 -passlogfile /media/sf_sites/iwespro/temp-remaster/shootImport/resize/carte1610ok/2020-10-23/video3.mp4";
    exec($cmd,$output);
}else{
    $cmd = "ffmpeg -i /home/iwespro/public_html/temp/video.mp4 -vcodec copy -an /home/iwespro/public_html/temp-remaster/shootImport/workvideo/video2.mp4";
//$cmd = "ffmpeg -y -i /media/sf_sites/iwespro/temp/video.mp4 -i /media/sf_sites/iwespro/temp/audio.mp3 -shortest -vcodec libx264 -acodec libfaac -b:v 1000k -refs 6 -coder 1 -sc_threshold 40 -flags +loop -me_range 16 -subq 7 -i_qfactor 0.71 -qcomp 0.6 -qdiff 4 -trellis 1 -b:a 128k -pass 1 -passlogfile /media/sf_sites/iwespro/temp-remaster/shootImport/resize/carte1610ok/2020-10-23/video3.mp4";
    exec($cmd,$output);
}


