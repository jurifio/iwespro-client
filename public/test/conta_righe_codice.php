<?php
require "../../iwesStatic.php";

function getLines($file)
{
    $f = fopen($file, 'rb');
    $lines = 1;

    while (!feof($f)) {
        $lines += substr_count(fread($f, 8192), "\n");
    }

    fclose($f);

    return $lines;
}

function getDirContents($dir, &$results = array(),$mask = ['php','js','json','css']){
    $files = scandir($dir);

    foreach($files as $key => $value){
        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
        if (!is_dir($path)) {
            if(in_array(pathinfo(basename($path), PATHINFO_EXTENSION),$mask)) {
                $results[] = $path;
            }
        } else if($value != "." && $value != "..") {
            getDirContents($path, $results, $mask);
            $results[] = $path;
        }
    }

    return $results;
}

$dir = getDirContents(\Monkey::app()->rootPath());

$i = 0;
foreach($dir as $file) {
    $i += getLines($file);
}

echo $i;