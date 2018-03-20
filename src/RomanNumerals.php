<?php

namespace App;


class RomanNumerals
{

    public function convert($arabicNumber)
    {

        if($arabicNumber === 2 || $arabicNumber === 3) {
            return str_repeat($this->convertSingleLiteral(1), $arabicNumber);
        }
        return $this->convertSingleLiteral($arabicNumber);
    }

    /**
     * @param $arabicNumber
     * @return string
     */
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