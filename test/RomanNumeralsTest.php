<?php

namespace test;

use App\RomanNumerals;

class RomanNumeralsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_return_I_for_1()
    {
        $romanNumerals = new RomanNumerals();

        $this->assertEquals('I', $romanNumerals->convert(1));
    }

    /**
     * @test
     */
    public function should_return_V_for_5()
    {
        $romanNumerals = new RomanNumerals();

        $this->assertEquals('V', $romanNumerals->convert(5));
    }
}