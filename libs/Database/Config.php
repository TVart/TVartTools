<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 06/03/15
 * Time: 13:32
 */
namespace libs\Database;

class Congig{

    public static function init(){
        return [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'trackimmo',
            'username'  => 'root',
            'password'  => 'root',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => ''
        ];
    }
}

