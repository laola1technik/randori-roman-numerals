<?php

namespace test;

use App\RomanNumerals;

class RomanNumeralsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_should_return_I_for_1()
    {
        $romanNumerals = new RomanNumerals();

        $this->assertEquals('I', $romanNumerals->convert(1));
    }

}