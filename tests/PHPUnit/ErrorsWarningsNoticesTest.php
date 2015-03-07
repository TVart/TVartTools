<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 20/12/14
 * Time: 20:07
 */

class ErrorsWarningsNoticesTest extends PHPUnit_Framework_TestCase{

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testError(){
        throw new PHPUnit_Framework_Error("Error",1,__FILE__,__LINE__);
        //new NotExistingClass();
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     */
    public function testWarning(){
        include "notexistingfile.inc";
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Notice
     */
    public function testNotice(){
        $_GET[NOT_DEFINED_GLOBAL];
    }
} 