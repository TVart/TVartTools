<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 20/12/14
 * Time: 19:47
 */

class AssertionExceptionTest extends PHPUnit_Framework_TestCase{

    public function testException(){
        try{
            throw new LogicException("Foo", 433);
            //$this->fail("Bad Request");
        }catch (LogicException $e){
            $this->assertEquals($e->getMessage(),"Foo");
            $this->assertEquals($e->getCode(),433);
        }
    }

    /**
     * @expectedException LogicException
     * @expectedExceptionMessage Foo
     * @expectedExceptionCode 432
     */
    public function testLogicalException(){
        throw new LogicException("Foo", 432);
        //throw new RuntimeException("Foo", 432);
    }
} 