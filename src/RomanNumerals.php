<?php

namespace App;

/**
 * Domain Vokabular:
 * (Roman) numerals consist of literals
 * (Arabic) Numbers are numbers
 */
class RomanNumerals
{
    private $numberToLiteral;
    private $equivalentNumbers;
    private $boundariesSubstractiveForms;
    private $powersAllowingSubstractiveForm;

    public function __construct()
    {
        $this->numberToLiteral = [
            1 => "I",
            5 => "V",
            10 => "X",
            50 => "L",
            100 => "C",
            500 => "D",
            1000 => "M"
        ];
        $this->equivalentNumbers = array_reverse(array_keys($this->numberToLiteral));
        $this->boundariesSubstractiveForms = [4, 9];
        $this->powersAllowingSubstractiveForm = [1, 10, 100];
    }

    public function convertFromArabic($numberToConvert)
    {
        if ($numberToConvert === 0) {
            return '';
        }

        foreach ($this->boundariesSubstractiveForms as $boundary) {
            foreach ($this->powersAllowingSubstractiveForm as $power) {
                $lowerBoundary = $boundary * $power;
                $upperBoundary = $lowerBoundary + $power;
                if ($numberToConvert >= $lowerBoundary && $numberToConvert < $upperBoundary) {
                    $remainingNumber = $numberToConvert - $lowerBoundary;
                    return $this->getLiteralFor($power) .
                        $this->getLiteralFor($lowerBoundary + $power) .
                        $this->convertFromArabic($remainingNumber);
                }
            }
        }

        foreach ($this->equivalentNumbers as $equivalentNumber) {
            if ($numberToConvert >= $equivalentNumber) {
                $remainingNumber = $numberToConvert - $equivalentNumber;
                return $this->getLiteralFor($equivalentNumber) . $this->convertFromArabic($remainingNumber);
            }
        }
        throw new \InvalidArgumentException($numberToConvert);
    }

    private function getLiteralFor($number)
    {
        if (array_key_exists($number, $this->numberToLiteral)) {
            return $this->numberToLiteral[$number];
        }
        throw new \InvalidArgumentException($number);
    }

    public function convertFromRoman($romanNumber)
    {
        $arabicNumber = [];
        foreach (str_split($romanNumber) as $literal) {
            $arabicNumber[] = array_search($literal, $this->numberToLiteral);
        }
        for ($i = 0; $i < count($arabicNumber); $i++) {
            if (array_key_exists($i + 1, $arabicNumber)) {
                if ($arabicNumber[$i] < $arabicNumber[$i + 1]) {
                    $arabicNumber[$i] *= -1;
                }
            }
        }

        return array_sum($arabicNumber);


    }

}