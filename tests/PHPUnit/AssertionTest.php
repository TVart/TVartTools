<?php
class AssertionTest extends PHPUnit_Framework_TestCase{
    public function testBasicAssertion(){
        $this->assertTrue(1+5 == 6);
        $this->assertTrue(1+6 !==5, "Expected 7");
        $this->assertEquals(1+1,2,"1+1 = 2");
        $this->assertTrue(new DateTime() instanceof DateTime);
        $this->assertInstanceOf("DateTime", new DateTime());
        $this->assertNotInstanceOf("DateTimeZone", new DateTime());
    }

    public function testArray(){
        $arr = [];
        $this->assertEmpty($arr, "Array Should be Empty");
        $arr[] = 1;
        $this->assertCount(1,$arr,"One Element Needs");
        $arr[] = 2;
        $arr[] = "users";
        $this->assertContains("users",$arr);
        $this->assertNotContains("Limite",$arr);
        array_pop($arr);
        $this->assertEquals([1,2],$arr);
    }
}