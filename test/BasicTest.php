<?php
use PHPLegends\Tests\Bench;

class BasicTest extends PHPUnit_Framework_TestCase
{
    private $test;
    private $bench;

    public function setUp()
    {
        $this->bench = new Bench;
        $this->test = $this->bench->addTest(function() { 1 + 1; });
        $this->bench->run();
    }

    public function testBenchClass()
    {
        $this->assertInstanceOf('PHPLegends\\Tests\\Bench', $this->bench, '$this->bench is not valid type');
    }

    public function testBenchObjClass()
    {
        $this->assertInstanceOf('PHPLegends\\Tests\\BenchObject', $this->test, '$this->test is not valid type');
    }

    public function testTime()
    {
        $time = $this->test->time();
        $this->assertInternalType('float', $time, '$time don\'t return float value');
        $this->assertTrue($time >= 0,   '$time returns negative value');
    }

    public function testMemory()
    {

        $memory = $this->test->memory();
        $this->assertInternalType('int', $memory, '$memory don\'t return int value');
        $this->assertTrue($memory >= 0, '$memory returns negative value');
    }

    /**
     *  Test isExecuted Method
     *
     */
    public function testIsExecuted()
    {
        $this->assertTrue($this->bench->isExecuted());
    }

    public function testArrayIterator()
    {
       $this->assertInstanceOf('\ArrayIterator', $this->bench->getIterator());
    }
}
