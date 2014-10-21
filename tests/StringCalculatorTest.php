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
    public function TwoNumbersSeparatedByCommaAsInputReturnsTheSumOfThoseNumbers()
    {
        $calculator = $this->getCalculator();

        $this->assertSame(0, $calculator->add("0,0"));
        $this->assertSame(2, $calculator->add("1,1"));
        $this->assertSame(5, $calculator->add("2,3"));
    }

    /**
     * @test
     **/
    public function ManyNumbersSeparatedByCommasAsInputReturnsTheSumOfThoseNumbers()
    {
        $calculator = $this->getCalculator();

        $this->assertSame(55, $calculator->add("0,1,2,3,4,5,6,7,8,9,10"));
    }

    /**
     * @test
     **/
    public function LargeNumbersInInputReturnsTheSumOfOnlyTheNonLargeNumbers()
    {
        $calculator = $this->getCalculator();

        $this->assertSame(1000, $calculator->add("1000"));
        $this->assertSame(0, $calculator->add("1001"));
        $this->assertSame(49, $calculator->add("0,1001,1002,1003,4,5,6,7,8,9,10"));
    }

    /**
     * @test
     **/
    public function TwoNumbersSeparatedByNewLineAsInputReturnsTheSumOfThoseNumbers()
    {
        $calculator = $this->getCalculator();

        $this->assertSame(5, $calculator->add("2\n3"));
    }

    /**
     * @test
     **/
    public function ManyNumbersSeparatedByCommasAndNewLinesAsInputReturnsTheSumOfThoseNumbers()
    {
        $calculator = $this->getCalculator();

        $this->assertSame(55, $calculator->add("0\n1\n2,3,4\n5,6\n7,8\n9\n10"));
    }

    /**
     * @test
     **/
    public function ManyNumbersSeparatedByCustomDelimiterAsInputReturnsTheSumOfThoseNumbers()
    {
        $calculator = $this->getCalculator();

        $this->assertSame(55, $calculator->add("//;\n0;1;2;3;4;5;6;7;8;9;10"));
        $this->assertSame(55, $calculator->add("//\t\n0\t1\t2\t3\t4\t5\t6\t7\t8\t9\t10"));
    }

    /**
     * @test
     **/
    public function ManyNumbersSeparatedByMultipleCustomDelimitersAsInputReturnsTheSumOfThoseNumbers()
    {
        $calculator = $this->getCalculator();

        $this->assertSame(55, $calculator->add("//[;][\t]\n0\t1\t2;3;4\t5;6\t7;8\t9\t10"));
    }

    /**
     * @test
     **/
    public function ManyNumbersSeparatedByMultipleCustomDelimitersOfLengthGreaterThan1AsInputReturnsTheSumOfThoseNumbers()
    {
        $calculator = $this->getCalculator();

        $this->assertSame(55, $calculator->add("//[long][verylong]\n0long1long2verylong3verylong4long5verylong6long7verylong8long9long10"));
    }

    /**
     * @test
     **/
    public function ManyNumbersSeparatedByCustomDelimiterOfLengthGreaterThan1AsInputReturnsTheSumOfThoseNumbers()
    {
        $calculator = $this->getCalculator();

        $this->assertSame(55, $calculator->add("//[longdelimiter]\n0longdelimiter1longdelimiter2longdelimiter3longdelimiter4longdelimiter5longdelimiter6longdelimiter7longdelimiter8longdelimiter9longdelimiter10"));
    }

    /**
     * @test
     * @expectedException        Exception
     * @expectedExceptionMessage Negatives not allowed: -1
     */
    public function ANegativeNumberAsInputResultsInAnExceptionListingTheNegativeNumber()
    {
        $calculator = $this->getCalculator();

        $calculator->add("-1");
    }

    /**
     * @test
     * @expectedException        Exception
     * @expectedExceptionMessage Negatives not allowed: -1
     */
    public function ANegativeNumberInTheInputResultsInAnExceptionListingTheNegativeNumber()
    {
        $calculator = $this->getCalculator();

        $calculator->add("0,-1,2,3,4,5,6,7,8,9,10");
    }

    /**
     * @test
     * @expectedException        Exception
     * @expectedExceptionMessage Negatives not allowed: -1,-2,-3
     */
    public function MultipleNegativeNumbersInTheInputResultsInAnExceptionListingTheNegativeNumbers()
    {
        $calculator = $this->getCalculator();

        $calculator->add("0,-1,-2,-3,4,5,6,7,8,9,10");
    }

}
