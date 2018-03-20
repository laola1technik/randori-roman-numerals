<?php

namespace App;


class RomanNumerals
{

    public function convert($arabicNumber)
    {

        switch ($arabicNumber) {
            case 1: return "I";
            case 5: return "V";
            case 10: return "X";
        }
    }

}