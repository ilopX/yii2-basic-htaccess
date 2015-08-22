<?php
/**
 * Created by PhpStorm.
 * User: ilopX
 * Date: 22.08.2015
 * Time: 19:09
 */


include_once 'Util.php';

$util = new Util();
$util->runIndexFile();

if (file_exists(__DIR__.'\index.php')){
    $util->error("File \"index.php\" not self clear");
}else{
    $util->ok('Self clear "index.php"');
}

if (!file_exists('.htaccess')){
    $util->error("File \"\\.htaccess\" not created");
}
else{
    $util->ok("Create file \"\\.htaccess\"");
}

if (!file_exists('web/.htaccess')){
    $util->error("File \"\\web\\.htaccess\" not created");
}
else{
    $util->ok("Create file \"\\web\\.htaccess\"");
}

$util->ok("All");

$util->clear();

