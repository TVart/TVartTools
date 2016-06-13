<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 06/11/14
 * Time: 20:30
 */
namespace libs\PHPUnit;

class Output {
    const VERSION = "0.0.1";

    public function getVersion(){
        print "Version : ".self::VERSION;
    }

    public function returnVersion(){
        return "Version : ".self::VERSION;
    }
}