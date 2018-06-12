<?php

namespace App;

/**
 * Domain Vokabular:
 * (Roman) numerals consist of literals
 * (Arabic) Numbers are numbers
 */
class RomanNumerals
{
    private $numberToLiteral = [
        1 => "I",
        5 => "V",
        10 => "X",
        50 => "L",
        100 => "C",
        500 => "D",
        1000 => "M"
    ];

    public function convert($numberToConvert)
    {
        if ($numberToConvert === 0) {
            return '';
        }

        foreach([1, 10, 100] as $power) {
            if($numberToConvert === 4*$power || $numberToConvert === 9*$power) {
                return $this->getLiteralFor($power) . $this->getLiteralFor($numberToConvert+$power);
            }
        }

        $equivalentNumbers = array_reverse(array_keys($this->numberToLiteral));
        foreach ($equivalentNumbers as $equivalentNumber) {
            if ($numberToConvert >= $equivalentNumber) {
                $remainingNumber = $numberToConvert - $equivalentNumber;
                return $this->getLiteralFor($equivalentNumber) . $this->convert($remainingNumber);
            }
        }
        throw new \InvalidArgumentException($numberToConvert);
    }

    private function getLiteralFor($number)
    {
        if(array_key_exists($number, $this->numberToLiteral)) {
            return $this->numberToLiteral[$number];
        }
        throw new \InvalidArgumentException($number);
     }

}