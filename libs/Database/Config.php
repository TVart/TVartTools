<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 06/03/15
 * Time: 13:32
 */
namespace Tvart\Framework\Database;

class Config{

    public static function init(){
        return [
            'driver'   => 'sqlite',
            'database' => __DIR__.'/public/db/sqlite.db',
            'prefix'   => '',
        ];
        /*
         return [
                    'read' => [
                        'host' => '192.168.1.1',
                    ],
                    'write' => [
                        'host' => '196.168.1.2'
                    ],
                    'driver'    => 'mysql',
                    'host'      => 'localhost',
                    'database'  => 'mydatabase',
                    'username'  => 'root',
                    'password'  => 'root',
                    'charset'   => 'utf8',
                    'collation' => 'utf8_unicode_ci',
                    'prefix'    => ''
                ];
         */
    }
}

