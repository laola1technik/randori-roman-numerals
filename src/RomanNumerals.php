<?php

namespace App;


class RomanNumerals
{

    public function convert($arabicNumber)
    {
        foreach ([1000, 500, 100, 50, 10, 5, 1] as $literal) {
            if ($arabicNumber === $literal) {
                return $this->convertSingleLiteral($literal);
            }
            if ($arabicNumber > $literal) {
                return $this->convertSingleLiteral($literal) . $this->convert($arabicNumber - $literal);
            }
        }
        throw new \InvalidArgumentException($arabicNumber);
    }

    private function convertSingleLiteral($arabicNumber)
    {
        switch ($arabicNumber) {
            case 1:
                return "I";
            case 5:
                return "V";
            case 10:
                return "X";
            case 50:
                return "L";
            case 100:
                return "C";
            case 500:
                return "D";
            case 1000:
                return "M";
            default:
                throw new \InvalidArgumentException($arabicNumber);
        }
    }

}