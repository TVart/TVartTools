<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 20/12/14
 * Time: 20:21
 */
use libs\PHPUnit\Output;

class OutputTest extends PHPUnit_Framework_TestCase{

    public function testGetVersion(){
        ob_start();
        $output = new Output();
        $output->getVersion();
        $txt = ob_get_clean();
        $this->assertEquals($txt,"Version : 0.0.1");
    }


    public function testReturnVersion(){
        $this->expectOutputString("Version : 0.0.1");
        $output = new Output();
        echo $output->returnVersion();
    }
    public function testExpectedOutputString(){
        $this->expectOutputString("Version : 0.0.1");
        $output = new Output();
        $output->getVersion();
    }

    public function testExpectedOutputRegex(){
        $this->expectOutputRegex("/Version : \d\.\d\.\d/");
        $output = new Output();
        $output->getVersion();
    }
}