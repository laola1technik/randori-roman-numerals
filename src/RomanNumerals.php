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

        if ($numberToConvert === 4) {
            return $this->getLiteralFor(1) . $this->getLiteralFor($numberToConvert+1);
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