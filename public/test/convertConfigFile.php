<?php
$ttime = microtime(true);
$time = microtime(true);
require "../../iwesStatic.php";
var_dump("Applicazione  \t\t\t\t" . (microtime(true) - $time));

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
$monkey->cartManager;
var_dump("cartManager \t\t\t\t" . (microtime(true) - $time));
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

var_dump("ttime:  \t\t\t\t\t" . ($time - $ttime));


$dataFile = \Monkey::app()->rootPath() . \Monkey::app()->cfg()->fetch("paths", "widget-data") . '/*';
foreach (glob($dataFile) as $filePath) {
    $fileName = pathinfo($filePath, PATHINFO_BASENAME);
    if (count(explode('.', $fileName)) == 2) unlink($filePath);
}

$filePath = \Monkey::app()->rootPath() . "/client/public/themes/flatize/layout/routes.json";
$routes = json_decode(file_get_contents($filePath), true);
ksort($routes);
$filestowrite = [];
foreach ($routes as $key => $val) {
    if ($key == '__comment') continue;
    try {
        $key = explode('.', $key);
        $controllerName = substr($key[0], 1);

        if(isset($filestowrite[strtolower($controllerName)])) $newThing = $filestowrite[strtolower($controllerName)];
        else $newThing = [];

        $templateData = [];
        if (isset($val['template'])) {
            $templateData['template'] = $val['template'];
        }
        if (isset($val['assets'])) {
            $templateData['assets'] = $val['assets'];
        }
        if (isset($val['headTags'])) {
            $templateData['headTags'] = $val['headTags'];
        }
        if (isset($val['helper'])) {
            $templateData['helper'] = $val['helper'];
        }

        if (isset($val['data'])) {

            $dataFile = \Monkey::app()->rootPath() . \Monkey::app()->cfg()->fetch("paths", "widget-data") . '/' . strtolower($controllerName) . '.it.json';
            if (is_readable($dataFile)) {
                $widgetData = json_decode(file_get_contents($dataFile), true);
                $newData = [];
                foreach ($val['data'] as $key1 => $val1) {
                    if(isset($widgetData[$key1])) $newData[$key1]['placeholders'] = $widgetData[$key1];
                    else $newData[$key1]['placeholders'] = [];

                    if ($val1['src'] != 'json') {
                        $newData[$key1]['remote'] = $val['data'][$key1];
                        $newData[$key1]['remote']['src'] = 'PandaORM';
                    }
                }
                $templateData['data'] = $newData;
            } else {
                if ($val['data'][$key[1]]['src'] != 'json') {
                    $newData = [];
                    $newData[$key[1]]['placeholders'] = [];
                    $newData[$key[1]]['remote'] = $val['data'][$key[1]];
                    $newData[$key[1]]['remote']['src'] = 'PandaORM';
                    $templateData['data'] = $newData;
                }
            }
        }


        $newThing[$key[1]] = $templateData;
        $filestowrite[strtolower($controllerName)] = $newThing;
        //file_put_contents($newDataFile, json_encode($newThing, JSON_PRETTY_PRINT));
    } catch (\Throwable $e) {
        var_dump($val);
        var_dump($e->getMessage() . ' ' . $e->getTraceAsString());
    }
}

foreach ($filestowrite as $name=>$data) {
    $newDataFile = \Monkey::app()->rootPath() . \Monkey::app()->cfg()->fetch("paths", "widget-data") . '/' . strtolower($name) . '.json';
    file_put_contents($newDataFile,json_encode($data,JSON_PRETTY_PRINT));
}

//$files = \Monkey::app()->rootPath() . \Monkey::app()->cfg()->fetch("paths", "widget-data") . '/' . strtolower($this->request->getControllerName()) . '.' . \Monkey::app()->getDefaultLanguage() . '.json';
$dir = \Monkey::app()->rootPath() . \Monkey::app()->cfg()->fetch("paths", "widget-data") . '/';