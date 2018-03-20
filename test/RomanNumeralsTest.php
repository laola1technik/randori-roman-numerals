<?php

namespace test;

use App\RomanNumerals;

class RomanNumeralsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider provide_arabic_to_roman_mapping
     */
    public function should_return_roman_for_arabic_number($arabicNumber, $romanNumber)
    {
        $romanNumerals = new RomanNumerals();

        $this->assertEquals($romanNumber, $romanNumerals->convert($arabicNumber));
    }

    public function provide_arabic_to_roman_mapping()
    {
        return array(
            array(1, 'I'),
            array(5, 'V'),
            array(10, 'X'),
        );
    }
}