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
            // Literale
            array(1, 'I'),
            array(5, 'V'),
            array(10, 'X'),
            array(50, 'L'),
            array(100, 'C'),
            array(500, 'D'),
            array(1000, 'M'),
            // Sequenzen von Literalen
            array(2, 'II'),
            array(3, 'III'),
            array(20, 'XX'),
            array(30, 'XXX'),
            array(200, 'CC'),
            array(300, 'CCC'),
            array(2000, 'MM'),
            array(3000, 'MMM'),
            // Sequenzen von beliebigen Literalen
            array(6, 'VI'),
            array(7, 'VII'),
            array(8, 'VIII'),
            array(11, 'XI'),
            // alle additiven Sequenzen
            array(3888, 'MMMDCCCLXXXVIII'),
            // subtraktive Sequenzen
            array(4, 'IV'),
            array(9, 'IX'),
        );
    }
} // TODO: Test 0