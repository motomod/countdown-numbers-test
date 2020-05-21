<?php


namespace Tests\Unit\Processor;

use App\Processors\NumberCalculatorProcessor;
use PHPUnit\Framework\TestCase;

class NumberCalculatorProcessorTest extends TestCase
{
    protected NumberCalculatorProcessor $numberCalculatorProcessor;

    public function setUp(): void
    {
        $this->numberCalculatorProcessor = new NumberCalculatorProcessor;
    }

    public function testTestQuestion()
    {
        $results = $this->numberCalculatorProcessor->findEquations(532, [3, 4, 7, 8, 12]);

        $this->assertCount(3, $results);

        $this->assertEquals("((((3+4)*12)-8)*7)", $results[0]);
        $this->assertEquals("((((4+3)*12)-8)*7)", $results[1]);
        $this->assertEquals("((((12-3)*8)+4)*7)", $results[2]);
    }

    public function testUnsolvableQuestion()
    {
        $results = $this->numberCalculatorProcessor->findEquations(999, [3, 4, 7, 8, 12]);

        $this->assertEmpty($results);
    }

    public function testOtherSolvableInput()
    {
        $results = $this->numberCalculatorProcessor->findEquations(266, [2, 10, 9, 4, 12]);

        $this->assertCount(4, $results);

        $this->assertEquals("((((10*12)+9)+4)*2)", $results[0]);
        $this->assertEquals("((((10*12)+4)+9)*2)", $results[1]);
        $this->assertEquals("((((12*10)+9)+4)*2)", $results[2]);
        $this->assertEquals("((((12*10)+4)+9)*2)", $results[2]);
    }
}
