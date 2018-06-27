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
        $this->powersAllowingSubstractiveForm = [1, 10, 100];
    }

    public function convert($numberToConvert)
    {
        if ($numberToConvert === 0) {
            return '';
        }

        foreach ($this->powersAllowingSubstractiveForm as $power) {
            if ($numberToConvert >= 4 * $power && $numberToConvert < 5 * $power) {
                $remainingNumber = $numberToConvert - 4 * $power;
                return $this->getLiteralFor($power) .
                    $this->getLiteralFor(4 * $power + $power) .
                    $this->convert($remainingNumber);
            }
            if ($numberToConvert >= 9 * $power && $numberToConvert < 10 * $power) {
                $remainingNumber = $numberToConvert - 9 * $power;
                return $this->getLiteralFor($power) .
                    $this->getLiteralFor(9 * $power + $power) .
                    $this->convert($remainingNumber);
            }
            // Todo: Refactor dupclicated code
        }

        foreach ($this->equivalentNumbers as $equivalentNumber) {
            if ($numberToConvert >= $equivalentNumber) {
                $remainingNumber = $numberToConvert - $equivalentNumber;
                return $this->getLiteralFor($equivalentNumber) . $this->convert($remainingNumber);
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

}