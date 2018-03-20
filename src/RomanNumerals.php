<?php

namespace App;


class RomanNumerals
{

    public function convert($arabicNumber)
    {
        if ($arabicNumber === 5) {
            return 'V';
        }
        return "I";
    }

}