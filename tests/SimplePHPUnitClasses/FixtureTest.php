<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 20/12/14
 * Time: 20:46
 */

class FixtureTest extends PHPUnit_Framework_TestCase{

    protected $data;
    protected static $db;

    public static function setUpBeforeClass(){
        echo "--START TEST--".PHP_EOL;
        self::$db = new PDO("sqlite:memory");
    }

    public function setUp(){
        $this->data = [1,2,4];
    }

    public function assertPreConditions()
    {
        $this->assertEquals(5,3+2);
    }


    public function testPushingToArray(){
        array_push($this->data,3);
        $this->assertCount(4,$this->data);
        $this->assertContains(2,$this->data);
    }

    public function testPopFromArray(){
        $this->assertCount(3,$this->data);
        array_pop($this->data);
        $this->assertCount(2,$this->data);
        $this->assertContains(2,$this->data);
        $this->assertNotContains(3,$this->data);
    }


    public function assertPostConditions(){
        $this->fileExists(__FILE__);
    }

    public function tearDown(){

    }

    public static function tearDownAfterClass(){
        self::$db = null;
        echo "--END TEST--".PHP_EOL;
    }

    public function onNotSuccessfulTest(){
        echo "Failed to execute Tests".PHP_EOL;
    }
}