<?php

namespace App;


class RomanNumerals
{

    public function convert($arabicNumber)
    {
        foreach ([5, 10] as $literal) {
            if ($arabicNumber > $literal && $arabicNumber <= $literal + 3) {
                return $this->convertSingleLiteral($literal) . $this->convert($arabicNumber % $literal);
            }
        }

        foreach ([1, 10, 100, 1000] as $literal) {
            if ($arabicNumber > $literal && $arabicNumber <= $literal * 3) {
                return $this->convertSingleLiteral($literal) . $this->convert($arabicNumber - $literal);
            }
        }

        return $this->convertSingleLiteral($arabicNumber);
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