<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 07/11/14
 * Time: 22:30
 */

namespace libs\Database;

class Connection extends  \Illuminate\Database\Capsule\Manager {

    protected static $instance = null;

    public  static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new Connection();
            self::$instance->addConnection(
                Congig::init()
            );
            self::$instance->setAsGlobal();
            self::$instance->bootEloquent();
        }
    }

    public function setModelDirectory($path) {
        if(!is_dir($path)) {
            throw new \UnexpectedValueException('Invalid path');
        }

        spl_autoload_register(function($class) use ($path) {
            $path = $path.basename($class).'.php';

            if(is_file($path)) {
                require_once $path;
            }
        });
    }

    public function beginTransaction() {
        parent::getConnection()->beginTransaction();
    }
    public function commit() {
        parent::getConnection()->commit();
    }
    public function rollback() {
        parent::getConnection()->rollback();
    }
}
