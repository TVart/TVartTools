<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 06/11/14
 * Time: 20:30
 */
namespace libs\PHPUnit;

class FileLogger {
    protected $path;
    public function __construct($path){
        $this->path = $path;
    }

    public function write($message){
        $message = date('r', 0).$message;
        file_put_contents($this->path, $message, FILE_APPEND);
    }
} 