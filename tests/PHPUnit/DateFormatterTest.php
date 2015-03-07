<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 20/12/14
 * Time: 22:28
 */
use libs\PHPUnit\DateFormatter;

class DateFormatterTest extends PHPUnit_Framework_TestCase{
    public function testFormattingDatesBasedOnConfig(){
        $stub = $this->getMock('libs\Import\Formatter');
        $stub->expects($this->any())
            ->method('hello')
            ->with(1)
            ->will($this->returnValue('Maison'));

        $this->assertInstanceOf("libs\Import\Formatter",$stub);

        $formatter = new DateFormatter($stub);
        var_dump($formatter->getFormattedDate(0));
        die();
    }
}