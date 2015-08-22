<?php
/**
 * Created by PhpStorm.
 * User: XTreme.ws
 * Date: 22.08.2015
 * Time: 19:09
 */

include_once '../vendor/autoload.php';

use ilopx\yii2basichtaccess\Install;


function clear(){
    $files = [
        'index.php',
        '.htaccess',
        'web\.htaccess'
    ];

    foreach($files as $file){
        if (file_exists($file))
            unlink($file);
    }

    foreach($files as $file){
        if (is_dir($dir = dirname($file)) && $dir != '.')
            rmdir($dir);
    }
}

clear();

$install = new Install();
$install->postInstallCmd();

if (file_exists('index.php')){
    throw new Exception("File \"index.php\" not self clear");
}else{
    echo "clear /web/.htaccess -> ok\n";
}

if (!file_exists('.htaccess')){
    throw new Exception("File \"{root}/.htaccess\" not created\n");
}
else{
    echo "create /.htaccess -> ok\n";
}

if (!file_exists('web/.htaccess')){
    throw new Exception("File \"{root}/web/.htaccess\" not created\n");
}
else{
    echo "create /web/.htaccess -> ok\n";
}

echo "All -> ok\n";
clear();

