<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 20/12/14
 * Time: 22:28
 */
use libs\PHPUnit\StockParser;

class StockParserTest extends PHPUnit_Framework_TestCase{
    public function testGetParsedStock(){
        $closure = function (\SimpleXMLElement $stock) {
            return sprintf(
                "SE Name : %s<br/>%s - %s - %s",
                $stock['exchange'],
                (string)$stock->name,
                (string)$stock->symbol,
                (string)$stock->price
            );
        };

        $parser = $this->getMock('XmlParser');
        $parser->expects($this->once())
            ->method('setFile')
            ->with("http://www.xmlfiles.com/examples/portfolio.xml")
            ->willReturn($this)
            ->method("setNode")
            ->with("stock")
            ->willReturn($this)
            ->method("setDebug")
            ->with(true)
            ->willReturn($this)
            ->method("parse")
            ->will($this->returnCallback($closure));

        var_dump($parser->parse()); exit;
    }
}