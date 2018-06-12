<?php

namespace App;


class RomanNumerals
{
    private $singleLiterals = [
        1 => "I",
        5 => "V",
        10 => "X",
        50 => "L",
        100 => "C",
        500 => "D",
        1000 => "M"
    ];

    public function convert($arabicNumber)
    {
        if ($arabicNumber === 0) {
            return '';
        }

        foreach ([1000, 500, 100, 50, 10, 5, 1] as $literal) {
            if ($arabicNumber >= $literal) {
                return $this->convertSingleLiteral($literal) .
                       $this->convert($arabicNumber - $literal);
            }
        }
        throw new \InvalidArgumentException($arabicNumber);
    }

    private function convertSingleLiteral($arabicNumber)
    {
        if(array_key_exists($arabicNumber, $this->singleLiterals)) {
            return $this->singleLiterals[$arabicNumber];
        }
        throw new \InvalidArgumentException($arabicNumber);
     }

}