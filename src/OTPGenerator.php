<?php

namespace MichaelNabil230\Msegat;

use MichaelNabil230\Msegat\Interfaces\OTPGeneratorInterfaces;

class OTPGenerator implements OTPGeneratorInterfaces
{
    public static function generate(): int|string
    {
        return rand(1000, 9999);
    }
}
