<?php
/**
 * Created by PhpStorm.
 * User: XTreme.ws
 * Date: 23.08.2015
 * Time: 0:44
 */

class Util{
    private $clearFiles = [
        'index.php',
        '.htaccess',
        'web\.htaccess'
    ];

    function __construct(){
        $this->clear();
    }

    function clear(){
        foreach($this->clearFiles as $file){
            if (file_exists($file))
                unlink($file);
        }

        foreach($this->clearFiles as $file){
            if (is_dir($dir = dirname($file)) && $dir != '.')
                rmdir($dir);
        }
    }

    function runIndexFile(){
        $fileIndex = dirname(__DIR__).'/index.php';
        if (file_exists($fileIndex)){
            copy($fileIndex, 'index.php');
            $this->msg('run "index.php"');
            exec('php '.__DIR__.'\index.php');
        }else{
            throw new Exception("File \"$fileIndex\"' not exists");
        }
    }

    function ok($msg){
        echo "$msg -> ok\n";
    }

    function error($msg){
        throw new Exception($msg);
    }

    function msg($msg){
        echo "$msg\n";
    }
}