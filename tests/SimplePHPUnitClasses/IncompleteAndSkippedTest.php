<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 20/12/14
 * Time: 20:37
 */

class IncompleteAndSkippedTest extends PHPUnit_Framework_TestCase{

    public function testIncompleteMethod(){
        $this->markTestIncomplete("Coming Soon...");
    }

    public function testOptionalFunction(){
        if(!extension_loaded("memcached")){
            $this->markTestSkipped("Extension memcached not installed");
        }
    }
} 