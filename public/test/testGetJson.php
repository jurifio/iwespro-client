<?php

use bamboo\core\exceptions\BambooException;
use bamboo\core\exceptions\BambooMailException;

require '../../iwesStatic.php';
$mailPackage = 'activatereg';
$config = \Monkey::app()->cfg()->fetch("miscellaneous","mailer");
$templateMailRoot = \Monkey::app()->rootPath() . $config['templateFolder'] . '/' . $mailPackage;
$lang = 'it';
$template = $templateMailRoot . '/' . $mailPackage . '.php';

if (is_dir($templateMailRoot) && is_readable($templateMailRoot)) {
    $css = file_get_contents($templateMailRoot . '/' . $mailPackage . '.css');
    try {
        $datas = json_decode(file_get_contents($templateMailRoot . '/' . $mailPackage . '.' . $lang . '.json'));
        echo '<div class="container">';
        foreach ($datas as $key => $vak):?>
            <div class="row">
                <div class="form-group from-group-default">
                    <div class="col-md-2"><label for="<?php echo $key; ?>"><?php echo $key; ?></label>
                    </div>
                    <div class="col-md-10">

                              <textarea id="<?php echo $key; ?>" autocomplete="off" type="text" cols="250" rows="20"
                                        class="form-control" name="<?php echo $key; ?>"><?php echo $vak; ?>"
                        </textarea>
                    </div>
                </div>
            </div>
        <?php endforeach;
        echo '</div>';
    } catch (\Throwable $e) {
        $datas = json_decode(file_get_contents($templateMailRoot . '/' . $mailPackage . '.it.json'));
    }
}


