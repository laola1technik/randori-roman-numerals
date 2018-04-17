<?php

namespace App;


class RomanNumerals
{

    public function convert($arabicNumber)
    {
        foreach ([1,10,100,1000] as $literal) {
            if ($arabicNumber >= $literal && $arabicNumber <= $literal * 3) {
                return $this->repeatSingleLiteral($literal, $arabicNumber);
            }
        }
        if($arabicNumber === 6) {
            return $this->convertSingleLiteral(5).$this->convertSingleLiteral(1);
        } else if($arabicNumber === 7) {
            return $this->convertSingleLiteral(5).$this->convert(2);
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

    /**
     * @param $literal
     * @param $arabicNumber
     * @return string
     */
    private function repeatSingleLiteral($literal, $arabicNumber)
    {
        return str_repeat($this->convertSingleLiteral($literal), $arabicNumber/$literal);
    }

}