<?php

class StringCalculatorTest extends PHPUnit_Framework_TestCase
{

    private function getCalculator()
    {
        return new StringCalculator();
    }

    /**
     * @test
     **/
    public function emptyInputReturns0()
    {
        $calculator = $this->getCalculator();

        $this->assertSame(0, $calculator->add(""));
    }

    /**
     * @test
     **/
    public function SingleNumberAsInputReturnsThatNumber()
    {
        $calculator = $this->getCalculator();

        $this->assertSame(0, $calculator->add("0"));
        $this->assertSame(1, $calculator->add("1"));
    }

    /**
     * @test
     **/
    public function TwoNumbersAsInputReturnsTheSumOfThoseNumbers()
    {
        $calculator = $this->getCalculator();

        $this->assertSame(0, $calculator->add("0,0"));
        $this->assertSame(2, $calculator->add("1,1"));
        $this->assertSame(5, $calculator->add("2,3"));
    }

    /**
     * @test
     **/
    public function ManyNumbersAsInputReturnsTheSumOfThoseNumbers()
    {
        $calculator = $this->getCalculator();

        $this->assertSame(55, $calculator->add("0,1,2,3,4,5,6,7,8,9,10"));
    }

}
