<?php
/**
 * Created by PhpStorm.
 * User: XTreme.ws
 * Date: 22.08.2015
 * Time: 18:56
 */

namespace ilopx\yii2BasicHtaccess;

class Install{
    function postInstallCmd(){
        file_put_contents('index.php', file_get_contents(__DIR__.'\index.php'));
        exec('php index.php');
    }
}